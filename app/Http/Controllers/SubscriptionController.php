<?php

namespace App\Http\Controllers;

use App\Models\SubscribeDetailMaster;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Carbon\Carbon;
use app\Rules\ValidationCard;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = SubscribeDetailMaster::all();
        return view ('subscription.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscribe $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscribe $subscription)
    {
        //customer_idをAuthに
        // $subscriptionNow = Subscribe::where('customer_id',auth()->id())->with('SubscribeDetailMaster')->first();
        $subscriptionNow = Subscribe::where('customer_id',auth()->id())->first();
        $subscriptionData = SubscribeDetailMaster::all();
        // もしサブスクしていなければマイページに戻す
        if(!isset($subscriptionNow)){
            return back()->with('message','定期便を契約していません');
        }

        $pay='';
        // dd(auth()->id());
        if($subscriptionNow->payment_id==1){$pay='クレジットカード';}
        else if($subscriptionNow->payment_id==2){$pay='paypay';}
        else if($subscriptionNow->payment_id==3){$pay='銀行振込';}
        else if($subscriptionNow->payment_id==4){$pay='代金引換';}
        else {$pay='コンビニ決済';}
        //dd($subscriptionNow);

        $subscription_img=[];
        for($cnt=1;$cnt<=3;$cnt++)
        {
            if($cnt!=$subscriptionNow->subscribe_detail_id)
            {
                $subscription_img[]=['img'=>SubscribeDetailMaster::where('subscribe_detail_id',$cnt)->first()->subscribe_img,'id'=>$cnt,'name'=>SubscribeDetailMaster::where('subscribe_detail_id',$cnt)->first()->subscribe_item_name];
            }
        }
        // dd($subscription_img);

        return view('subscription/edit',['subscription'=>$subscriptionNow,'subscriptionData'=>$subscriptionData,'subscriptionImg'=>$subscription_img,'payment'=>$pay]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, /*Subscribe $subscription*/)
    {
        //dd($request);
        $ID=$request->input('subscriptionID');
        // $ID=$request->subscriptionID;
        // dd($ID);
        Subscribe::where('customer_id',auth()->id())
        ->update([
            'subscribe_detail_id'=>$ID
        ]);
        return view('top');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscribe $subscription)
    {
        Subscribe::where('customer_id',auth()->id())->delete();
        return view('top');
    }



    //subscriptionの購入確認画面
    public function confirm(Request $request)
    {
        $Id=$request->input('subscriptionID')+1;
        //dd($Id);
        $subscription = SubscribeDetailMaster::where('subscribe_detail_id',"=",$Id)->first();
        // $subscription = SubscribeDetailMaster::where('customer_id',"=",auth()->id())
        // ->orderBy('order_id','desc')->first();

        //dd($subscription);
        return view('subscription/confirm',['subscription'=>$subscription]);
    }

    //paymentを経由してデータを送る
    public function pre_payment(Request $request)
    {
        //dd($request);
        return view('subscription.payment',['Id'=>$request->input('subscribe_id')]);
    }


    //Subscriptionを追加
    public function SubscriptionInsert($Payment,$Id)
    {
        $payment_type=1;
        if($Payment['payment_name']=="paypay"){$payment_type=2;}
        else if($Payment['payment_name']=="bank_transfer"){$payment_type=3;}
        else if($Payment['payment_name']=="cod"){$payment_type=4;}
        else if($Payment['payment_name']=="convenience"){$payment_type=5;}

        $now=Carbon::now();//現在時刻
        $next=$now->copy()->addMonth();//一か月後の時刻
        $subscription=Subscribe::create([
            'customer_id'=>auth()->id(),
            'subscribe_detail_id'=>$Id,
            'payment_id'=>$payment_type,
            'subscribe_start_day'=>$now,
            'subscribe_end_day'=>$next
        ]);
    }




    //支払い方法の確認
    public function payment(Request $request)
    {
        $id=$request->input('subscribe_id');//定期便の番号
        //dd($request);
        $validated=$request->validate([
            'payment_method'=>'max:30'
        ]);
        $method=$request->input('payment_method');

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
            dump($id);

            $this->SubscriptionInsert($Payment,$id);

            $subscription_number = Subscribe::select('subscribe_id')
            ->where('customer_id','=',auth()->id())->first();


            return view('subscription.complete',['subscription_number'=>$subscription_number]);
        }
        else
        {
            $Payment=[
                'payment_name'=>$method,
                'can_use_flg'=>true
            ];

            $this->SubscriptionInsert($Payment,$id);

            $subscription_number = Subscribe::select('subscribe_id')
            ->where('customer_id','=',auth()->id())->first();

            return view('subscription.complete',['subscription_number'=>$subscription_number]);
        }
    }
}
