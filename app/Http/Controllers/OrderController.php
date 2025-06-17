<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Cart;
use App\Models\CouponMaster;
use App\Models\ItemMaster;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Rules\ValidationCard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function getCart()
    {
        //customer_idを後でAuthにする
        $inCart=Cart::where('customer_id',2)->with('item_master')->get();
        return $inCart;
    }

    public function sumPrice_in_tax($inCart)
    {
        $sum_price_in_tax=$inCart->sum(function($cartItem){
            return ($cartItem->item_master->item_price_in_tax)*($cartItem->item_count);
        });
        return $sum_price_in_tax;
    }

    //order_confirmを表示させる
    public function confirm()
    {
        $inCart=$this->getCart();
        $sum_price=$this->sumPrice_in_tax($inCart);

        return view('orders/confirm',['cartItems'=>$inCart,'sum_price'=>$sum_price,'discount_amount'=>0,'coupon_code'=>'','final_price'=>$sum_price]);
    }

    public function OrderInsert(Request $request, $Payment)
    {
        //customer_idを後でAuthにする
        $inCart=$this->getCart();
        
        if(!isset($sum_price_in_tax))$sum_price_in_tax=$this->sumPrice_in_tax($inCart);
        else $sum_price_in_tax=$request->final_price;

        //dd($sum_price_in_tax);

        $Customer=Customer::where('customer_id',2)->first();
        $sum_price=$inCart->sum(function($cartItem){
            return ($cartItem->item_master->item_price)*($cartItem->item_count);
        });


        //在庫を超える場合falseを返す
        foreach($inCart as $items)
        {
            if($items->item_count>$items->item_master->item_stock){return false;}
        }

        foreach($inCart as $items)
        {
            ItemMaster::where('item_id',$items->item_id)
            ->update([
                'item_stock'=>$items->item_master->item_stock - $items->item_count
            ]);
        }

        $Payment=Payment::create($Payment);

        $payment_type=1;
        if($Payment->payment_name=="paypay"){$payment_type=2;}
        else if($Payment->payment_name=="bank_transfer"){$payment_type=3;}
        else if($Payment->payment_name=="cod"){$payment_type=4;}
        else if($Payment->payment_name=="convenience"){$payment_type=5;}

        $Orders=Order::create([
            'payment_name'=>$payment_type,
            'payment_id'=>$Payment->payment_id,
            'customer_id'=>2,//customer_idを後でAuthにする
            'delivery_post_number'=>$Customer->customer_post_number,
            'delivery_states'=>$Customer->customer_states,
            'delivery_municipalities'=>$Customer->customer_municipalities,
            'delivery_building_name'=>$Customer->customer_building_name,
            //'delivery_postage'=>
            'order_price'=>$request->final_price,
            'order_price_in_tax'=>$sum_price_in_tax,
            'is_paid'=>1,
            'is_delivery'=>0,
            //'delivery_day'=>
        ]);

        foreach($inCart as $items)
        {
            $Order_details=OrderDetail::create([
                'order_id'=>$Orders->order_id,
                'item_id'=>$items->item_id,
                'item_name'=>$items->item_master->item_name,
                'price'=>$items->item_master->item_price,
                'price_in_tax'=>$items->item_master->item_price_in_tax,
                'count'=>$items->item_count
            ]);
        }

        return true;
    }

    //支払い方法の確認
    public function payment(Request $request)
    {
        //dd($request);
        $validated=$request->validate([
            'payment_method'=>'max:30'
        ]);
        $method=$request->input('payment_method');
        $final_price = $request->final_price;

        //エラー文必要なら後で追加
        if($method=="credit_card")
        {
            $card_number=$request->input('card_number');
            $expire=$request->input('expire');
            $security_code=$request->input('security_code');
            $card_name=$request->input('card_name');

            //後でバリデーションチェック
            $validated=$request->validate([
                'card_number'=>'digits_between:14,16|numeric',//14~16桁、数値
                'expire'=>['regex:/^\d{2}\/\d{2}$/',new ValidationCard],//{数字2桁}/{数字2桁}
                'security_code'=>'digits_between:3,4|numeric',//3~4桁、数値
                'card_name'=>'max:30|regex:/^[a-zA-Z]+ [a-zA-Z]+$/'//英字+半角スペース+英字  英語を大文字に変更してSQLに　スペースは消す
            ]);

            $month=(int)substr($expire,0,2);//月の判定用
            $year=(int)substr($expire,3,2);//年の判定用

            $expire_storage=$month*100+$year;

            $card_name=preg_replace('/\s+/','',$card_name);

            $Payment=[
                'payment_name'=>$method,
                'card_number'=>$card_number,
                'expire'=>$expire_storage,
                'card_user_name'=>strtoupper($card_name),
                'can_use_flg'=>true
            ];

            //在庫が足りない場合エラーを返す
            if(!$this->OrderInsert($request,$Payment))
            {
                return back()->withErrors(['stockOver'=>'在庫がありませんでした'])->withInput();
            }

            return view('orders.complete');
        }
        else
        {
            $Payment=[
                'payment_name'=>$method,
                'can_use_flg'=>true
            ];

            //在庫が足りない場合エラーを返す
            if(!$this->OrderInsert($request,$Payment))
            {
                return back()->withErrors(['stockOver'=>'在庫がありませんでした'])->withInput();
            }

            return view('orders.complete');
        }
    }
    //クーポンを適用するためのメソッド
    public function applyCoupon(Request $request)
    {
        //入力されたコードを変数に格納
        $coupon_code = $request->input('coupon_code');
        $in_cart = $this->getCart();
        $sum_price = $this->sumPrice_in_tax($in_cart);

        $coupon = CouponMaster::where('coupon_code', $coupon_code)
                    ->where('coupon_is_enable',1)
                    ->where('coupon_start_day', '<=', now())//有効期間開始日
                    ->first();
        if(!$coupon) {
            return back()->withErrors(['coupon_error' => 'クーポンコードが無効です'])
                        -> withInput()
                        ->with([
                            'cartItems' => $in_cart,
                            'sum_price' => $sum_price,
                            'discount_amount' => 0,
                            'coupon_code' => $coupon_code,
                            'final_price' => $sum_price
                        ]);
        }
            $discount_amount = 0;

            $discount_amount = floor($sum_price * ($coupon->coupon_sale_value / 100));

            $final_price = max(0, $sum_price - $discount_amount);

            return view('orders/confirm', [
                'cartItems' => $in_cart,
                'sum_price' => $sum_price,
                'discount_amount' => $discount_amount,
                'coupon_code' => $coupon_code,
                'coupon_name' => $coupon->coupon_name,
                'final_price' => $final_price
            ]);
    }
}
