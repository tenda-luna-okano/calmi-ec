@extends('layouts.app')

@section('title', 'お問い合わせフォーム')

@section('content')
    <div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center mt-6 ">Contact</h1>
    <p class="text-center mb-6">お問い合わせ</p>
</div>
<form class="max-w-md mx-auto px-4">
    <div class="form-group m-4">
        <label for="name" class="text-left">お名前</label><br>
        <input type="text" id="name" name="name" class="form-control w-80" placeholder="お名前を入力してください">
    </div>
    <div class="form-group m-4">
        <label for="email">メールアドレス</label><br>
        <input type="email" id="email" name="email" class="form-control w-80" placeholder="メールアドレスを入力してください">
    </div>
    <div class="form-group m-4">
        <label for="message" class="text-left">お問い合わせ内容</label><br>
        <textarea id="message" name="message" class="form-control w-80" rows="4" placeholder="お問い合わせ内容を入力してください"></textarea>
    </div>
    <div class="flex justify-center mb-6">
            <button class="btn-primary px-4 py-2">
                送信
            </button>
        </div>
    </div>
</form>
@endsection
