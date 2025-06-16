<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        //old version
        // // var_dump($request['customer_email'].$request['customer_password']);
        // $request->authenticate();

        // $request->session()->regenerate();

        // // return redirect()->intended(route('dashboard', absolute: false));
        // // return redirect(route('dashboard'));
        // return back();

        //new version----------------------------------------
        $credentials = $request->validate([
            // 'admin_email' => ['required', 'email'],
            // 'admin_email' => ['required'],
            // 'admin_password' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('customers')->attempt($credentials)) {
            $request->session()->regenerate();

            // return redirect()->intended('/admin/top')->with([
            return back();
        }

        return back()->withErrors([
            'message' => 'メールアドレスかパスワードが間違っています',
        ])->onlyInput('email');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('customers')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
