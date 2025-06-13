<?php

namespace App\Http\Controllers;

use App\Models\AdminProduct;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = AdminProduct::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
<<<<<<< feature-logic-adminProductEdit
        // バリデーション（必要に応じて）
=======
        // バリデーション
>>>>>>> develop
        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_price_in_tax' => 'required|numeric',
            'item_stock' => 'required|integer',
            'item_img' => 'nullable|image',
        ]);

        // 画像保存処理
        $imagePath = null;
        if ($request->hasFile('item_img')) {
            $imagePath = $request->file('item_img')->store('product_images', 'public');
        }

        // 商品登録
        AdminProduct::create([
            'item_name' => $request->item_name,
            'item_category' => $request->item_category,
            'item_price_in_tax' => $request->item_price_in_tax,
            'seling_flg' => $request->seling_flg,
            'item_detail_explanation' => $request->item_detail_explanation,
            'item_img' => $imagePath,
            'item_stock'=> $request->item_stock,
        ]);

<<<<<<< feature-logic-adminProductEdit
        return redirect()->route('admin.products.index')->with('success', '商品が追加されました');
=======
        return redirect()->route('admin.products.index')->with('message', '商品が追加されました');
>>>>>>> develop
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminProduct $adminProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< feature-logic-adminProductEdit
    public function edit($item_id)
    {
        $product = AdminProduct::findOrFail($item_id);
        return view('admin.products.edit', compact('product'));
=======
    public function edit(AdminProduct $adminProduct)
    {
        //
>>>>>>> develop
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< feature-logic-adminProductEdit
    public function update(Request $request, $item_id)
    {
        $product = AdminProduct::findOrFail($item_id);

        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_price_in_tax' => 'required|numeric',
            'item_stock' => 'required|integer',
            'item_img' => 'nullable|image',
        ]);

        $product->update([
            'item_name' => $request->item_name,
            'item_price_in_tax' => $request->item_price_in_tax,
            'item_stock' => $request->item_stock,
            'seling_flg' => $request->seling_flg,
            'item_img' => $request->item_img,
        ]);

        return redirect()->route('admin.products.index')->with('success', '商品を更新しました');
=======
    public function update(Request $request, AdminProduct $adminProduct)
    {
        //
>>>>>>> develop
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminProduct $adminProduct)
    {
        //
    }
}
