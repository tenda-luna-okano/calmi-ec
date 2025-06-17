@extends('layouts.app')

@section('title', '購入履歴')

@section('content')
<div class="border-b border-[#201a1e] mb-6">
            <h1 class="font-black text-3xl text-center mt-6 ">注文履歴</h1>
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
                <th>詳細</th>
            </tr>
        </thead>
        @if(!empty($orders))
        <tbody>
           {{-- 注文履歴の数だけ表示する --}}
            @foreach ($orders as $order)
                <tr class="border-b hover:bg-gray-100">
                    {{-- 注文日 --}}
                    <td class="p-2">{{$order->created_at->format('Y/m/d')}}</td>
                    {{--　注文番号 --}}
                    <td class="p-2">{{$order->order_id}}</td>
                    {{-- 合計金額 --}}
                    <td class="p-2">{{$order->order_price_in_tax}}円</td>
                    {{-- 支払方法 --}}
                    <td class="p-2">{{$order_method}}</td>
                    {{-- 発送状況 --}}
                    @if($order->is_paid==0)
                        <td class="p-2">未払い</td>
                    @elseif($order->is_paid==1&&$order->is_delivery==0)
                        <td class="p-2">支払済み</td>
                    @elseif($order->is_delivery==1)
                        <td class="p-2">発送済み</td>
                    @endif
                    <td class="p-2">
                    {{-- 個別の詳細へ --}}
                    <form action="./purchase_history_detail" method="post">
                    {{-- <form action="{{route('purchase_history_detail')}}" method="post"> --}}
                        @csrf
                        <input type="hidden" name="order_id" value="{{$order->order_id}}">
                        <button class="btn-edit">詳細を見る</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
        @else
            <tbody>
                <p>注文履歴がありません</p>
            </tbody>
        @endif
    </table>
    <x-input-label for="mypage_guide">マイページメニュー</x-input-label>
    <div id="mypage_guide" class="">
        <p><button class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a href="./index">マイページトップ</a></button></p>
        <p><button class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a href="./edit_user">登録内容の確認・変更</a></button></p>
        {{-- 時間があったら実装 --}}
        {{-- <div><a href="mypage/top">お気に入り商品</a></div>  --}}

        <p><button class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a href="./history">ご注文履歴</a></button></p>
        <p><button class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a href="{{route('mypage.withdraw_confirm')}}">退会</a></button></p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                ログアウト
            </button>
        </form>
    </div>
    
@endsection