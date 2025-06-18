@extends('layouts.app')

@section('title', '商品詳細')

@section('content')
{{-- スマホでは縦並び、md以上で横並び --}}
<div class="flex flex-col md:flex-row justify-center">
    {{-- 商品画像 --}}
    <div class="w-full md:w-1/2 flex justify-center">
        <img class="mx-4 mt-8 max-w-[300px]" src="{{ asset($item->item_img ?? 'https://placehold.jp/150x150.png') }}" alt="商品画像">
    </div>

    {{-- 商品情報 --}}
    <div class="w-full md:w-1/2 px-4 mt-6 md:mt-8">
        <p class="text-sm text-gray-600">{{ $item->category_master->category_name }}</p>
        <p class="mt-2 text-2xl font-bold">{{ $item->item_name }}</p>

        <div class="flex items-center mt-2 text-sm">
            <p>★{{ $item->item_review_star }}({{ $review_num }})</p>
            <a href="#review" class="ml-2 text-xs text-blue-500 underline">レビューを表示</a>
        </div>

        <div class="mt-2 text-lg font-semibold">
            ￥{{ number_format($item->item_price_in_tax) }} <span class="text-sm">(税込)</span>
        </div>
            {{-- すでにカートに商品があるときは数を足して更新する --}}
            <form action="{{ !empty($cart) ? route('products.update', $cart) : route('products.store', $item->item_id) }}" method="POST" class="mt-4">
        @csrf
        @if(!empty($cart))
            @method('PATCH')
        @endif

        <div class="flex items-center justify-center gap-2 mb-4">
            <button type="button" class="spinner-sub bg-[#d0b49f] text-white w-8 h-8 rounded">-</button>
            <input type="text" name="item_count" value="1" min="1" max="99" class="spinner w-12 h-8 text-center border rounded focus:outline-none focus:ring-1 focus:ring-[#d0b49f]">
            <button type="button" class="spinner-add bg-[#d0b49f] text-white w-8 h-8 rounded">+</button>
        </div>

        <div class="flex justify-center">
            @auth
                <input type="hidden" name="item_id" value="{{ $item->item_id }}">
                @if(!empty($cart))
                    <input type="hidden" name="cart_id" value="{{ $cart->cart_id }}">
                @endif
                <button class="btn-primary w-48 text-sm" type="submit">カートに入れる</button>
            @else
                <a href="/login" class="btn-primary w-48 text-sm text-center">カートに入れる</a>
            @endauth
        </div>
    </form>
            {{-- 数量変更時のエラーメッセージ,成功メッセージ --}}
            <div>
                @if(@session('message'))
                    <div class="text-red-600 text-center">
                        {{session('message')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- 商品特徴 --}}
    <h2 class="text-lg font-bold mt-10 mb-2 border-b pb-1">商品特徴</h2>
    <p class="text-sm text-gray-700">{{ $item->item_detail_explanation ?? 'Coming soon...' }}</p>
    <div class="flex justify-between items-center mt-10 mb-2">
        <h2 id="review" class="text-lg font-bold">レビュー</h2>
        <button 
            onclick="location.href='{{ route('reviews.index', $item->item_id) }}'" 
            class="text-sm border border-[#b89f89] rounded px-4 py-1 text-[#5c4a3d] hover:bg-[#f5e9e1] transition">
            レビューを投稿する
        </button>
    </div>
    
    <hr>
    {{-- 最初のレビューを2件まで表示 --}}
    <div  class="py-4" id="parent_review">
        @if($reviews->isEmpty())
            <p>レビューがありません</p>
            {{--レビュー」があれば表示 --}}
        @else
            @foreach($reviews as $review )
            <div class="bg-white py-4">
                
                {{-- レビューの★ --}}
                <h4>
                @for($i = 0;$i < $review->review_star;$i++)
                    ★
                @endfor
                @for($i = 0;$i < 5-$review->review_star;$i++)
                    ☆
                @endfor
                </h4>
                <div>
                    {{-- レビューのタイトル --}}
                    <h3>{{$review->review_name}}</h3>
                    <p>年代</p>
                    <p>{{$review->reviewer_age}}代</p>
                    {{-- 投稿日、あとでcreated_atにする --}}
                    <p>{{$review->created_at}}</p>
                    {{-- <p>2025/02/12</p> --}}
                </div>
                <p>レビュー内容</p>
                <p>{{$review->review_content}}</p>
            </div>
            @endforeach
            {{-- 追加のレビューがあれば「もっとみる」ボタンを表示 --}}
            @if(!$all_reviews->isEmpty())
                <div class="text-right">
                    <button class="more">もっと見る</button>
                </div>
            @endif
        @endif
    </div>
    
    <hr>

    {{-- 関連商品表示 --}}

    <p>このアイテムが気になった人はこちらも気になっています。</p>
    <div class="overflow-x-auto whitespace-nowrap py-4">
        @foreach($recommends as $recommend)
            <div class="inline-block w-[140px] mx-2">
                <a href="{{ route('products.show', $recommend->item_id) }}">
                    <img src="{{ asset($recommend->item_img ?? 'https://placehold.jp/150x150.png') }}" class="rounded shadow">
                    <p class="text-sm mt-1 text-center truncate">{{ $recommend->item_name }}</p>
                </a>
            </div>
        @endforeach
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
    {{-- もっと見るを押したときの挙動 --}}
    <script>
        $(function(){
            $('.more').on('click',function(){
                var data = @json($all_reviews);
                const parent_review = document.getElementById('parent_review');

                data.forEach(review => {
                    const child = document.createElement('div');
                    child.classList.add('bg-white', 'py-4');

                    // 星の表示
                    const starWrapper = document.createElement('div');
                    for(let i = 0; i < review['review_star']; i++){
                        const star = document.createElement('span');
                        star.innerText = '★';
                        starWrapper.appendChild(star);
                    }
                    for(let i = 0; i < 5 - review['review_star']; i++){
                        const star = document.createElement('span');
                        star.innerText = '☆';
                        starWrapper.appendChild(star);
                    }
                    child.appendChild(starWrapper);

                    // タイトル
                    const title = document.createElement('h3');
                    title.innerText = review['review_name'];
                    child.appendChild(title);

                    // 年代
                    const age = document.createElement('p');
                    age.innerText = `${review['reviewer_age']}代`;
                    child.appendChild(age);

                    // 投稿日
                    const postDate = document.createElement('p');
                    date = new Date(review['created_at']);
                    postDate.innerText = date.toLocaleString() ?? '日付不明';
                    child.appendChild(postDate);

                    // レビュー内容
                    const contentLabel = document.createElement('p');
                    contentLabel.innerText = 'レビュー内容';
                    const content = document.createElement('p');
                    content.innerText = review['review_content'];
                    child.appendChild(contentLabel);
                    child.appendChild(content);

                    // レビューを追加
                    parent_review.appendChild(child);
                });

                // 「もっと見る」ボタンを消す
                this.style.display = 'none';
            });
        });
    </script>
@endsection