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
            <tr class="border-b hover:bg-gray-100">
                <td class="p-2">野崎</td>
                <td class="p-2">NOZAKI01</td>
                <td class="p-2">タバコ</td>
                <td class="p-2">有効</td>
                <td class="p-2">2025/06/09~2026/06/09</td>
                <td class="p-2">999</td>
                <td class="p-2">1</td>
                <td class="p-2">タバコ</td>
                <td class="p-2">
                    <button class="btn-edit">編集</button>
                </td>
            </tr>
            <tr class="border-b hover:bg-gray-100">
                <td class="p-2">野崎02</td>
                <td class="p-2">NOZAKI02</td>
                <td class="p-2">タバコ</td>
                <td class="p-2">有効</td>
                <td class="p-2">2025/06/09~2026/06/09</td>
                <td class="p-2">999</td>
                <td class="p-2">1</td>
                <td class="p-2">タバコ</td>
                <td class="p-2">
                    <button class="btn-edit">編集</button>
                </td>
            </tr>
            <tr class="border-b hover:bg-gray-100">
                <td class="p-2">野崎03</td>
                <td class="p-2">NOZAKI03</td>
                <td class="p-2">タバコ</td>
                <td class="p-2">有効</td>
                <td class="p-2">2025/06/09~2026/06/09</td>
                <td class="p-2">999</td>
                <td class="p-2">1</td>
                <td class="p-2">タバコ</td>
                <td class="p-2">
                    <button class="btn-edit">編集</button>
                </td>
            </tr>
            <tr class="border-b hover:bg-gray-100">
                <td class="p-2">野崎04</td>
                <td class="p-2">NOZAKI04</td>
                <td class="p-2">タバコ</td>
                <td class="p-2">有効</td>
                <td class="p-2">2025/06/09~2026/06/09</td>
                <td class="p-2">999</td>
                <td class="p-2">1</td>
                <td class="p-2">タバコ</td>
                <td class="p-2">
                    <button class="btn-edit">編集</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
