{{--管理者用のフォントを変えたい--}}
@php
    $categories = [
        '1' => 'アロマ',
        '2' => 'フード',
        '3' => 'タッチ',
        '4' => 'ご褒美スイーツ',
        '5' => 'サプリ',
    ];
@endphp
@extends('layouts.app')

@section('title', '商品編集')

@section('content')

<div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center m-6 ">商品編集</h1>
</div>
{{-- バリデーションエラー表示 --}}
    @if ($errors->any())
        <div class="max-w-md mx-auto text-red-500 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>・{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="flex justify-center items-center">
    <form method="POST" action="{{ route('admin.products.update', ['id' => $product->item_id]) }}" enctype="multipart/form-data" class="max-w-md w-80">
        @csrf
        <div class="form-group justify-center mt-4 pb-4">
            <label for="item_name">商品名</label>
            <input class="w-80" type="text" id="item_name" name="item_name" class="form-control" value="{{ $product['item_name'] }}">
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
        <div class="form-group mt-4 pb-4">
            <label for="item_price_in_tax">価格</label>
            <input class="w-80" type="number" id="item_price_in_tax" name="item_price_in_tax" class="form-control" value="{{ $product['item_price_in_tax'] }}">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="item_stock">在庫数</label>
            <input class="w-80" type="number" id="item_stock" name="item_stock" class="form-control" value="{{ $product['item_stock'] }}">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="item_img">商品画像</label>
            <input class="w-80" type="file" id="item_img" name="item_img" class="form-control-file">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="item_detail_explanation">商品説明</label>
            <textarea class="w-80" id="item_detail_explanation" name="item_detail_explanation" class="form-control" rows="4" placeholder="商品説明を入力してください">{{ $product['item_detail_explanation'] }}</textarea>
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="seling_flg">公開状態</label>
            <select class="w-80" id="seling_flg" name="seling_flg" class="form-control">
                <option value="1">公開中</option>
                <option value="0">非公開</option>
            </select>
        </div>
        <div class="m-4 flex justify-center items-center">
            <button class="inline-flex h-12 items-center justify-center rounded-md bg-neutral-950 px-6 font-medium text-neutral-50 transition active:scale-110 ">商品を追加</button>
        </div>
    </form>
</div>

@endsection