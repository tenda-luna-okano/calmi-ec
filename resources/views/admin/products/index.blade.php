@extends('layouts.admin')

@section('title', '商品管理画面')

@section('content')
<div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center my-6">商品管理</h1>
</div>
<div class="flex justify-end px-6 mt-4 pb-4">
    <a href="{{ route('admin.products.insert_view') }}"  class="inline-flex items-center justify-center rounded-md bg-neutral-950 px-4 py-2 text-sm font-medium text-white shadow transition hover:bg-neutral-800">
        商品追加
    </a>
</div>
    <table class="table w-full border-collapse border-gray-300">
        <thead>
            <tr class="bg-white text-gray-600 font-bold border-b">
                <th>商品ID</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>販売状況</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-b hover:bg-gray-100 text-center">
                <td class="p-2">{{ $product->item_id }}</td>
                <td class="p-2">{{ $product->item_name }}</td>
                <td class="p-2">{{ $product->item_price_in_tax }}</td>
                <td class="p-2">{{ $product->item_stock }}</td>
                <td class="p-2">
                    {{ $product->seling_flg == 1 ? '販売中' : '停止中' }}
                </td>
                <td class="p-2">
                    <a href="{{ route('admin.products.edit', ['id' => $product->item_id]) }}" class="btn-edit">
                        編集
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
