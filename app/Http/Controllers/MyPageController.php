<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index(){
        if(Auth::guest()) {
        //ログインされていなかったらログインフォームを表示
        return view('auth.login');
        }else{
        return view('mypage.index');
    }
    }
    //ユーザー情報変更
    public function edit_user(){
        return view('mypage.edit_user');
    }
    // 購入履歴
    public function history(){
        return view('mypage.purchase_history');
    }
}
