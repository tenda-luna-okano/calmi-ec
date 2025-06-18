@php
    $categories = [
        '1' => 'ALL',
        '2' => 'アロマ',
        '3' => 'フード',
        '4' => 'タッチ',
        '5' => 'ご褒美スイーツ',
    ];
@endphp
@extends('layouts.admin')

@section('title', 'クーポン発行')

@section('content')
    <div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center m-6 ">クーポン発行</h1>
</div>
{{--エラーメッセージ、本番のときは変える--}}
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4 text-center">
        <ul class="list-none pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="flex justify-center items-center">
    <form method="POST" action="{{ route('admin.coupons.store') }}" class="max-w-md w-80">
        @csrf
        <div class="form-group justi＜fy-center mt-4 pb-4">
            <label for="coupon_name">インフルエンサー名</label>
            <input class="w-80" type="text" id="coupon_name" name="coupon_name" class="form-control" placeholder="インフルエンサー名を入力してください">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="coupon_code">クーポンコード（大文字英数字６桁）</label>
            <input class="w-80" type="text" id="coupon_code" name="coupon_code" class="form-control" placeholder="クーポンコードを入力してください">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="coupon_detail_explanation">説明</label>
            <textarea class="w-80" id="coupon_detail_explanation" name="coupon_detail_explanation" class="form-control" rows="4" placeholder="クーポンの説明を入力してください"></textarea>
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="coupon_start_day">開始日</label>
            <input class="w-80" type="date" id="coupon_start_day" name="coupon_start_day" class="form-control">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="coupon_end_day">終了日</label>
            <input class="w-80" type="date" id="coupon_end_day" name="coupon_end_day" class="form-control">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="coupon_stock">在庫数</label>
            <input class="w-80" type="number" id="coupon_stock" name="coupon_stock" class="form-control" placeholder="在庫数を入力してください">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="coupon_sale_value">割引率</label>
            <input class="w-80" type="number" id="coupon_sale_value" name="coupon_sale_value" class="form-control" placeholder="割引率を入力してください">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="category">カテゴリー</label>
            <select class="w-80" id="category" name="category" class="form-control">
                <option value="">選択してください</option>
                @foreach ($categories as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <div class="m-4 flex justify-center items-center">
            <button class="inline-flex h-12 items-center justify-center rounded-md bg-neutral-950 px-6 font-medium text-neutral-50 transition active:scale-110 ">クーポンを発行</button>
        </div>
    </form>
</div>
@endsection
