<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminloginController extends Controller
{
    //
    public function create()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        // var_dump($request['customer_email'].$request['customer_password']);
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));

        $credentials = $request->validate([
            // 'admin_email' => ['required', 'email'],
            // 'admin_email' => ['required'],
            // 'admin_password' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            // return redirect()->intended('/admin/top')->with([
            return redirect('/admin/dashboard')->with([
                'message' => 'ログインしました'
           ]);
        }

        return back()->withErrors([
            'message' => 'メールアドレスかパスワードが間違っています',
        ])->onlyInput('email');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
