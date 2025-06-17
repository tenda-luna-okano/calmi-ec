@extends('layouts.app')

@section('title', '購入確認')

@section('content')
    <div class="border-b border-[#201a1e] mb-6">
        <h1 class="font-black text-3xl text-center mt-6 ">Order Confirm</h1>
        <p class="text-center mb-6">購入確認</p>
    </div>
    {{-- 後でフォームタグを編集する --}}
    {{-- <form action="" method="post"> --}}

    {{-- 商品の数だけ表示 --}}
          {{-- main --}}
    <div class="bg-white rounded pb-6 pt-6  pr-6 pl-6 w-5/6 mx-auto mb-4">
    <table class="w-full">
        <thead class="w-full">
            <tr class="pr-4">
                <th>商品</th>
                <th class="text-right">小計</th>
            </tr>
        </thead>
        <tbody>
            <!--
            <tr class="w-full">
                <th class="border w-1/4"><img src="https://placehold.jp/150x150.png" alt="画像"></th>
                <th class="w-full pl-3">

                    <div class="w-full text-left">
                        商品名
                    </div>

                    <div class="grid grid-cols-1 w-full">
                        <p class="text-right">値段</p>
                    </div>
                </th>
            </tr>
            <tr class="w-full">
                <th class="border w-1/4"><img src="https://placehold.jp/150x150.png" alt="画像"></th>
                <th class="w-full pl-3">

                    <div class="w-full text-left">
                        商品名
                    </div>

                    <div class="grid grid-cols-1 w-full">
                        <p class="text-right">値段</p>
                    </div>
                </th>
            </tr>
            -->

            @if($cartItems->isEmpty())
                <p>なし</p>
            @else
                @foreach($cartItems as $item)
                    <tr class="w-full">
                        <th class="w-1/4"><img src="{{ asset($item->item_master->item_img) }}" alt="画像"></th>
                        <th class="w-full pl-3">

                            <div class="w-full text-left">
                                {{$item->item_master->item_name}}
                            </div>

                            <div class="w-full text-left">
                                　{{$item->item_master->item_price_in_tax}}円　　{{$item->item_count}}個
                            </div>

                            <div class="grid grid-cols-1 w-full">
                                <p class="text-right">{{$item->item_master->item_price_in_tax*$item->item_count}}円</p>
                            </div>
                        </th>
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
    <hr>
    {{-- 割引コード入力フォーム --}}
    <div class="m-4 flex justify-end">
        <form action="{{ route('orders.apply_coupon') }}" method="POST" class="flex items-center">
        @csrf
        <input type="text" 
               class="rounded w-40 mr-2 px-3 py-2 border @error('coupon_error') border-red-500 @enderror" 
               name="coupon_code" 
               id="coupon_code" 
               placeholder="クーポンコード"
               value="{{ old('coupon_code', $coupon_code ?? '') }}">
        <button type="submit" class="btn-primary">適用</button>
    </form>
    </div>
    {{-- 価格表示部分 --}}
    <form action="{{ route('orders.payment') }}" method="POST">
    @csrf
    <div class="m-4">
        <div class="flex justify-between items-center mb-2">
            <span>小計：</span>
            <span>{{ number_format($sum_price) }}円</span>
        </div>
        
        @if(isset($discount_amount) && $discount_amount > 0)
            <div class="flex justify-between items-center mb-2 text-green-600">
                <span>割引額（{{ $coupon_name ?? 'クーポン' }}）：</span>
                <span>-{{ number_format($discount_amount) }}円</span>
            </div>
            <hr class="my-2">
            <div class="flex justify-between items-center text-lg font-bold">
                <span>合計：</span>
                <span>{{ number_format($final_price ?? ($sum_price - ($discount_amount ?? 0))) }}円</span>
            </div>
        @else
            <hr class="my-2">
            <div class="flex justify-between items-center text-lg font-bold">
                <span>合計：</span>
                <span>{{ number_format($final_price ?? $sum_price) }}円</span>
            </div>
        @endif
    </div>


    </div>
    <input type="hidden" name="final_price" value="{{ $final_price }}">
    {{-- 決済情報の確認 --}}
    {{-- あとで上と同じく商品だけタグを作成し、hiddenでデータを送る --}}
    <center><button type="submit" class="btn-primary">決済情報確認へ</button></center>
    <br>
    </form>


    <!--
    {{-- 数量変更のボタンのJS --}}
    <script>
        (() => {
        //HTMLのid値を使って以下のDOM要素を取得
        const downbutton = document.getElementById('down');
        const upbutton = document.getElementById('up');
        const text = document.getElementById('textbox');
        const reset = document.getElementById('reset');

        //ボタンが押されたらカウント減
        downbutton.addEventListener('click', (event) => {
        //0以下にはならないようにする
        if(text.value >= 1) {
            text.value--;
        }
        });

        //ボタンが押されたらカウント増
        upbutton.addEventListener('click', (event) => {
            text.value++;
        })

        //ボタンが押されたら0に戻る
        reset.addEventListener('click', (event) => {
            text.value = 0;
        })

        })();

    </script>
    -->
@endsection
