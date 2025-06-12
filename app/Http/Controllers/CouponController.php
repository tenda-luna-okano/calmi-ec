<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CouponMaster;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = CouponMaster::all();
        return view ('admin.coupons.index', compact('coupons'));
    }

    public function edit ($coupon_id)
    {
        $coupon = CouponMaster::findOrFail($coupon_id);
        return view('admin.coupons.update', compact('coupon'));
    }
    public function update(Request $request, $coupon_id)
    {
        $coupon = CouponMaster::findOrFail($coupon_id);

        $request->validate([
            'coupon_name' => 'required|max:30',
            'coupon_code' => [
                            'required',
                            'max:6',
                            'min:6',
                            'regex:/^[A-Z0-9]+$/',
                            Rule::unique('coupon_masters', 'coupon_code')->ignore($coupon_id, 'coupon_id'),
                        ],
            //基本的に「○日から使えます！」っていうのを想定しているのでdefaultは0にしておきます。
            //けど開始日をチェックしてその日だったらtrueに変えるっていうメソッドが必要
            'coupon_detail_explanation' => 'required',
            'coupon_start_day' => 'required|date',
            'coupon_sale_value' => 'required|min:1|max:99',
            'coupon_end_day' => 'required|date|after:coupon_start_day',
            'coupon_is_enable' => 'required|boolean',
        ]);

        $coupon->update([
            'coupon_name' => $request->coupon_name,
            'coupon_code' => $request->coupon_code,
            'coupon_detail_explanation' => $request->coupon_detail_explanation,
            'coupon_start_day' => $request->coupon_start_day,
            'coupon_sale_value' => $request->coupon_sale_value,
            'coupon_end_day' => $request->coupon_end_day,
            'coupon_is_enable' => $request->coupon_is_enable,
            
        ]);

        return redirect()->route('admin.coupons.index')->with('message', 'クーポンを更新しました');
    }
}
