


@extends('layouts.app')

@section('title', 'login')

@section('content')
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="pt-6 pb-6 flex justify-center">
        <h2 class=" underline decoration-#201a1e decoration-3 underline-offset-8">　　　login　　　</h2>
    </div>

    <div class="bg-white pb-6 pt-6  pr-6 pl-6 w-5/6 mx-auto">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="w-5/6 mx-auto" >
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 w-5/6 mx-auto">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4 w-5/6 mx-auto">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4 w-5/6 mx-auto">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        <button class="btn-primary mx-auto  mb-4 mt-4 flex justify-center w-140">
            {{ __('Log in') }}
        </button>
    </form>
    <div class="divide-y-2 divide-black-400 flex justify-center">
        <div ></div>
        <div class="">
            <button class="btn-primary mt-4 w-140" onclick="location.href='{{ route('register') }}'">
                新規会員登録
            </button>
        </div>
    </div>


    </div>
    <div class="mt-6">

    </div>

@endsection
