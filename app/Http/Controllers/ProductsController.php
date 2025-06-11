<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ItemMaster;
use App\Models\Review;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index');
    }


    // 商品詳細
    public function show(Request $request,$item_id){
        // item_idから基本的な情報を収納する変数
        $item = ItemMaster::where('item_id',$item_id)->first();
        
        $category_id = ItemMaster::where('item_id',$item_id)->first(['item_category']);
        // reviewをitem_idからレビューをすべて取得。
        $reviews = Review::where('review_item_id',$item_id)->take(2)->get();

        // review数を格納
        $review_num = Review::where('review_item_id',$item_id)->count();

        //おすすめの商品を5個格納する
        $recommends =  ItemMaster::where('item_category',$category_id)->take(5)->get();

        // cartに同じ商品が入っているかチェックするための変数　空なら商品追加、あるなら商品更新を行う
        $cart = Cart::where('customer_id',$request->session()->get('customer_id',1))->where('item_id',$item_id)->first();
        
        // viewを返す
        return view('products.show',compact('item','reviews','review_num','recommends','cart'));
        // return view('products.show',compact('items','reviews','item'));
    }

    // カートに入れる処理
    public function store(Request $request,$item_id){
        // すでにカートに入っているかチェック
        $cart_check = Cart::where('customer_id',$request->session()->get('customer_id',1))->where('item_id',$item_id)->first();

        $validated = $request->validate([
            // 商品個数を入力
            'item_count' => 'required | integer | between:1,99',
        ]);
        // $validated['item_count']=1;
        // ユーザーIDを登録
        $validated['customer_id']=$request->session()->get('customer_id',1);
        // 商品IDを登録
        $validated['item_id']=$item_id;
        $cart = Cart::create($validated);
        // dd($validated);
        return back();
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
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    // public function show(Products $products)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart, $cart_id)
    {
        
        // 入力された商品個数
        $validated = $request->validate([
            // 商品個数を入力
            'item_count' => 'required | integer | between:1,99',
        ]);
        $item_num_add = $request->validate([
            // 商品個数を入力
            'item_count' => 'required | integer | between:1,99',
        ]);
        //既存の商品個数
        $item_num = Cart::where('cart_id',$cart_id)->first(['item_count']);
        // if(count(DB::select('select * from carts where item_id=:item_id',['item_id'=>1]))>0){
        //     DB::update('update item_count set item_count + :item_count where customer_id=:customer_id AND item_id=:item_id',['item_count'=>$validated['item_count'],'customer_id'=>$request->session()->get('customer_id',1),'item_id'=>$item_id]);
        // }

        // dd($item_num);
        // dd($item_id);
        // 商品個数を合わせて格納する
        $validated['item_count']=$item_num;
        $item_num_add+=$item_num;
        // ユーザーIDを指定
        $validated['customer_id']=$request->session()->get('customer_id',1);
        // 商品IDを指定
        $validated['item_id']=Cart::where('cart_id',$cart_id)->first(['item_id']);
        // カートIDを指定
        $validated['cart_id']=$cart_id;
        // カートテーブルを更新する
        $cart->update($validated);

        // 直接updateする
        // Cart::where('customer_id',$request->session()->get('customer_id',1))->where('item_id',$item_id)->update([
        //     'cart_id'=>$item_id,
        //     'item_id'=>$item_id,
        //     'customer_id'=>$request->session()->get('customer_id',1),
        //     'item_count'=>$item_num_add,
        // ]);


        // 更新メッセージを表示
        $request->session()->flash('message','カートを更新しました');
        // 商品詳細ページに戻す
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }
}
