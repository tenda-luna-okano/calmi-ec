<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ItemMaster;
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
    public function show(Products $products)
    {
        //
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
}
