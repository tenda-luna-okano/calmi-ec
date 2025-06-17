


@extends('layouts.app')

@section('title', 'withdrawal')

@section('content')
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="border-b border-[#201a1e] mb-6">
        <h1 class="font-black text-3xl text-center mt-6 ">Withdraw</h1>
        <p class="text-center mb-6">退会完了</p>
    </div>

    <div class="bg-white pb-9 pt-6  pr-6 pl-6 w-5/6 mx-auto mb-8">
    <div class="my-8 pb-8">
        <p class="flex justify-center mt-8">退会処理が完了しました</p>
    </div>


    <div class="flex justify-center mb-6 mt-8">
        <button class="btn-primary mt-4 w-140" onclick="location.href='#トップページへのリンク'">
            トップページへ
        </button>
    </div>


    </div>


@endsection


