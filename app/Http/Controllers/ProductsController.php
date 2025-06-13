<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ItemMaster;
use App\Models\Review;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\CategoryMaster;



class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //公開中の商品のみ取得
        $items = ItemMaster::where('seling_flg',1)->get();
        $count = ItemMaster::where('seling_flg',1)->count();
        // 今現在実装されているカテゴリーを取得
        $categories = CategoryMaster::get();
        
        // カテゴリー絞り込みのためのカテゴリーID
        $item_category = $request->categoryId;
        // クエリ作成
        $query = ItemMaster::query();

        // 値段絞り込みするかどうかチェックし、クエリ追加
        if(isset($request->max_price)&&isset($request->min_price)){
            $query->whereBetween('item_price_in_tax',[$request->min_price,$request->max_price]);
        }elseif(isset($request->max_price)){ //上限だけ決められたとき
            $query->where('item_price_in_tax','<',intval($request->max_price));
        }elseif(isset($request->min_price)){ //下限だけ決められたとき
            $query->where('item_price_in_tax','>',intval($request->min_price));
        }
        // カテゴリー絞り込みをするかチェックし、クエリ追加
        if(isset($item_category)){
            $query->where('item_category',$item_category);
        }
        $query->where('seling_flg',1);
        // 並び替え順を指定
        $sort=$request->sort;
        if($sort==1){
            $query->orderBy('item_price_in_tax','asc');
        }elseif($sort==2){
            $query->orderBy('item_price_in_tax','desc');
        }
        elseif($sort==3){
            $query->orderBy('created_at','desc');
        }
        // クエリを指定して商品データを取得
        $items=$query->get();
        // 商品個数を取得
        $count=$query->count();
        // ビューをデータとともに返す
        return view('products.index', compact('items','count','categories'));
    }


    // 商品詳細
    public function show(Request $request,$item_id){
        // item_idから基本的な情報を収納する変数
        $item = ItemMaster::where('item_id',$item_id)->first();
        // カテゴリーの種類を取得
        $category_id = ItemMaster::where('item_id',$item_id)->first(['item_category']);
        
        // reviewをitem_idからレビューを2件取得。
        $reviews = Review::where('review_item_id',$item_id)->take(2)->get();
        // すべてのレビュー件数を取得
        $review_num = Review::where('review_item_id',$item_id)->count();
        // 上で取得した以外のすべてのレビューを取得
        $all_reviews = collect(); // 空のコレクション
        if ($review_num > 2) {
            $all_reviews = Review::where('review_item_id', $item_id)->skip(2)->take($review_num - 2)->get();
        }
        //おすすめの商品を5個格納する
        $recommends =  ItemMaster::where('item_category',$category_id->item_category)->take(5)->get();
        // cartに同じ商品が入っているかチェックするための変数　空なら商品追加、あるなら商品更新を行う
        $cart = Cart::where('customer_id',$request->session()->get('customer_id',1))->where('item_id',$item_id)->first();
        
        // viewを返す
        return view('products.show',compact('item','reviews','all_reviews','review_num','recommends','cart'));
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
         // 更新メッセージを表示
        $request->session()->flash('message','カートに挿入しました');
        // dd($validated);
        return back();
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
    public function update(Request $request, Cart $cart)
    {

        // 商品IDを取得
        $item_id =  Cart::first(['item_id']);

        
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

        $item_num = Cart::where('item_id',$item_id)->first(['item_count']);
        // dd(intval($item_num_add['item_count']));
        // dd(intval($item_num['item_count']));
        // 商品個数を合わせて格納する
        $validated['item_count']=intval($item_num_add['item_count'])+intval($item_num['item_count']);

        // $item_num_add+=$item_num;
        // ユーザーIDを指定
        $validated['customer_id']=$request->session()->get('customer_id',1);
        // 商品IDを指定

        $validated['item_id']=Cart::where('item_id',$item_id)->first(['item_id']);
        // カートIDを指定
        // $validated['cart_id']=$cart_id;
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
