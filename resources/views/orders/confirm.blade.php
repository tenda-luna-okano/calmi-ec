@extends('layouts.app')

@section('title', '購入確認')

@section('content')
    <h1>購入商品確認</h1>
    {{-- 後でフォームタグを編集する --}}
    {{-- <form action="" method="post"> --}}

    
    {{-- 商品の数だけ表示 --}}
          {{-- main --}}
    <div class="bg-white pb-6 pt-6  pr-6 pl-6 w-5/6 mx-auto">
    <table class="w-full">
        <thead class="w-full">
            <tr class="pr-4">
                <th>商品</th>
                <th class="text-right">小計</th>
            </tr>
        </thead>
        <tbody>
            <tr class="w-full">
                <th class="border w-1/4"><img src="https://placehold.jp/150x150.png" alt="画像"></th>
                <th class="w-full pl-3">
                    <div class="w-full text-left">
                        商品名
                    </div>
                    <div class="grid grid-cols-3 w-full">
                        <div class="flex flex-1 ">
                            <div class="bg-white w-auto" ><button id="down">－</button></div>
                            <div class="w-10px"><input class="w-10" type="text" value="1"  id="textbox"></div>
                            <div class="bg-white w-1/3"><button  id="up">＋</button></div>
                        </div>

                        {{-- 押したらその商品を削除してリロード --}}
                        <button>ゴミ箱</button>
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
                    <div class="grid grid-cols-3 w-full">
                        <div class="flex flex-1 ">
                            <div class="bg-white w-auto" ><button id="down">－</button></div>
                            <div class="w-10px"><input type="text" value="1"  id="textbox"></div>
                            <div class="bg-white w-1/3"><button  id="up">＋</button></div>
                        </div>
                        {{-- 押したらその商品を削除してリロード --}}
                        <button>ゴミ箱</button>
                        <p class="text-right">値段</p>
                    </div>
                </th>
            </tr>
        </tbody>

    </table>
    <hr>
    {{-- 右寄せしたいけどできなかった --}}
    <div class="flex">
        <p class="text-right">合計</p>
        <p class="text-right">￥1,000</p>
    </div>
   

    </div>

    

    <form action="" method="POST">
    {{-- 決済情報の確認 --}}
    {{-- あとで上と同じく商品だけタグを作成し、hiddenでデータを送る --}}
    <button class="btn-primary">決済情報確認へ</button>

    </form>

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
@endsection
