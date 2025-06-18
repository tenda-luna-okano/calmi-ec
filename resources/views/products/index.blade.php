@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
<div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center mt-6 ">Products</h1>
    <p class="text-center mb-6">商品一覧</p>
</div>
<!--絞り込み検索-->
 <!--プルダウンカテゴリ選択-->
<div class="container mx-auto my-6">
  <form method="get" action="{{ route('products.index') }}">
  <h2 class="text-lg font-bold mb-2 text-center">商品を絞り込む</h2>

  <div class="flex justify-center">
    <div class="flex flex-wrap items-end gap-3">


      
      {{-- カテゴリ --}}
      <div class="flex flex-col">
        <label class="text-sm">ジャンル</label>
        <select name="categoryId" class="px-2 py-1 border rounded w-[100px] text-sm">
          <option value="">未選択</option>
          @foreach ($categories as $category)
            <option value="{{ $category->category_id }}"
              {{ request('categoryId') == $category->category_id ? 'selected' : '' }}>
              {{ $category->category_name }}
            </option>
          @endforeach
        </select>
      </div>

      {{-- 最小価格 --}}
      <div class="flex flex-col">
        <label class="text-sm">価格（¥）</label>
        <input type="number" name="min_price" class="px-2 py-1 border rounded w-[80px] text-sm" placeholder="1000" value="{{request ('min_price')}}">
      </div>

      <div class="flex items-center h-full">
        <span class="text-sm">~</span>
      </div>

      {{-- 最大価格 --}}
      <div class="flex flex-col">
        <label class="text-sm invisible">最大</label> <!-- 見出しそろえ用 -->
        <input type="number" name="max_price" class="px-2 py-1 border rounded w-[80px] text-sm" placeholder="3000" value="{{request('max_price')}}">
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
          <option value="0" {{ request('sort') == '0' ? 'selected' : '' }}>デフォルト</option>
          <option value="1" {{ request('sort') == '1' ? 'selected' : '' }}>価格の安い順</option>
          <option value="2" {{ request('sort') == '2' ? 'selected' : '' }}>価格の高い順</option>
          <option value="3" {{ request('sort') == '3' ? 'selected' : '' }}>新着順</option>
        </select>
    </div>
</form>
<p class="text-center m-4">{{ $count }}件の商品</p>
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 px-4">
    @foreach ($items as $item)
      @php
          // 該当商品がカートにあるか確認（Collection前提）
          $cartItem = $cart->firstWhere('item_id', $item->item_id);
      @endphp


      <div class="flex flex-col items-center">
        <a href="{{ route('products.show', $item->item_id) }}">
          <img src="{{ asset($item->item_img ?? 'https://placehold.jp/150x150.png') }}" 
              alt="{{ $item->item_name }}" 
              class="w-full aspect-square object-cover mb-2">
          <p>{{ $item->item_name }}</p>
          <p>¥{{ number_format($item->item_price_in_tax) }}</p>
        </a>

        @auth
          <form action="{{ $cartItem ? route('products.update', $item->item_id) : route('products.store', $item->item_id) }}" method="POST">
            
            <!-- <form action="{{route('products.store',$item->item_id)}}" method="POST"> -->

            @csrf
            @if($cartItem)
              @method('PATCH')
              <input type="hidden" value="{{$cartItem->cart_id}}" name="cart_id">
            @endif
            <input type="hidden" name="item_count" value="1">
            <button class="bg-[#d0b49f] text-white px-4 py-2 rounded mt-2">
              カートに入れる
            </button>
          </form>
        @endauth

        @guest
          <button class="bg-[#d0b49f] text-white px-4 py-2 rounded mt-2">
            <a href="{{ route('login') }}">カートに入れる</a>
          </button>
        @endguest
      </div>
    @endforeach
</div>
@endsection
