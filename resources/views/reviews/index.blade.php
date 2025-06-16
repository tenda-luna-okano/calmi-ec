
@php
    $ages = [
        '10' => '10代',
        '20' => '20代',
        '30' => '30代',
        '40' => '40代',
        '50' => '50代',
        '60' => '60代',
    ];
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
    @if ($errors->any())
        <div class="text-red-500 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>・{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('reviews.store') }}" class="space-y-4">
        
        @csrf
        <div class="text-center">
            <img src="https://placehold.jp/150x150.png" class="mx-auto mb-2">
            <h3 class="text-lg font-semibold">{{ $item['name'] }}</h3>
        </div>
        <div>
            <p class="font-semibold">評価</p>
            <div class="stars">
            @for ($i = 1; $i <= 5; $i++)
                <input type="radio" name="review_star" id="review0{{ $i }}" value="{{ $i }}">
                <label for="review0{{ $i }}">★</label>
             @endfor
            </div>
        </div>

        <div>
            <label for="review_name" class="block font-medium">レビュータイトル</label>
            <input id="review_name" name="review_name" type="text" placeholder="レビュータイトル" class="w-full border rounded px-2 py-1">
        </div>

        <div>
            <label for="customer_nickname" class="block font-medium">ニックネーム</label>
            <input id="customer_nickname" name="customer_nickname" type="text" placeholder="ニックネームを入力してください" class="w-full border rounded px-2 py-1">
        </div>

        <div>
            <label for="customer_mail" class="block font-medium">メールアドレス</label>
            <input id="customer_mail" name="customer_mail" type="email" placeholder="メールアドレスを入力してください" class="w-full border rounded px-2 py-1">
        </div>
        <div>
            <label for="review_content" class="block font-medium">レビュー内容</label>
            <textarea id="review_content" name="review_content" rows="4" placeholder="レビュー内容" class="w-full border rounded px-2 py-1"></textarea>
        </div>

        <div>
            <label for="reviewer_age" class="block font-medium">年代</label>
            <select id="reviewer_age" name="reviewer_age" class="w-full border rounded px-2 py-1">
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
