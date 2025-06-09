


@extends('layouts.app')

@section('title', 'login')

@section('content')
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="m-auto pt-6 pb-6">
        <h2 class="mx-8">login</h2>
    </div>

    <div class="bg-white pb-6 pt-6 mr-8 ml-8 pr-6 pl-6">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div  >
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        <button class="btn-primary mx-auto">
            {{ __('Log in') }}
        </button>
    </form>
    <button class="btn-primary mx-auto" onclick="location.href='{{ route('register') }}'">
        新規会員登録
    </button>

    </div>
    <div class="mt-6">

    </div>

@endsection
