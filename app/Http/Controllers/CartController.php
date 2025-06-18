<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\ItemMaster;

class CartController extends Controller
{
    //
    public function index(){
        // cartに入っている商品全部を取得
        $cartlist = Cart::where('customer_id',"=",auth()->id())->get();
        // カートに入っている商品情報を取得
        $cartItemInfo = Cart::with('item_master')->where('customer_id',"=",auth()->id())->get();
        // 合計金額を求める,初期設定
        $cart_sum = 0;
        // カートの商品の値段＊税込価格でそれぞれの小計を出し、合計金額に足す
        foreach($cartlist as $cart){
            $cart_sum += $cart->item_count *  $cart->item_master->item_price_in_tax;
        }
        

        return view('cart/index',compact('cartlist','cartItemInfo','cart_sum'));
    }

    public function test(){
        $cartlist = Cart::where('customer_id',auth()->id())->get();
    }
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('cart')->with('message', '商品をカートから削除しました。');
    }
    public function update(Request $request,$id){
        if ($request->method()  == 'PATCH') {
            $request->validate([
                'item_count' => 'required|integer|min:1|max:99',
            ]);
            // cart_idを指定して変更する
            $cart = Cart::findOrFail($id);
            $cart->item_count = $request->item_count;
            $cart->save();
            // 変更した結果を返す
            return response()->json([
                'status' => 'success',
                'cart_id' => $cart->id,
                'item_count' => $cart->item_count,
            ]);
        }
    }
}
