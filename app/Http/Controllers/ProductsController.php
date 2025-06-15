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
    public function index()
    {
        //公開中の商品のみ取得
        $items = ItemMaster::where('seling_flg',1)->get();
        $count = ItemMaster::where('seling_flg',1)->count();
        // 今現在実装されているカテゴリーを取得
        $category = CategoryMaster::get();

        // ビューをデータとともに返す
        return view('products.index', compact('items','count','category'));
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
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }

    public function search(Request $request)
    {
        //検索ワードの取得
        $SearchWord=$request->input('search');
        
        //検索ワードを含むレコード取得
        $resultItem=ItemMaster::where('item_name','like','%'.$SearchWord.'%')->get();
        $itemCount=$resultItem->count();
        
        return view('search.results',['SearchWord'=>$SearchWord,'resultItem'=>$resultItem,'itemCount'=>$itemCount]);
    }

    public function category($IdName)
    {
        $Id=0;
        if($IdName=="アロマ")$Id=1;
        else if($IdName=="フード")$Id=2;
        else if($IdName=="タッチ")$Id=3;
        else $Id=4;
        
        //同ジャンルのレコード取得
        $resultItem=ItemMaster::where('item_category',$Id)->get();
        $itemCount=$resultItem->count();
        return view('search.results',['resultItem'=>$resultItem,'itemCount'=>$itemCount]);
    }
}
