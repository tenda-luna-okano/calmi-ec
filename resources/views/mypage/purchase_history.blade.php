@extends('layouts.app')

@section('title', '購入履歴')

@section('content')
<div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center my-6">購入履歴
    </h1>
</div>
{{-- <div class="flex justify-end px-6 mt-4 pb-4">
    <a href="#" class="inline-flex items-center justify-center rounded-md bg-neutral-950 px-4 py-2 text-sm font-medium text-white shadow transition hover:bg-neutral-800">
        
    </a>
</div> --}}
    <table class="table w-full border-collapse border-gray-300">
        <thead>
            <tr class="bg-white text-gray-600 font-bold border-b">
                <th>ご注文日</th>
                <th>ご注文番号 </th>
                <th>合計金額</th>
                <th>決済方法</th>
                <th>ご注文状況</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b hover:bg-gray-100">
                <td class="p-2">2025/06/09</td>
                <td class="p-2">01234567</td>
                <td class="p-2">12000円</td>
                <td class="p-2">クレジットカード</td>
                <td class="p-2">注文完了</td>
                <td class="p-2">
                    <button class="btn-edit">詳細を見る</button>
                </td>
            </tr>
            <tr class="border-b hover:bg-gray-100">
                <td class="p-2">2025/06/09</td>
                <td class="p-2">01234567</td>
                <td class="p-2">12000円</td>
                <td class="p-2">クレジットカード</td>
                <td class="p-2">注文完了</td>
                <td class="p-2">
                    <button class="btn-edit">詳細を見る</button>
                </td>
            </tr>
            <tr class="border-b hover:bg-gray-100">
                <td class="p-2">2025/06/09</td>
                <td class="p-2">01234568</td>
                <td class="p-2">12000円</td>
                <td class="p-2">クレジットカード</td>
                <td class="p-2">注文完了</td>
                <td class="p-2">
                    <button class="btn-edit">詳細を見る</button>
                </td>
            </tr>
            <tr class="border-b hover:bg-gray-100">
                <td class="p-2">2025/06/09</td>
                <td class="p-2">01234569</td>
                <td class="p-2">12000￥</td>
                <td class="p-2">クレジットカード</td>
                <td class="p-2">注文完了</td>
                <td class="p-2">
                    <button class="btn-edit">詳細を見る</button>
                </td>
            </tr>
        </tbody>
    </table>
    <x-input-label for="mypage_guide">マイページメニュー</x-input-label>
    <div id="mypage_guide" class="">
        <div><a href="mypage/top">マイページトップ</a></div>
        <div><a href="mypage/edit_user">登録内容の確認・変更</a></div>
        {{-- 時間があったら実装 --}}
        {{-- <div><a href="mypage/top">お気に入り商品</a></div>  --}}

        <div><a href="mypage/history">ご注文履歴</a></div>
        <div><a href="mypage/withdraw">退会</a></div>
        <div><a href="mypage/logout">ログアウト</a></div>
    </div>
    
@endsection