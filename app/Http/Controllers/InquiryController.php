<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index()
    {
        return view ('contact.index');
    }

    public function store(Request $request)
    {
        //バリデーション
        $validated = $request->validate([
            'customer_nickname' => ['required', 'string', 'max:30'],
            //strict:メールアドレスの書き方が正しくないと、受け付けない。
            //dsn:ドメインが有効でないアドレスがはじかれる
            'customer_mail' => ['required', 'string', 'email:strict,dns','max:255'],
            'inquiry_content' =>['required', 'string', 'min:30', 'max:400'],
        ]);

        Inquiry::create([
            'customer_nickname' => $validated['customer_nickname'],
            'customer_mail' => $validated['customer_mail'],
            'inquiry_content' => $validated['inquiry_content'],
            'answered_flg' => 0,
        ]);

        return redirect()->route('top')->with('message','お問い合わせを受付しました');
    }
}
