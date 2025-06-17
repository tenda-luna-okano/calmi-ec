<?php

namespace App\Http\Controllers;

use App\Models\CouponMaster;
use Illuminate\Http\Request;

class AdminCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = CouponMaster::all();
        return view ('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    //くーぽん発行画面を返すメソッド
    public function issue()
    {
         return view('admin.coupons.issue');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'coupon_name' => 'required|max:30',
           'coupon_code' => 'required|unique:coupon_masters,coupon_code|max:6|min:6|regex:/^[A-Z0-9]+$/',
           //基本的に「○日から使えます！」っていうのを想定しているのでdefaultは0にしておきます。
           //けど開始日をチェックしてその日だったらtrueに変えるっていうメソッドが必要
           'coupon_detail_explanation' => 'required',
           'coupon_start_day' => 'required|date',
           'coupon_sale_value' => 'required|min:1|max:99',
           'coupon_end_day' => 'nullable|date',
        ]);

        $validated['coupon_is_enable'] = 0;
        $validated['coupon_category'] = 1;

        CouponMaster::create($validated);

         return redirect()->route('admin.coupons.index')->with('message', 'クーポンを登録しました');
     
    }
    /**
     * Display the specified resource.
     */
    public function show(AdminCoupon $adminCoupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminCoupon $adminCoupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminCoupon $adminCoupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminCoupon $adminCoupon)
    {
        //
    }
}
