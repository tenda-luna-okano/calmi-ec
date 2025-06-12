


@extends('layouts.app')

@section('title', 'withdrawal')

@section('content')
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="pt-6 pb-6 flex justify-center">
        <h2 class=" underline decoration-#201a1e decoration-3 underline-offset-8">　　　退会　　　</h2>
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


