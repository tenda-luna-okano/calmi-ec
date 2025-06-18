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

class EditUserController extends Controller
{
    public function show()
    {
        $userData = Customer::where('customer_id',"=",auth()->id())->first();
        // $userData = $userData[0];
        // dump($userData);
        $birthday_dayTime = explode(" ", $userData->customer_birthday);
        $birthday_data = explode("-",$birthday_dayTime[0]);
        $test = Customer::find(auth()->id());
        return view('mypage/edit_user',compact('userData','birthday_data','test'));
    }
    public function update(Request $request): RedirectResponse
    {
        if($request->is_change_password == 1){
            // validation
            $credentials = $request->validate([
                // 'customer_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
                // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'password' => ['required'],
                'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
                // 'new_password_confirmation' => ['required','min:8','max:128','alpha_dash'],
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
                'is_change_password' => 'max:1',
                // 'customer_status',
                // 'customer_subscribe_flg' => 'max:1',
                'mail_magazine_flg' => 'max:1',
            ]);

            $userdata = Customer::where('customer_id','=',auth()->id())->first();
            // $passwd = $userdata->password;
            // $typedPasswd = \Hash::make($credentials['password']);
            $checkPasswd = Hash::check($credentials['password'],$userdata->password);

            if(!$checkPasswd){
                return back()->with('passwd_error_msg','パスワードが間違っています。');
            }
            if($credentials['new_password'] == $credentials['new_password_confirmation']){
                return back()->with('passwd_error_msg','新しいパスワードが同一ではありません。');
            }

            //Customerテーブルに登録
            $customer = Customer::find(auth()->id());

            $customer->email=$credentials['email'];
            $customer->customer_first_name=$credentials['customer_first_name'];
            $customer->customer_last_name=$credentials['customer_last_name'];
            $customer->customer_first_furigana=$credentials['customer_first_furigana'];
            $customer->customer_last_furigana=$credentials['customer_last_furigana'];
            $customer->customer_tel=$credentials['customer_tel'];
            $customer->customer_post_number=$credentials['customer_post_number'];
            $customer->customer_birthday=$credentials['birthday_year']."-".$credentials['birthday_month']."-".$credentials['birthday_day'];
            $customer->customer_states=$credentials['customer_states'];
            $customer->customer_municipalities=$credentials['customer_municipalities'];
            $customer->customer_building_name=$credentials['customer_building_name'];
            $customer->mail_magazine_flg=$credentials['mail_magazine_flg'];
            $customer->password=\Hash::make($credentials['new_password']);


        }else{
            // validation
            $credentials = $request->validate([
                // 'customer_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
                // 'password' => ['required',  Rules\Password::defaults()],
                'password' => ['required','max:128','alpha_dash'],

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
                'is_change_password' => 'max:1',
                // 'customer_status',
                // 'customer_subscribe_flg' => 'max:1',
                'mail_magazine_flg' => 'max:1',
            ]);

            $userdata = Customer::where('customer_id','=',auth()->id())->first();
            // $passwd = $userdata->password;
            // $typedPasswd = \Hash::make($credentials['password']);
            $checkPasswd = Hash::check($credentials['password'],$userdata->password);

            if(!$checkPasswd){
                return back()->with('passwd_error_msg','パスワードが間違っています。');
            }

            //Customerテーブルに登録
            $customer = Customer::find(auth()->id());

            $customer->email=$credentials['email'];
            $customer->customer_first_name=$credentials['customer_first_name'];
            $customer->customer_last_name=$credentials['customer_last_name'];
            $customer->customer_first_furigana=$credentials['customer_first_furigana'];
            $customer->customer_last_furigana=$credentials['customer_last_furigana'];
            $customer->customer_tel=$credentials['customer_tel'];
            $customer->customer_post_number=$credentials['customer_post_number'];
            $customer->customer_birthday=$credentials['birthday_year']."-".$credentials['birthday_month']."-".$credentials['birthday_day'];
            $customer->customer_states=$credentials['customer_states'];
            $customer->customer_municipalities=$credentials['customer_municipalities'];
            $customer->customer_building_name=$credentials['customer_building_name'];
            $customer->mail_magazine_flg=$credentials['mail_magazine_flg'];
        }
        // dump($passwd.$typedPasswd);

        $customer->save();

        return redirect('/');

    }
}
