@extends('layouts.app')

@section('title', '会員登録')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <p>お客様情報入力</p>
        <hr>

        {{-- <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}
        {{-- 名前 --}}

        <div>
            <label>氏名（全角）</label>
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
            <p>error</p>
            {{-- 氏名 --}}
            <div>
                <label>姓</label>
                <input type="text" placeholder="例)田中" name="customer_first_name">
                <label>名</label>
                <input type="text" placeholder="例)太郎" name="customer_last_name">
            </div>
            {{-- フリガナ --}}
            <div>
                <label>セイ</label>
                <input type="text" placeholder="例)タナカ" name="customer_first_furigana">
                <label>メイ</label>
                <input type="text" placeholder="例)タロウ" name="customer_last_furigana">
            </div>
        </div>
        <hr>
        {{-- 生年月日 --}}
        <div>
            <label>生年月日</label>
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
                <p>error</p>
            <div>
                {{-- 年 --}}
                <select name="birthday_year" id="year">
                    <option value="">選択してください</option>
                    @for($i = 2025; $i >= 1900; $i--)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <label>年</label>
                {{-- 月 --}}
                <select name="birthday_month" id="month">
                    <option value="">選択してください</option>
                    @for($i = 1; $i <= 12; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <label>月</label>
                {{-- 日 --}}
                <select name="birthday_day" id="day">
                    <option value="">選択してください</option>
                    @for($i = 1; $i <= 31; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <label>日</label>
            </div>
        </div>
        <hr>

        {{-- 電話番号 --}}
        <div>
            <label>電話番号</label>
            <label>必須</label>

            {{-- エラーメッセージエリア --}}
                <p>error</p>
            <div>
                <input type="text" placeholder="例)08012345678" name="customer_tel">
            </div>
        </div>
        <hr>

        {{-- 郵便番号 --}}
        <div>
            <label>郵便番号</label>
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
                <p>error</p>
            <div>
                <input type="text" placeholder="1330052" name="customer_post_number">
            </div>
        </div>

        {{-- 都道府県 --}}
        <div>
            <label> 都道府県</label>
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
                <p>error</p>
            <select type="text" class="form-control" name="customer_states">
                @foreach(config('pref') as $key => $score)
                    <option value="{{ $score }}">{{ $score }}</option>
                @endforeach
           </select>

        </div>
        {{-- 市区町村・丁目・番地 --}}
        <div>
            <p>市区町村・丁目・番地</p>
            <label>必須</label>
            {{-- エラーメッセージエリア --}}
                <p>error</p>
            <input type="text" placeholder="例）千代田区千代田1番1号" name="customer_municipalities">
        </div>
        {{-- マンション・建物名など --}}
        <div>
            <p>マンション・建物名など</p>
            <input type="text" placeholder="例） 〇〇マンション101号室" name="customer_building_name">
        </div>
        <hr>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <label>必須</label>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <hr>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <label>必須</label>
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <label>必須</label>
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <hr>

        {{-- メールマガジン配信 --}}
        <div class="flex">
            <fieldset>
                <legend>メールマガジン配信</legend>
                <div class="flex-1">
                    <input type="radio" id="not_accept" name="mail_magazine_flg" value="1"/>
                    <label for="not_accept">希望する</label>
                </div>
                <div class="flex-1">
                    <input type="radio" id="accept" name="mail_magazine_flg" value="0" checked/>
                    <label for="accept">希望しない</label>
                </div>

            </fieldset>

        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
@endsection
