<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        // 非ログインユーザー用のリダイレクト設定
        $middleware->redirectGuestsTo(function (Request $request) {
            if (request()->routeIs('admin.*')) {
                // return $request->expectsJson() ? null : route('admin.login');
                return redirect()->route('admin.login');
            }else{
                return redirect()->route('login');
            }
        });

        // ログインユーザー用のリダイレクト設定 これがあるとlogin->admin.login行ってしまいます。
        // おそらく、auth adminが使われている可能性
        $middleware->redirectUsersTo(function (Request $request) {
            if (request()->routeIs('admin.*')) {
                if(Auth::guard('admin')) {
                    return redirect()->route('admin.dashboard');
                    // return $request->expectsJson() ? null : route('admin.dashboard');
                }
            }else{
                // return redirect()->route('top');
                return route('top');
            }
        });

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
