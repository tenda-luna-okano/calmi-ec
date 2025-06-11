@extends('layouts.admin')

@section('title', 'クーポン管理画面')

@section('content')
<div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center my-6">クーポン管理</h1>
</div>
<div class="flex justify-end px-6 mt-4 pb-4">
    <a href="#" class="inline-flex items-center justify-center rounded-md bg-neutral-950 px-4 py-2 text-sm font-medium text-white shadow transition hover:bg-neutral-800">
        クーポン追加
    </a>
</div>
    <table class="table w-full border-collapse border-gray-300">
        <thead>
            <tr class="bg-white text-gray-600 font-bold border-b">
                <th>インフルエンサー名</th>
                <th>クーポンコード</th>
                <th>説明</th>
                <th>状態</th>
                <th>期間</th>
                <th>在庫</th>
                <th>割引率</th>
                <th>対象カテゴリ</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
            <tr class="border-b hover:bg-gray-100">
            <td class="p-2">{{ $coupon->coupon_name }}</td>
            <td class="p-2">{{ $coupon->coupon_code }}</td>
            <td class="p-2">{{ $coupon->coupon_detail_explanation }}</td>
            <td class="p-2">{{ $coupon->coupon_is_enable ? '有効' : '無効' }}</td>
            <td class="p-2">
                {{ \Carbon\Carbon::parse($coupon->coupon_start_day)->format('Y/m/d') }}~
                {{ \Carbon\Carbon::parse($coupon->coupon_end_day)->format('Y/m/d') }}
            </td>
            <td class="p-2">{{ $coupon->coupon_stock }}</td>
            <td class="p-2">{{ $coupon->coupon_sale_value }}</td>
            <td class="p-2">{{ $coupon->category->name ?? '未分類' }}</td>
            <td class="p-2">
                <button class="btn-edit">編集</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
