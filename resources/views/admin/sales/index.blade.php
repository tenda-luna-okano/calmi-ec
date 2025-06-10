{{--管理者ページに戻るボタンはあとからビューのテンプレを作って作成するためいまは作成しない--}}
    
    @php
    $sales = [[
        'sales_id' => 1,
        'date' => '2025/06/01',
        'item_name' => 'チョコレート',
        'price' => 300,
        'amount' => 2,
        'total_price' => 600,
        ],[
        'sales_id' => 2,
        'date' => '2025/06/01',
        'item_name' => 'チョコレート',
        'price' => 300,
        'amount' => 2,
        'total_price' => 600,
        ],
        [
        'sales_id' => 3,
        'date' => '2025/06/01',
        'item_name' => 'チョコレート',
        'price' => 300,
        'amount' => 10,
        'total_price' => 3000,
        ],
        [
        'sales_id' => 4,
        'date' => '2025/06/02',
        'item_name' => 'チョコレート',
        'price' => 300,
        'amount' => 5,
        'total_price' => 1500,
        ],
        ];
    $total_sales = 0;
    foreach ($sales as $sale) {
        $total_sales += $sale['total_price'];
    }
@endphp
@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
    <div class="border-b border-[#201a1e]">
        <h1 class="font-black text-3xl text-center m-6 ">売上管理</h1>
    </div>
<!--絞り込み検索-->
<div class="container mx-auto my-6">
    <form class="flex items-end gap-4 mb-6">

        {{-- 始まりの日付 --}}
        <div class="flex flex-col">
            <label class="text-sm">期間</label>
            <input type="date" name="start_date" class="px-2 py-1 border rounded w-[120px] text-sm">
        </div>

        <div class="flex items-center h-full">
            <span class="text-sm">～</span>
        </div>

      {{-- 終わりの日付 --}}
        <div class="flex flex-col">
            <label class="text-sm invisible">終了日</label> <!-- 見出しそろえ用 -->
            <input type="date" name="end_date" class="px-2 py-1 border rounded w-[120px] text-sm">
        </div>

        {{-- 検索ボタン --}}
        <div>
            <button type="submit" class="bg-[#d0b49f] text-white px-3 py-1.5 rounded text-sm">
            検索
            </button>
        </div>
    </form>
    <div class="text-center m-4">
        <h2 class="font-bold text-2xl">総売り上げ：{{ $total_sales }}円</h2>
    </div>
    <table class="table w-full border-collapse border-gray-300">
        <thead>
            <tr class="bg-white text-gray-600 font-bold border-b">
                <th>日付</th>
                <th>商品</th>
                <th>価格</th>
                <th>個数</th>
                <th>売上</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($sales as $sale)
            <tr class="border-b hover:bg-gray-100">
            <td class="p-2 text-center">{{ $sale['date'] }}</td>
            <td class="p-2 text-center">{{ $sale['item_name'] }}</td>
            <td class="p-2 text-center">{{ $sale['price'] }}</td>
            <td class="p-2 text-center">{{ $sale['amount'] }}</td>
            <td class="p-2 text-center">{{ $sale['total_price'] }}円</td> 
        @endforeach 
    </table>
</div>
@endsection
