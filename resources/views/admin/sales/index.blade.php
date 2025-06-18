{{--管理者ページに戻るボタンはあとからビューのテンプレを作って作成するためいまは作成しない--}}
@extends('layouts.admin')

@section('title', '商品一覧')

@section('content')
    <div class="border-b border-[#201a1e]">
        <h1 class="font-black text-3xl text-center m-6 ">売上管理</h1>
    </div>
<!--絞り込み検索-->
<div class="container mx-auto my-6">
    <form method="GET" class="flex flex-wrap items-end justify-between gap-4 mb-6">
        <div class="flex flex-wrap items-end gap-4">
            {{-- 始まりの日付 --}}
            <div class="flex flex-col">
                <label class="text-sm">期間</label>
                <input type="date" name="start_date" class="px-2 py-1 border rounded w-[120px] text-sm" value="{{ request('start_date') }}">
            </div>

            <div class="flex items-center h-full">
                <span class="text-sm">～</span>
            </div>

            {{-- 終わりの日付 --}}
            <div class="flex flex-col">
                <label class="text-sm invisible">終了日</label>
                <input type="date" name="end_date" class="px-2 py-1 border rounded w-[120px] text-sm" value="{{ request('end_date') }}">
            </div>

            {{-- 検索ボタン --}}
            <div>
                <button type="submit" class="bg-gray-800 text-white px-3 py-1.5 rounded text-sm">
                    検索
                </button>
            </div>
        </div>

        {{-- 🔁 絞り込み解除ボタン（右端） --}}
        <div class="ml-auto">
            <a href="{{ route('admin.sales.index') }}" class="bg-gray-300 text-black px-3 py-1.5 rounded text-sm hover:bg-gray-400">
                絞り込み解除
            </a>
        </div>
    </form>
</div>
    @if ($errors->has('end_date'))
         <p class="text-red-500 text-sm mt-1">{{ $errors->first('end_date') }}</p>
    @endif
    <div class="text-center m-4">
        <h2 class="font-bold text-2xl">総売り上げ : ¥{{ number_format($grossSales) }}</h2>
    </div>
    <table class="table w-full border-collapse border-gray-300">
        <thead>
            <tr class="bg-white text-gray-600 font-bold border-b">
                <th>日付</th>
                <th>売上合計</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $row)
            <tr class="border-b hover:bg-gray-100">
            <td class="p-2 text-center">{{ $row->date }}</td>
            <td class="p-2 text-center">¥{{ number_format($row->total_sales) }}</td>
        @endforeach
    </table>
</div>
@endsection
