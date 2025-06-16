@extends('layouts.app')

@section('title', 'ご注文履歴詳細')

@section('content')
<div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center mt-6 ">Order Detail</h1>
    <p class="text-center mb-6">注文履歴詳細</p>
</div>
<div class="text-center m-4">
    <p>ご注文日：{{$order->created_at->format('Y/m/d')}}</p>
    <p>ご注文番号：{{$order->order_id}}</p>
    <p>ご注文金額：{{$order->order_price_in_tax}}円</p>
    <p>決済方法：{{ $order_method}}</p>
</div>
<!-- ご注文内容 -->
<h2 class="text-xl font-bold text-center mb-4">ご注文内容</h2>
<div class="flex flex-col items-center space-y-6 mb-8">
    {{-- 注文の商品があるだけ --}}
    @foreach($order_details as $order_detail)
    <!-- 商品2 -->
    <div class="flex flex-row items-center space-x-4">
        {{-- 画像が入っていなかったらロゴを出力するように --}}
        <img src="{{asset($order_detail->item_master->item_img??'img/logo.png')}}" alt="商品画像" class="w-36 h-36">
        <div class="text-left">
            {{-- 商品購入詳細 --}}
            <p>商品名：{{$order_detail->item_name}}</p>
            <p>価格：￥{{$order_detail->price_in_tax}}</p>
            <p>数量：{{$order_detail->count}}</p>
        </div>
    </div>
    <button class="bg-[#d0b49f] text-white px-4 py-2 rounded"><a href="{{route('products.show',$order_detail->item_id)}}">商品ページを見る</a></button>
    @endforeach
</div>

<!-- 合計 -->
<div class="text-center mb-6 font-bold">
    <p>ご注文合計（税込み）：￥{{$order->order_price_in_tax }}</p>
</div>

<!-- 戻るボタン -->
<div class="text-center mb-10">
</div>
@endsection