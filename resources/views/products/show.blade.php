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
                {{-- 商品名 --}}
                <p class="mt-4 text-2xl">{{$item->item_name}}</p>
            </div>
            <div class="flex">
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
            <form action="{{route('products.update',$cart)}}" method="post">
            @csrf
            @method('patch')
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
                        
                    {{-- item_idを渡す --}}
                    <input type="hidden" name="item_id" value="{{$cart->item_id}}">
                    <input type="hidden" name="cart_id" value="{{$cart->cart_id}}">
                    <button class="btn-primary text-xs cart" type="submit">カートに入れる</button>
                        
                        
                    
                    {{-- ログインしていないとき、ログインページにとばすように --}}
                    {{-- @guest
                        <button class="btn-primary text-xs" ><a href="/login">カートに入れる</a></button>
                    @endguest --}}
                </div>
            </div>
            </form>
            @else {{--　カートに商品がないときはカートテーブルに追加　--}}
            <form action="{{route('products.store',$item->item_id)}}" method="POST">
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
        {{-- 商品IDと一緒にレビュー投稿画面へ --}}
        {{-- <form action="{{route('reviews.store')}}" method="POST"> --}}
        <form action="{{route('reviews.index',$item->item_id)}}" method="POST">
            <input type="hidden" name="item_id" value="{{$item->item_id}}">
            <button class="flex-1 text-right border border-black">レビューを投稿する</button>
        </form>
        
    </div>
    <hr>
    {{-- 最初のレビューを2件まで表示 --}}
    <div  class="py-4" id="parent_review">
        @if(empty($reviews))
            <p>レビューがありません</p>
            {{--レビュー」があれば表示 --}}
        @else
            @foreach($reviews as $review )
            <div class="bg-white py-4">
                
                {{-- レビューの★ --}}
                @for($i = 0;$i < $review->review_star;$i++)
                    <h4>☆</h4>
                @endfor
                @for($i = 0;$i < 5-$review->review_star;$i++)
                    <h4>★</h4>
                @endfor
                <div>
                    {{-- レビューのタイトル --}}
                    <h3>{{$review->review_name}}</h3>
                    <p>年代</p>
                    <p>{{$review->reviewer_age}}代</p>
                    {{-- 投稿日 --}}
                    <p>2025/02/12</p>
                </div>
                <p>レビュー内容</p>
                <p>{{$review->review_content}}</p>
            </div>
            @endforeach
        @endif
        <div class="text-right"><button class="more">もっと見る</button></div>
    </div>
    
    <hr>
    {{-- 関連商品表示 --}}
    <p>このアイテムが気になった人はこちらも気になっています。</p>
    {{-- 商品５個表示 --}}
    <div class="flex bg-white px-4 py-3">
        {{-- おすすめがあれば表示、なければ「特定の5つの商品」を表示 --}}
        @if(!empty($recommends))
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
    {{--  --}}
    <script>
        $(function(){
            $('.more').on('click',function(){
                var data = @json($all_reviews);
                const parent_review = document.getElementById('parent_review');
                data.forEach(review => {
                    const child = document.createElement('div');
                    const star = document.createElement('h4');
                    // レビューの★を表示
                    for(let i = 0; i < review['review_star'];i++){
                        star.innerText .= '☆';
                    }
                    for(let i = 0; i < 5-review['review_star'];i++){
                        star.innerText .= '★';
                    }
                    // レビューのタイトルを作成
                    const title = document.createElement('h3');
                    title.innerText = review['review_name'];
                    // レビューした人のの年代
                    const review = docoment.createElement(p)
                    review.innerText = review['review_age'];
                });
            });
        });
    </script>
@endsection
