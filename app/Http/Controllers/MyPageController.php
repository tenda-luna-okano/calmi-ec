<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class MyPageController extends Controller
{
    //ユーザー情報変更
    public function edit_user(){
        return view('mypage.edit_user');
    }
    // 購入履歴
    public function history(){
        


        return view('mypage.purchase_history');
    }
}
