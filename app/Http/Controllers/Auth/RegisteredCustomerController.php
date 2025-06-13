<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Customer;

class RegisteredCustomerController extends Controller
{

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
        $credentials = $request->validate([
            // 'customer_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Customer::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password' => ['required','min:8','max:128','alpha_dash'],
            'customer_first_name' => ['required', 'string',],
            'customer_last_name' =>  ['required', 'string',],
            'customer_first_furigana' => ['required', 'string','regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',],
            'customer_last_furigana' => ['required', 'string','regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',],
            'customer_tel' => ['required', 'digits_between:10,11'],
            'customer_post_number' => ['required', 'digits:7'],
            // 'customer_birthday'=>  ['required', 'digits:7'],
            // 生年月日のバリデーション
            'birthday_year' => 'required|integer|date_format:Y',
            'birthday_month' => 'required|between:1,12',
            'birthday_day' => 'required|between:1,31',
            'payment_id',
            // 'customer_states' => '東京都',
            'customer_states' => 'required|string',
            // 'customer_municipalities' => '江戸川区',
            'customer_municipalities' => 'required|string',
            // 'customer_building_name' => 'TKP',
            'customer_building_name' => 'required|string',
            // 'customer_status',
            // 'customer_subscribe_flg' => 'max:1',
            'mail_magazine_flg' => 'max:1',
        ]);



        //Customerテーブルに登録
        $user = Customer::create([
            'email' => $credentials['email'],
            'password' => \Hash::make($credentials['password']),
            'customer_first_name' => $credentials['customer_first_name'],
            'customer_last_name' =>  $credentials['customer_last_name'],
            'customer_first_furigana' => $credentials['customer_first_furigana'],
            'customer_last_furigana' => $credentials['customer_last_furigana'],
            'customer_tel' => $credentials['customer_tel'],
            'customer_post_number' => $credentials['customer_post_number'],
            'customer_birthday' => $credentials['birthday_year']."-".$credentials['birthday_month']."-".$credentials['birthday_day'],
            'payment_id' => NULL,
            'customer_states' => $credentials['customer_states'],
            'customer_municipalities' => $credentials['customer_municipalities'],
            'customer_building_name' => $credentials['customer_building_name'],
            'customer_status' => 1,
            'customer_subscribe_flg' => 0,
            'mail_magazine_flg' => $credentials['mail_magazine_flg'],
            // 'created_at' =>
            // 'update_at' =>
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
