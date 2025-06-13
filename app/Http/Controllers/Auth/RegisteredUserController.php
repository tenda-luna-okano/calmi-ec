<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Customer;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // validation
        $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_first_name' => ['required', 'string',],
            'customer_last_name' =>  ['required', 'string',],
            'customer_first_furigana' => ['required', 'string','regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',],
            'customer_last_furigana' => ['required', 'string','regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',],
            'customer_tel' => ['required', 'digits_between:10,11'],
            'customer_post_number' => ['required', 'digits:7'],
            'customer_birthday'=>  ['required', 'digits:7'],
            // 生年月日のバリデーション
            'birthday_year' => 'required|integer|date_format:Y',
            'birthday_month' => 'required|between:1,12',
            'birthday_day' => 'required|between:1,31',
            'payment_id' => NULL,

            'customer_states' => '東京都',
            'customer_municipalities' => '江戸川区',
            'customer_building_name' => 'TKP',
            'customer_status' => 1,
            'customer_subscribe_flg' => 0,
            'mail_magazine_flg' => 1,
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Customer::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 生年月日が正しい日付かどうか



        //Customerテーブルに登録
        $user = Customer::create([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
