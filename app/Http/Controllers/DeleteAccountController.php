<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeleteAccountController extends Controller
{
    //
    public function delete(){
        return view('mypage/withdraw');
    }
}
