@extends('layouts.app')
@php
    $order = ['order_id' => 1,
            'created_at' => '2025/06/09',
            'order_price_tax_in' => "12300",
            'payment' => 'クレジット',
            ]
@endphp
@section('title', 'ご注文履歴詳細')

@section('content')
<div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center mt-6 ">Order Detail</h1>
    <p class="text-center mb-6">注文履歴詳細</p>
</div>
<div class="text-center m-4">
    <p>ご注文日：{{ $order['created_at'] }}</p>
    <p>ご注文番号：{{ $order['order_id'] }}</p>
    <p>ご注文金額：{{ $order['order_price_tax_in'] }}</p>
    <p>決済方法：{{ $order['payment'] }}</p>
</div>
<!-- ご注文内容 -->
<h2 class="text-xl font-bold text-center mb-4">ご注文内容</h2>
<div class="flex flex-col items-center space-y-6 mb-8">

    <!-- 商品1 -->
    <div class="flex flex-row items-center space-x-4">
        <img src="https://placehold.jp/150x150.png" alt="商品画像" class="w-36 h-36">
        <div class="text-left">
            <p>商品名：チョコレート</p>
            <p>価格：￥300</p>
            <p>数量：2</p>
        </div>
    </div>
    <button class="bg-[#d0b49f] text-white px-4 py-2 rounded">商品ページを見る</button>

    <!-- 商品2 -->
    <div class="flex flex-row items-center space-x-4">
        <img src="https://placehold.jp/150x150.png" alt="商品画像" class="w-36 h-36">
        <div class="text-left">
            <p>商品名：キャンディ</p>
            <p>価格：￥500</p>
            <p>数量：1</p>
        </div>
    </div>
    <button class="bg-[#d0b49f] text-white px-4 py-2 rounded">商品ページを見る</button>

    <!-- 商品3 -->
    <div class="flex flex-row items-center space-x-4">
        <img src="https://placehold.jp/150x150.png" alt="商品画像" class="w-36 h-36">
        <div class="text-left">
            <p>商品名：クッキー</p>
            <p>価格：￥700</p>
            <p>数量：1</p>
        </div>
    </div>
    <button class="bg-[#d0b49f] text-white px-4 py-2 rounded">商品ページを見る</button>

</div>

<!-- 合計 -->
<div class="text-center mb-6 font-bold">
    <p>ご注文合計（税込み）：￥{{ number_format($order['order_price_tax_in']) }}</p>
</div>

<!-- 戻るボタン -->
<div class="text-center mb-10">
</div>
@endsection