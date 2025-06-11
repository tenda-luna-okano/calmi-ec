<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CouponMaster;
class CouponController extends Controller
{
    public function index()
    {
        $coupons = CouponMaster::all();
        return view ('admin.coupons.index', compact('coupons'));
    }
}
