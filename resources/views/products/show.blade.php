@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
    {{-- 商品画像 --}}
    <div class="flex justify-center">
        <div class="size-14 grow w-1/2 mr-auto">
            {{-- 商品画像を出力 --}}
            {{-- 本番はちゃんとしたルートのアイテムを表示 --}}
            {{-- <img src="{{ asset('storage/' . $review->img) }}" alt="商品画像"> --}}
            {{-- テスト画像の代わり --}}
            <img class="mx-4 pe-8" src="https://placehold.jp/150x150.png" alt="ダミー">
        </div>
        <div class="size-14 grow-0"></div>
        {{-- 商品説明 --}}
        <div class="size-14 grow w-1/2 mx-8">
            <div class="ml-2">
                {{-- ジャンル --}}
                <p class="text-xl">ジャンル</p>
                {{-- 商品名 --}}
                <p class="mt-4 text-8xl">商品名</p>
            </div>
            <div class="flex">
                {{-- 評価,本番は数字はDBから取得 --}}
                <p class="flex-1 text-sm mt-4">☆4.2(8)</p>
                <a class="flex-1 text-xs mt-4 ml-2" href="#review">レビューを表示</a>
            </div>
            {{-- 値段 --}}
            <div class="flex">
                <div class="flex flex-1">
                    <p>￥</p>
                    {{-- テーブルから値段を取得 --}}
                    <p>12,300</p>
                </div>
                <div class="flex-1 border-black">
                    <p>(TAX IN)</p>
                </div>
            </div>
            <div class="flex space-between">
                {{-- 数字変更 --}}
                {{-- <div class="flex flex-1 bg-white border-black">
                    <button class="flex-1">-</button>
                    <p class="flex-1 text-center mt-4">1</p>
                    <button class="flex-1">+</button>
                </div>
                <div class="container"> --}}

                
                <div class="flex-1 grid grid-cols-3 spinner-container center">
                    <div class="grid-item  w-1/2 bg-[#d0b49f] ml-auto"><span class="spinner-sub disabled text-center select-none text-white">-</span></div>
                    <input class="spinner h-8 select-none text-center w-8 mx-auto" type="text" min="0" max="99" value="1">
                    <div class="grid-item w-1/2 bg-[#d0b49f] mr-auto"><span class="spinner-add text-center select-none text-white">+</span></div>
                    
                </div>

                

                {{-- <button class="button resetbtn" id="reset">RESET</button> --}}

                {{-- カートに入れるボタン --}}
                <div class="flex-1 px-auto">
                    <button class="btn-primary text-xs" >カートに入れる</button>
                </div>
            </div>
            {{-- 数量変更時のエラーメッセージ --}}
            <div>
                <p>error</p>
            </div>
        </div>
    </div>
    <h2>商品特徴</h2>
        <hr class="py-8">
    <div class="my-8 py-8">
        <p class="py-8">ジッパーの開口部分が広くて開けやすいポーチは、開けると中に何が入っているか一目瞭然。見た目の割りに大容量なので、旅行時にも活躍すること間違いなし。フランスの地方によくあるバスルームのタイルからインスピレーションを受けたレトロなヴィンテージ調のフラワーパターンが乙女心をくすぐります</p>
    </div>
    <hr>
    <div class="flex py-8">
        <h2 id="review" class="flex-1">レビュー</h2>
        <button class="flex-1 text-right">レビューを投稿する</button>
    </div>
    <hr>
    {{-- 最初はレビューを2件まで表示 --}}
    <div  class="py-4">
        <div class="bg-white py-4">
            <p>☆☆☆★★</p>
            <div>
                <h3>タイトル</h3>
                <p>年代</p>
                <p>10代</p>
                <p>2025/02/12</p>
            </div>
            <p>レビュー内容</p>
            <p>この商品はよかったです。</p>
        </div>
        <div class="bg-white py-4 mt-4">
            <p>☆☆☆★★</p>
            <div>
                <h3>タイトル</h3>
                <p>年代</p>
                <p>10代</p>
                <p>2025/02/12</p>
            </div>
            <p>レビュー内容</p>
            <p>この商品はよかったです。</p>
        </div>
        <div class="text-right"><button>もっと見る</button></div>
    </div>
    
    <hr>
    {{-- 関連商品表示 --}}
    <p>このアイテムが気になった人はこちらも気になっています。</p>
    {{-- 商品５個表示 --}}
    <div class="flex bg-white px-4 py-3">
        <div class="flex-1 px-2 ">
            <img src="https://placehold.jp/150x150.png">
            <p>商品名</p>
        </div>
        <div class="flex-1 px-2">
            <img src="https://placehold.jp/150x150.png">
            <p>商品名</p>
        </div>
        <div class="flex-1 px-2">
            <img src="https://placehold.jp/150x150.png">
            <p>商品名</p>
        </div>
        <div class="flex-1 px-2">
            <img src="https://placehold.jp/150x150.png">
            <p>商品名</p>
        </div>
        <div class="flex-1 px-2">
            <img src="https://placehold.jp/150x150.png">
            <p>商品名</p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(function() {
            $('.spinner').each(function() {
                var el  = $(this);
                var add = $('.spinner-add');
                var sub = $('.spinner-sub');

                // substract
                el.parent().on('click', '.spinner-sub', function() {
                if (el.val() > parseInt(el.attr('min'))) {
                    el.val(function(i, oldval) {
                    return --oldval;
                    });
                }
                // disabled
                if (el.val() == parseInt(el.attr('min'))) {
                    el.prev(sub).addClass('disabled');
                }
                if (el.val() < parseInt(el.attr('max'))) {
                    el.next(add).removeClass('disabled');
                }
                });

                // increment
                el.parent().on('click', '.spinner-add', function() {
                if (el.val() < parseInt(el.attr('max'))) {
                    el.val(function(i, oldval) {
                    return ++oldval;
                    });
                }
                // disabled
                if (el.val() > parseInt(el.attr('min'))) {
                    el.prev(sub).removeClass('disabled');
                }
                if (el.val() == parseInt(el.attr('max'))) {
                    el.next(add).addClass('disabled');
                }
                });
            });
        });
    </script>
@endsection
