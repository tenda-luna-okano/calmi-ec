@php
    $categories = [
        '1' => 'ALL',
        '2' => 'アロマ',
        '3' => 'フード',
        '4' => 'タッチ',
        '5' => 'ご褒美スイーツ',
        '6' => 'サプリ',
    ];
@endphp
@extends('layouts.admin')

@section('title', 'クーポン発行')

@section('content')
    <div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center m-6 ">クーポン発行</h1>
</div>
<div class="flex justify-center items-center">
    <form class="max-w-md w-80">
        <div class="form-group justi＜fy-center mt-4 pb-4">
            <label for="coupon_name">インフルエンサー名</label>
            <input class="w-80" type="text" id="coupon_name" name="coupon_name" class="form-control" placeholder="インフルエンサー名を入力してください">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="coupon_code">クーポンコード</label>
            <input class="w-80" type="text" id="coupon_code" name="coupon_code" class="form-control" placeholder="クーポンコードを入力してください">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="coupon_description">説明</label>
            <textarea class="w-80" id="description" name="description" class="form-control" rows="4" placeholder="クーポンの説明を入力してください"></textarea>
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="start_day">開始日</label>
            <input class="w-80" type="date" id="start_day" name="start_day" class="form-control">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="end_day">終了日</label>
            <input class="w-80" type="date" id="end_day" name="end_day" class="form-control">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="coupon_stock">在庫数</label>
            <input class="w-80" type="number" id="coupon_stock" name="coupon_stock" class="form-control" placeholder="在庫数を入力してください">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="sales_value">割引率</label>
            <input class="w-80" type="number" id="sales_value" name="sales_value" class="form-control" placeholder="割引率を入力してください">
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
