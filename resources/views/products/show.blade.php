@extends('layouts.app')

@section('title', '商品詳細')

@section('content')
    {{-- 商品画像 --}}
    <div class="flex justify-center">
        <div class=" w-1/2 ">
            {{-- 商品画像を出力 --}}
            <img class="mx-4 pe-8 mt-8 " src="{{asset('storage/'.$item->item_img ?? 'https://placehold.jp/150x150.png')}}" alt="商品画像">
        </div>
        {{-- <div class="size-14  w-1/3"></div> --}}
        {{-- 商品説明 --}}
        <div class=" w-1/2 mx-8">
            <div class="ml-2">
                {{-- ジャンル --}}
                <p class="text-xl">{{$item->category_master->category_name}}</p>
                {{-- <p class="text-xl">ジャンル</p> --}}
                {{-- 商品名 --}}
                {{-- <p class="mt-4 text-2xl">商品名</p> --}}
                <p class="mt-4 text-2xl">{{$item->item_name}}</p>
            </div>
            <div class="flex">
                {{-- 評価,本番は数字はDBから取得 --}}
                {{-- <p class="flex-1 text-sm mt-4">☆4.2(8)</p> --}}
                {{-- レビュー表示 --}}
                <p class="flex-1 text-sm mt-4">☆{{$item->item_review_star}}({{$review_num}})</p>
                {{-- 画面下のレビュー部分へ --}}
                <a class="flex-1 text-xs mt-4 ml-2" href="#review">レビューを表示</a>
            </div>
            {{-- 値段 --}}
            <div class="flex">
                <div class="flex flex-1">
                    <p>￥</p>
                    {{-- テーブルから値段を取得 --}}
                    {{-- <p>12,300</p> --}}
                    <p>{{$item->item_price_in_tax}}</p>
                </div>
                <div class="flex-1 border-black">
                    <p>(TAX IN)</p>
                </div>
            </div>
            {{-- すでにカートに商品があるときは数を足して更新する --}}
            @if(!empty($cart))
            dd({{$cart}});
            
            <form action="{{route('update',$item->item_id)}}" method="post">
            @csrf
            @method('patch')
            <p>カートに入っています</p>
            <div class="flex space-between">
                {{-- 数字変更 --}}
                <div class="flex-1 grid grid-cols-3 spinner-container center">
                    <div class="grid-item  w-1/2 bg-[#d0b49f] ml-auto h-8 flex justify-end"><span class="spinner-sub disabled select-none text-white mr-8">-</span></div>
                    <input class="spinner h-8 select-none text-center w-8 mx-auto" type="text" min="0" max="99" value="1" name="item_count">
                    <div class="grid-item w-1/2 bg-[#d0b49f] mr-auto h-8"><span class="spinner-add text-center select-none text-white">+</span></div>
                    
                </div>
                {{-- カートに入れるボタン --}}
                <div class="flex-1 px-auto">
                    {{-- ログインしているときカートに入れる --}}
                    {{-- @auth
                        <form action="{{route('store')}}"></form>
                        <button class="btn-primary text-xs cart" >カートに入れる</button>
                    @endauth --}}

                    {{-- テスト用のだれでもカートに追加できるバージョン --}}
                        

                            <input type="hidden" name="">
                            <button class="btn-primary text-xs cart" type="submit">カートに入れる</button>
                        
                        
                    
                    {{-- ログインしていないとき、ログインページにとばすように --}}
                    {{-- @guest
                        <button class="btn-primary text-xs" ><a href="/login">カートに入れる</a></button>
                    @endguest --}}
                </div>
            </div>
            </form>
            @else {{--　カートに商品がないときはカートテーブルに追加　--}}
            <form action="{{route('store',$cart)}}" method="POST">
            @csrf
            <p>新規追加です</p>
            <div class="flex space-between">
                {{-- 数字変更 --}}
                <div class="flex-1 grid grid-cols-3 spinner-container center">
                    <div class="grid-item  w-1/2 bg-[#d0b49f] ml-auto h-8 flex justify-end"><span class="spinner-sub disabled select-none text-white mr-8">-</span></div>
                    <input class="spinner h-8 select-none text-center w-8 mx-auto" type="text" min="0" max="99" value="1" name="item_count">
                    <div class="grid-item w-1/2 bg-[#d0b49f] mr-auto h-8"><span class="spinner-add text-center select-none text-white">+</span></div>
                    
                </div>
                {{-- カートに入れるボタン --}}
                <div class="flex-1 px-auto">
                    {{-- ログインしているときカートに入れる --}}
                    {{-- @auth
                        <form action="{{route('store')}}"></form>
                        <button class="btn-primary text-xs cart" >カートに入れる</button>
                    @endauth --}}

                    {{-- テスト用のだれでもカートに追加できるバージョン --}}
                        

                            <input type="hidden" name="">
                            <button class="btn-primary text-xs cart" >カートに入れる</button>
                        
                        
                    
                    {{-- ログインしていないとき、ログインページにとばすように --}}
                    {{-- @guest
                        <button class="btn-primary text-xs" ><a href="/login">カートに入れる</a></button>
                    @endguest --}}
                </div>
            </div>
            </form>
            @endif
            {{-- 数量変更時のエラーメッセージ,成功メッセージ --}}
            <div>
                @if(@session('message'))
                    <div class="text-red-600 font-bold">
                        {{session('message')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- 商品特徴 --}}
    <h2 class="mt-8">商品特徴</h2>
        <hr class="py-2">
    <div class="">
        {{-- <p class="py-8">ジッパーの開口部分が広くて開けやすいポーチは、開けると中に何が入っているか一目瞭然。見た目の割りに大容量なので、旅行時にも活躍すること間違いなし。フランスの地方によくあるバスルームのタイルからインスピレーションを受けたレトロなヴィンテージ調のフラワーパターンが乙女心をくすぐります</p> --}}
        <p class="py-8">{{$item->item_detail_explanation ?? 'coming soon'}}</p>
    </div>
    <hr>
    <div class="flex py-8">
        <h2 id="review" class="flex-1">レビュー</h2>
        <button class="flex-1 text-right border border-black"><a href="">レビューを投稿する</a></button>
    </div>
    <hr>
    {{-- 最初のレビューを2件まで表示 --}}
    <div  class="py-4">
        @if($reviews)
            <p>レビューがありません</p>
            {{--レビュー」があれば表示 --}}
        @else
            @foreach($reviews as $review )
            <div class="bg-white py-4">
                <p>{{$review->review_star}}</p>
                {{-- @for($i = 0;$i < {{$review->review_star}};$i++) --}}
                    <p>☆</p>
                {{-- @endfor --}}
                {{-- @for($i = 0;$i < 5-{{$review->review_star}};$i++) --}}
                    <p>★</p>
                {{-- @endfor --}}
                <div>
                    <h3>{{$review->review_name}}</h3>
                    <p>年代</p>
                    <p>{{$review->created_at}}代</p>
                    <p>2025/02/12</p>
                </div>
                <p>レビュー内容</p>
                <p>{{$review->review_content}}</p>
            </div>
            @endforeach
        @endif
        {{-- <div class="text-right"><a href="/review/index/{{$item->item_id}}" class="border boder-white">もっと見る</div> --}}
    </div>
    
    <hr>
    {{-- 関連商品表示 --}}
    <p>このアイテムが気になった人はこちらも気になっています。</p>
    {{-- 商品５個表示 --}}
    <div class="flex bg-white px-4 py-3">
        {{-- レビューがあれば表示、なければ「特定の5つの商品」を表示 --}}
        @if($reviews)
            <div class="flex-1 px-2 ">
                <img src="https://placehold.jp/150x150.png">
                <p>商品名</p>
            </div>
            <div class="flex-1 px-2 ">
                <img src="https://placehold.jp/150x150.png">
                <p>商品名</p>
            </div>
            <div class="flex-1 px-2 ">
                <img src="https://placehold.jp/150x150.png">
                <p>商品名</p>
            </div>
            <div class="flex-1 px-2 ">
                <img src="https://placehold.jp/150x150.png">
                <p>商品名</p>
            </div>
            <div class="flex-1 px-2 ">
                <img src="https://placehold.jp/150x150.png">
                <p>商品名</p>
            </div>
        @else
            {{-- おすすめ五件の画像と商品名を表示 --}}
            @foreach($recommends as $recommend)
                <div class="flex-1 px-2 ">
                    <img src="{{asset('storage/'.$recommend->item_img ?? 'https://placehold.jp/150x150.png')}}">
                <p>{{$recommend->item_name}}</p> 
            </div>
            @endforeach
        @endif
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
    {{-- カートに入れるボタンを押したときにアラートで「〇〇を〇個、購入しました、」と表示、ログインしていなければログイン画面へ遷移 --}}
    <script>
        $(function(){

        })
    </script>
@endsection
