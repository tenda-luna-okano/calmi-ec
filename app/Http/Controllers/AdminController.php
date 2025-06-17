<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index() {
        $admin = AdminUser::find(Auth::guard('admins')->id());

        return view('dashboard', compact('admin'));
    }
}
