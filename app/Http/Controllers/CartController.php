<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\ItemMaster;

class CartController extends Controller
{
    //
    public function index(){
        $cartlist = Cart::where('customer_id',"=",auth()->id())->get();
        $cartItemInfo = Cart::with('item_master')->where('customer_id',"=",auth()->id())->get();
        return view('cart/index',compact('cartlist','cartItemInfo'));
    }

    public function test(){
        $cartlist = Cart::where('customer_id',auth()->id())->get();
    }
}
