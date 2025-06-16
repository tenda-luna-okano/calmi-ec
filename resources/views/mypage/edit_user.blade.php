@extends('layouts.app')

@section('title', '会員情報変更')

@section('content')
<div class="border-b border-[#201a1e] mb-6">
            <h1 class="font-black text-3xl text-center mt-6 ">会員情報変更</h1>
            <p class="text-center mb-6"></p>
        </div>
    <form method="POST" action="{{ route('edit_user.update') }}">
        @csrf
        @method('put')

        <p>お客様情報入力</p>
        <hr>
        @if (session('passwd_error_msg'))
            <div class="text-red-600 font-bold">
                {{session('passwd_error_msg')}}
            </div>
        @endif

        {{-- <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}
        {{-- 名前 --}}
        <div>
            <x-input-label for="name_full">氏名（全角）</x-input-label>
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
            <x-input-error :messages="$errors->get('customer_first_name')" class="mt-2" />
            <x-input-error :messages="$errors->get('customer_first_name')" class="mt-2" />
            {{-- <p>error</p> --}}
            {{-- 氏名 --}}
            <div id="name_full">
                <label>姓</label>
                <input type="text" placeholder="例)田中" name="customer_first_name" value="{{$userData->customer_first_name ?? " "}}">
                <label>名</label>
                <input type="text" placeholder="例)太郎" name="customer_last_name" value="{{$userData->customer_last_name ?? " "}} ">
            </div>

            {{-- フリガナ --}}
            <x-input-label for="name_half">フリガナ（カタカナ）</x-input-label>
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
            <x-input-error :messages="$errors->get('customer_first_furigana')" class="mt-2" />
            <x-input-error :messages="$errors->get('customer_last_furigana')" class="mt-2" />
            {{-- <p>error</p> --}}
            <div id="name_half">
                <label>セイ</label>
                <input type="text" placeholder="例)タナカ" name="customer_first_furigana" value="{{$userData->customer_first_furigana ?? " "}}">
                <label>メイ</label>
                <input type="text" placeholder="例)タロウ" name="customer_last_furigana" value="{{$userData->customer_last_furigana ?? " "}}">
            </div>
        </div>
        <hr>
        {{-- 生年月日 --}}
        <div>
            <x-input-label for="birth">生年月日</x-input-label>
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
            <x-input-error :messages="$errors->get('birthday_year')" class="mt-2" />
                <x-input-error :messages="$errors->get('birthday_month')" class="mt-2" />
                    <x-input-error :messages="$errors->get('birthday_day')" class="mt-2" />
                {{-- <p>error</p> --}}
            <div id="birth">
                {{-- 年 --}}
                <select name="birthday_year" id="year">
                    <option value="">選択してください</option>
                    @for($i = 1900; $i <= 2025; $i++)
                        <option value="{{$i}}" @if ($birthday_data[0] == $i) selected @endif>{{$i}}</option>
                    @endfor
                </select>
                <label>年</label>
                {{-- 月 --}}
                <select name="birthday_month" id="month">
                    <option value="">選択してください</option>
                    @for($i = 1; $i <= 12; $i++)
                        <option value="{{$i}}" @if ($birthday_data[1] == $i) selected @endif>{{$i}}</option>
                    @endfor
                </select>
                <label>月</label>
                {{-- 日 --}}
                <select name="birthday_day" id="day">
                    <option value="">選択してください</option>
                    @for($i = 1; $i <= 31; $i++)
                        <option value="{{$i}}" @if ($birthday_data[2] == $i) selected @endif>{{$i}}</option>
                    @endfor
                </select>
                <label>日</label>
            </div>
        </div>
        <hr>

        {{-- 電話番号 --}}
        <div>
            <x-input-label for="tel">電話番号</x-input-label>
            <label>必須</label>

            {{-- エラーメッセージエリア --}}
            <x-input-error :messages="$errors->get('customer_tel')" class="mt-2" />
                {{-- <p>error</p> --}}
            <div id="tel">
                <input type="text" placeholder="例)08012345678" name="customer_tel" value="{{$userData->customer_tel ?? " "}}">
            </div>
        </div>
        <hr>

        {{-- 郵便番号 --}}
        <div>
            <x-input-label for="address">郵便番号</x-input-label>
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
            <x-input-error :messages="$errors->get('customer_post_number')" class="mt-2" />
                {{-- <p>error</p> --}}
            <div id="address">
                <input type="text" placeholder="1330052" name="customer_post_number" value="{{$userData->customer_post_number ?? " "}}">
            </div>
        </div>

        {{-- 都道府県 --}}
        <div>
            <x-input-label for="pref"> 都道府県</x-input-label>
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
                {{-- <p>error</p> --}}
            <select type="text" class="form-control" name="customer_states" id="pref">
                @foreach(config('pref') as $key => $score)
                    <option value="{{ $score }}" @if ($userData->customer_states == $score) selected @endif>{{ $score }}</option>
                @endforeach
           </select>

        </div>
        {{-- 市区町村・丁目・番地 --}}
        <div>
            <x-input-label for="city">市区町村・丁目・番地</x-input-label>
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
            <x-input-error :messages="$errors->get('customer_municipalities')" class="mt-2" />
            <x-input-error :messages="$errors->get('customer_building_name')" class="mt-2" />
                {{-- <p>error</p> --}}
            <div id="city">
                <input type="text" placeholder="例）千代田区千代田1番1号" name="customer_municipalities" value="{{$userData->customer_municipalities ?? " "}}">
            </div>
        </div>
        {{-- マンション・建物名など --}}
        <div>
            <x-input-label for="mansion">マンション・建物名など</x-input-label>
            <input type="text" placeholder="例） 〇〇マンション101号室" id="mansion" name="customer_building_name" value="{{$userData->customer_building_name ?? " "}}">
        </div>
        <hr>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            {{-- <p>error</p> --}}
            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$userData->email ?? " "}}" required autocomplete="username" />
        </div>

        <hr>


        <hr>
        {{-- パスワード変更確認 --}}
         <div class="flex">
            <fieldset>
                <legend>パスワードを変更する場合は入力してください</legend>
                <div class="flex-1">
                    <input type="radio" id="change" name="is_change_password" value="1"/>
                    <label for="change">変更する</label>
                </div>
                <div class="flex-1">
                    <input type="radio" id="not_change" name="is_change_password" value="0" checked/>
                    <label for="not_change">変更しない</label>
                </div>

            </fieldset>

        </div>

        <!-- 現在のPassword（一致チェックを行う） -->
        <div class="mt-4">
            <x-input-label for="password" value="現在のパスワード" />
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            {{-- <p>error</p> --}}
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>


        <!-- 新しいPassword -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
            <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
            {{-- <p>error</p> --}}
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="new_password"
                            autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <label>必須</label>
            <x-input-error :messages="$errors->get('new_password_confirmation')" class="mt-2" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="new_password_confirmation" autocomplete="new-password" />
        </div>
        <hr>

        {{-- メールマガジン配信 --}}
        <div class="flex">
            <fieldset>
                <legend>メールマガジン配信</legend>
                <div class="flex-1">
                    <input type="radio" id="accept" name="mail_magazine_flg" value="1"/>
                    <label for="accept">希望する</label>
                </div>
                <div class="flex-1">
                    <input type="radio" id="not_accept" name="mail_magazine_flg" value="0" checked/>
                    <label for="not_accept">希望しない</label>
                </div>

            </fieldset>

        </div>

        <div class="flex items-center justify-end mt-4">
            {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a> --}}

            {{-- <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button> --}}
            <x-primary-button>
                会員情報変更
            </x-primary-button>
        </div>
    </form>
@endsection
