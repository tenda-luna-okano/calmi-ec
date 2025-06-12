@php
    $ages = [
        '1' => '10代',
        '2' => '20代',
        '3' => '30代',
        '4' => '40代',
        '5' => '50代',
        '6' => '60代',
    ];
    $product = 'チョコレート';
@endphp
@extends('layouts.app')

@section('title', 'レビュー投稿')

@section('content')
    <div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center m-6">レビュー投稿</h1>
</div>

<div class="bg-white mx-auto w-[90%] p-4 rounded shadow-md mt-5 mb-5">
    <div class="border-b border-[#201a1e] mb-4">
        <p class="text-left font-bold">レビュー</p>
    </div>

    <form method="POST" action="" class="space-y-4">
        <div class="text-center">
            <img src="https://placehold.jp/150x150.png" class="mx-auto mb-2">
            <h3 class="text-lg font-semibold">{{ $product }}</h3>
        </div>

        <div>
            <p class="font-semibold">評価</p>
            <div class="stars">
                @for ($i = 1; $i <= 5; $i++)
                    <input type="radio" name="review" id="review0{{ $i }}">
                    <label for="review0{{ $i }}">★</label>
                @endfor
            </div>
        </div>

        <div>
            <label for="title" class="block font-medium">レビュータイトル</label>
            <input id="title" name="title" type="text" placeholder="レビュータイトル" class="w-full border rounded px-2 py-1">
        </div>

        <div>
            <label for="nickname" class="block font-medium">ニックネーム</label>
            <input id="nickname" name="nickname" type="text" placeholder="ニックネームを入力してください" class="w-full border rounded px-2 py-1">
        </div>

        <div>
            <label for="email" class="block font-medium">メールアドレス</label>
            <input id="email" name="email" type="email" placeholder="メールアドレスを入力してください" class="w-full border rounded px-2 py-1">
        </div>

        <div>
            <label for="email_confirmation" class="block font-medium">メールアドレス（確認）</label>
            <input id="email_confirmation" name="email_confirmation" type="email" placeholder="もう一度メールアドレスを入力してください" class="w-full border rounded px-2 py-1">
        </div>

        <div>
            <label for="body" class="block font-medium">レビュー内容</label>
            <textarea id="body" name="body" rows="4" placeholder="レビュー内容" class="w-full border rounded px-2 py-1"></textarea>
        </div>

        <div>
            <label for="age" class="block font-medium">年代</label>
            <select id="age" name="age" class="w-full border rounded px-2 py-1">
                <option value="">選択してください</option>
                @foreach ($ages as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="bg-[#ccb09e] text-white px-6 py-2 rounded">投稿する</button>
        </div>
    </form>
</div>

@endsection
