<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //order_confirmを表示させる
    public function confirm(){
        return view('orders.confirm');
    }
}
