<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class WithdrawController extends Controller
{
    public function __construct()
    {
        // このコントローラーのすべてのメソッドでログイン必須にする
        $this->middleware('auth');
    }
    public function confirm()
    {
        return view('mypage.withdraw_confirm');
    }
    public function withdraw(Request $request)
    {
        $customer = auth()->user();
        $customer->delete();
        auth()->logout();

        return redirect()->route('top')->with('message', '退会が完了しました。');
    }
}
