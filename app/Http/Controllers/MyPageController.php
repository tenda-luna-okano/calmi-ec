<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class MyPageController extends Controller
{
    public function index(){
        if(Auth::guest()) {
        //ログインされていなかったらログインフォームを表示
        return view('auth.login');
        }else{
            $notifications = $this->notification();
            return view('mypage.index', compact('notifications','notifications'));
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

    //お知らせ
    public function notification(){
        $notifications = Notification::orderBy('notification_id','desc')->take(2)->get();
        return $notifications;
    }
}
