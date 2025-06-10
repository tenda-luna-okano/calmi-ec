<?php

namespace App\Http\Controllers;

use App\Models\AdminCoupon;
use Illuminate\Http\Request;

class AdminCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $coupon = new Coupon;
        $coupon->coupon_name = $request->coupon_name;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_detail_explanation = $request->coupon_detail_explanation;
        //基本的に「○日から使えます！」っていうのを想定しているのでdefaultは0にしておきます。
        //けど開始日をチェックしてその日だったらtrueに変えるっていうメソッドが必要
        $coupon->coupon_is_enable = 0;
        $coupon->coupon_start_day = $request->coupon_start_day;
        $coupon->coupon_end_day = $request -> coupon_end_day;
        $coupon->coupon_stock = $request -> coupon_stock;
        $coupon->coupon_category = $request->coupon_category;
     
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
