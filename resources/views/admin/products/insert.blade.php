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
@extends('layouts.admin')

@section('title', '商品追加')

@section('content')

<div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center m-6 ">商品追加</h1>
</div>
<div class="flex justify-center items-center">
    <form class="max-w-md w-80">
        <div class="form-group justify-center mt-4 pb-4">
            <label for="product_name">商品名</label>
            <input class="w-80" type="text" id="product_name" name="product_name" class="form-control" placeholder="商品名を入力してください">
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
            <label for="price">価格</label>
            <input class="w-80" type="number" id="price" name="price" class="form-control" placeholder="価格を入力してください">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="stock">在庫数</label>
            <input class="w-80" type="number" id="stock" name="stock" class="form-control" placeholder="在庫数を入力してください">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="image">商品画像</label>
            <input class="w-80" type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="description">商品説明</label>
            <textarea class="w-80" id="description" name="description" class="form-control" rows="4" placeholder="商品説明を入力してください"></textarea>
        </div>
        <div class="form-group mt-4 pb-4">
            <label for="is_active">公開状態</label>
            <select class="w-80" id="is_active" name="is_active" class="form-control">
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