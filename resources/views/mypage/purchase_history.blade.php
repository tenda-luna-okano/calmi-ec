@extends('layouts.app')

@section('title', '購入履歴')

@section('content')
 <div class="border-b border-[#201a1e] mb-6">
            <h1 class="font-black text-3xl text-center mt-6 ">注文履歴</h1>
</div>

<div class="space-y-4 px-4">
    @if(!empty($orders) && count($orders) > 0)
        @foreach ($orders as $order)
            <div class="bg-white shadow rounded p-4 border border-gray-300">
                <p class="text-m text-gray-800">ご注文日：{{ $order->created_at->format('Y年n月j日 H:i:s') }}</p>
                <p class="text-m text-gray-800">ご注文番号：{{ $order->order_id }}</p>
                <p class="text-m text-gray-800">合計金額：{{ number_format($order->order_price_in_tax) }}円</p>
                <p class="text-m text-gray-800">決済方法：{{ $order_method }}</p>
                <p class="text-m text-gray-800">
                    ご注文状況：
                    @if($order->is_paid==0)
                        未払い
                    @elseif($order->is_paid==1 && $order->is_delivery==0)
                        支払済み
                    @elseif($order->is_delivery==1)
                        発送済み
                    @endif
                </p>

                <form action="./purchase_history_detail" method="post" class="mt-4 text-center">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                    <button class="border border-gray-400 px-4 py-1 rounded hover:bg-gray-100">詳細を見る</button>
                </form>
            </div>
        @endforeach
    @else
        <p class="text-center text-gray-800 text-3xl">注文履歴がありません</p>
    @endif
</div>
<!--{{-- <div class="flex justify-end px-6 mt-4 pb-4">
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
            
        </tbody>-->
        @else
            <tbody>
                <p>注文履歴がありません</p>
            </tbody>
        @endif
    </table>
    <div class="border border-[#201a19] ml-4 mr-4 flex flex-col m-4">
        <a href="{{ route('mypage.index') }}" class="block border-b border-[#201a19] text-center mt-4 pb-4"><span class="material-icons">account_circle</span>マイページトップ</a>
        <a href="{{ route('edit_user.show') }}" class="block border-b border-[#201a19] text-center mt-4 pb-4"><span class="material-icons">edit</span>登録内容の確認・変更</a>
        <a href="{{ route('subscription.edit') }}" class="block  border-b border-[#201a19] text-center mt-4 pb-4"><span class="material-icons">redeem</span>定期便変更・解約</a>
        <a href="{{ route('mypage.purchase_history') }}" class="block border-b border-[#201a19] text-center mt-4 pb-4"><span class="material-icons">receipt</span>ご注文履歴</a>
        <a href="{{ route('mypage.withdraw_confirm') }}" class=" block text-center mt-4 pb-4"><span class="material-icons">logout</span>退会</a>
    </div>
    <div class="flex items-center justify-center m-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-primary">
                ログアウト
            </button>
        </form>
    </div>
    </div>
    
@endsection