{{--管理者ページはもっと白黒で見やすさを重視してもいいかも--}}
@extends('layouts.admin')

@section('title', '管理者トップページ')
@php
    $items = [
        ['icon' => 'assessment', 'label' => '売上管理', 'href' => 'admin.sales.index'],
        ['icon' => 'inventory', 'label' => '商品管理', 'href' => 'admin.products.index'],
        ['icon' => 'redeem', 'label' => 'クーポン管理', 'href' => 'admin.coupons.index'],
    ];
@endphp

@section('content')
<div class="max-w-6xl mx-auto p-8">
    <h1 class="text-3xl text-center mt-2 pb-8 underline underline-offset-4">管理者ページ</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 justify-items-center">
        @foreach ($items as $item)
        <a href="{{ route($item['href']) }}" class="bg-[#d0b49f] text-white w-[200px] h-[100px] py-4 rounded-lg text-lg font-semibold shadow-md hover:shadow-lg transition flex flex-col items-center justify-center">
            <span class="material-icons text-3xl mb-1">{{ $item['icon'] }}</span>
            {{ $item['label'] }}
        </a>
        @endforeach

    </div>
</div>
@endsection
