@extends('layouts.app')

@section('title', '会員登録')

@section('content')

        
        <div class="border-b border-[#201a1e] mb-6">
            <h1 class="font-black text-3xl text-center mt-6 ">Sign Up</h1>
            <p class="text-center mb-6">新規会員登録</p>
        </div>
<div class="bg-white pb-6 pt-6 rounded shadow-sm mb-4 pr-6 pl-6 w-5/6 mx-auto">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}
        {{-- 名前 --}}

        <div class="mb-4">
            <label>氏名（全角）</label>
            <span class="text-red-500">必須</span>
            {{-- エラーメッセージエリア --}}
            <p>error</p>
            {{-- 氏名 --}}
            <div>
                <label class="block mb-1">姓</label>
                <input type="text" class="w-full border rounded px-3 py-2" placeholder="例)田中" name="customer_first_name"><br>
                <label>名</label>
                <input type="text" class="w-full border rounded px-3 py-2"placeholder="例)太郎" name="customer_last_name">
            </div>
            {{-- フリガナ --}}
            <div>
                <label>セイ</label>
                <input type="text" class="w-full border rounded px-3 py-2" placeholder="例)タナカ" name="customer_first_furigana"><br>
                <label>メイ</label>
                <input type="text"  class="w-full border rounded px-3 py-2" placeholder="例)タロウ" name="customer_last_furigana">
            </div>
        </div>
        <hr>
        {{-- 生年月日 --}}
        <div>
            <label>生年月日</label>
            <span class="text-red-500">必須</span>
            {{-- エラーメッセージエリア --}}
                <p>error</p>
            <div class="mb-4 flex space-x-2">
                {{-- 年 --}}
                <div class="flex-1">
                    <select class="border rounded" name="birthday_year" id="year">
                        <option value=""></option>
                        @for($i = 2025; $i >= 1900; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <label>年</label>
                </div>
                {{-- 月 --}}
                <div class="flex-1">
                    <select class="border rounded" name="birthday_month" id="month">
                        <option value=""></option>
                        @for($i = 1; $i <= 12; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <label>月</label>
                </div>
                {{-- 日 --}}
                <div class="flex-1">
                    <select class="border rounded" name="birthday_day" id="day">
                        <option value=""></option>
                        @for($i = 1; $i <= 31; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <label>日</label>
                </div>
            </div>
        </div>
        <hr>

        {{-- 電話番号 --}}
        <div class="mb-4">
            <label>電話番号</label>
            <span class="text-red-500">必須</span>

            {{-- エラーメッセージエリア --}}
                <p>error</p>
            <div>
                <input type="text" class="border rounded" placeholder="例)08012345678" name="customer_tel">
            </div>
        </div>
        <hr>
        <div class="mb-4">
        {{-- 郵便番号 --}}
        <div class="mb-4">
            <label>郵便番号</label>
            <span class="text-red-500">必須</span>
            {{-- エラーメッセージエリア --}}
                <p>error</p>
            <div>
                <input type="text" class="border rounded" placeholder="1330052" name="customer_post_number">
            </div>
        </div>

        {{-- 都道府県 --}}
        <div class="mb-4">
            <label> 都道府県</label>
            <span class="text-red-500">必須</span>
            {{-- エラーメッセージエリア --}}
                <p>error</p>
            <select class="border rounded" type="text" class="form-control" name="customer_states">
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
            <input type="text" class="border rounded" placeholder="例）千代田区千代田1番1号" name="customer_municipalities">
        </div>
        {{-- マンション・建物名など --}}
        <div class="mb-4">
            <p>マンション・建物名など</p>
            <input type="text" class="border rounded" placeholder="例） 〇〇マンション101号室" name="customer_building_name">
        </div>
        <hr>
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <span class="text-red-500">必須</span>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-4">
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <span class="text-red-500">必須</span>
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <span class="text-red-500">必須</span>
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        </div>
        <hr>

        {{-- メールマガジン配信 --}}
        <div class="flex mb-4">
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
        <div class="flex justify-center mb-4">
            <x-primary-button class="btn-primary">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        <div class="flex justify-center">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</div>

@endsection
