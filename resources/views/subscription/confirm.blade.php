@extends('layouts.app')

@section('title', '購入確認')

@section('content')
    <center><h1>購入商品確認</h1></center>
    {{-- 後でフォームタグを編集する --}}
    {{-- <form action="" method="post"> --}}

    {{-- 商品の数だけ表示 --}}
          {{-- main --}}
    <div class="bg-white pb-6 pt-6  pr-6 pl-6 w-5/6 mx-auto">
    <table class="w-full">
        <thead class="w-full">
            <tr class="pr-4">
                <th>商品</th>
                <th class="text-right">合計</th>
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

            @if($subscription==null)
                <p>なし</p>
            @else
                <tr class="w-full">
                    <th class="w-1/4"><img src="{{ asset($subscription->subscribe_img) }}" alt="画像"></th>
                    <th class="w-full pl-3">

                        <div class="w-full text-left">
                            {{$subscription->subscribe_item_name}}
                        </div>

                        <div class="grid grid-cols-1 w-full">
                            <p class="text-right">{{$subscription->subscribe_price}}円</p>
                        </div>
                    </th>
                </tr>

            @endif
        </tbody>

    </table>
    <hr>

    </div>



    <form action="{{route('subscription.payment')}}" method="POST">
    {{-- 決済情報の確認 --}}
    {{-- あとで上と同じく商品だけタグを作成し、hiddenでデータを送る --}}

    @csrf
    <input type="hidden" name="subscribe_id" value="{{ $subscription->subscribe_detail_id }}">
    <center><button class="btn-primary">決済情報確認へ</button></center>
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
