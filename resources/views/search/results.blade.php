@extends('layouts.app')
@php
    $products = [
        ['name' => '商品1', 'price' => 1000, 'image' => 'https://placehold.jp/150x150.png'],
        ['name' => '商品2', 'price' => 2000, 'image' => 'https://placehold.jp/150x150.png'],
        ['name' => '商品3', 'price' => 3000, 'image' => 'https://placehold.jp/150x150.png'],
        ['name' => '商品4', 'price' => 4000, 'image' => 'https://placehold.jp/150x150.png'],
    ];
    $categorys = [
        ['id' => 1, 'name' => 'カテゴリ1'],
        ['id' => 2, 'name' => 'カテゴリ2'],
        ['id' => 3, 'name' => 'カテゴリ3'],
    ];
@endphp
@section('title', '検索結果')

@section('content')
<div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center mt-6 ">Products</h1>
    <p class="text-center mb-6">商品一覧</p>
</div>

<!--絞り込み検索-->
 <!--プルダウンカテゴリ選択-->
<div class="container mx-auto my-6">
  <form method="get" action="{{ route('products.index') }}">
  <h2 class="text-lg font-bold mb-2 text-center">検索結果</h2>

  <div class="flex justify-center">
    <div class="flex flex-wrap items-end gap-3">

      {{-- カテゴリ --}}
      <div class="flex flex-col">
        <label class="text-sm">ジャンル</label>
        <select name="categoryId" class="px-2 py-1 border rounded w-[100px] text-sm">
          <option value="">未選択</option>
          @foreach ($categorys as $category)
            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option><!--選択時はselectedで代入- -->
          @endforeach
        </select>
      </div>

      {{-- 最小価格 --}}
      <div class="flex flex-col">
        <label class="text-sm">価格（¥）</label>
        <input type="number" name="min_price" class="px-2 py-1 border rounded w-[80px] text-sm" value="1000"><!--未入力時は- -->
      </div>

      <div class="flex items-center h-full">
        <span class="text-sm">~</span>
      </div>

      {{-- 最大価格 --}}
      <div class="flex flex-col">
        <label class="text-sm invisible">最大</label> <!-- 見出しそろえ用 -->
        <input type="number" name="max_price" class="px-2 py-1 border rounded w-[80px] text-sm" value="3000"><!--未入力時は- -->
      </div>

      {{-- 検索ボタン --}}
      <div>
        <button type="submit" class="bg-[#d0b49f] text-white px-3 py-1.5 rounded text-sm">
          検索
        </button>
      </div>

    </div>
  </div>
  <!--並び替え-->
    <div class="flex justify-end mt-4">
      <label class="text-right mr-2">並び替え:</label>
      <select name="sort" class="px-2 py-1 border rounded w-[120px] text-sm mr-5">
      <!--未入力時は- -->
      <option value="default">デフォルト</option>
      <option value="price_asc" selected>価格の安い順</option>
      <option value="price_desc">価格の高い順</option>
      <option value="newest">新着順</option>
      </select>
    </div>
</form>

<p class="text-center m-4">{{$itemCount}}件の商品</p><!--見つかった数に変更 -->

<div class="container mx-auto my-6">
    <div class="container mx-auto grid grid-cols-2 gap-4">
      @foreach ($resultItem as $product)
        <div class="col-span-1 flex flex-col items-center">
            @csrf
            <a href="{{route('products.show',$product->item_id)}}">
            <img src="{{ asset($product->item_img) }}" alt="{{$product->item_name}}">
            <p>{{$product->item_name}} - ¥{{$product->item_price_in_tax}}</p>
            </a>
          <form action="{{route('products.store',$product->item_id)}}" method="POST">
            @csrf
            <input type="hidden" name="item_count" value="1">
            <button class="btn-primary">
                カートに入れる
            </button>
          </form>
        </div>
      @endforeach
    </div>
</div>
 @endsection
