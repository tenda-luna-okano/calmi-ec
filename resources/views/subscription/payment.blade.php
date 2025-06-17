@extends('layouts.app')

@section('title', '決済方法確認画面')

@section('content')
<div class="max-w-3xl mx-auto my-10 px-6">
    <!-- タイトル -->
    <div class="border-b border-[#201a1e] mb-4">
        <h1 class="font-black text-3xl text-center mt-6 ">Payment Method</h1>
        <p class="text-center mb-6">決済方法選択</p>
    </div>

    <!-- お知らせ -->
    <div class="border border-black rounded-lg p-4 mb-6 text-center">
        <p class="text-red-500 font-semibold">お知らせ</p>
    </div>

    <!-- 決済フォーム -->
    <form action="{{route('subscription.complete')}}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <input type="hidden" name="subscribe_id" value="{{$Id}}">
        <!-- クレジットカード選択 -->
        <div class="mb-4">

            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endif

            <label class="inline-flex items-center">
                <input type="radio" name="payment_method" value="credit_card" class="mr-2" checked>
                クレジットカード
            </label>

            <!-- カード情報 -->
            <div class="mt-4 space-y-4">
                <div>
                    <label class="block text-sm font-medium">カード番号</label>
                    <input type="text" name="card_number" placeholder="例）1234567890123456"
                           class="w-full border px-3 py-2 rounded text-sm">
                </div>
                <div class="flex gap-4">
                    <div class="flex-1">
                        <label class="block text-sm font-medium">有効期限（月/年）</label>
                        <input type="text" name="expire" placeholder="例）12/27"
                               class="w-full border px-3 py-2 rounded text-sm">
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium">CVV（3-4桁）</label>
                        <input type="text" name="security_code" placeholder="例）123"
                               class="w-full border px-3 py-2 rounded text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium">カード名義</label>
                    <input type="text" name="card_name" placeholder="例）TARO YAMADA"
                           class="w-full border px-3 py-2 rounded text-sm">
                </div>
            </div>
        </div>

        <!-- その他の決済方法 -->
        <div class="space-y-2 mt-6">
            <label class="block">
                <input type="radio" name="payment_method" value="paypay" class="mr-2">
                paypay
            </label>
            <label class="block">
                <input type="radio" name="payment_method" value="bank_transfer" class="mr-2">
                銀行振込
            </label>
            <label class="block">
                <input type="radio" name="payment_method" value="cod" class="mr-2">
                代金引換
            </label>
            <label class="block">
                <input type="radio" name="payment_method" value="convenience" class="mr-2">
                コンビニ決済
            </label>
        </div>

        <!-- 決済ボタン -->
        <div class="mt-8 text-center">
            <button type="submit" class="bg-[#d0b49f] text-white px-6 py-2 rounded text-sm">
                決済確定
            </button>
        </div>
    </form>
</div>
@endsection
