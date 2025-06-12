@extends('layouts.app')

@section('title', 'cart')

@section('content')
    <x-auth-session-status class="mb-4" :status="session('status')" />




    <div class="w-5/6 mx-auto">
    <div class="pt-6 pb-4 flex justify-center border-b-2 mb-4">
        <h2 >ショッピングカート</h2>
    </div>

    {{-- main --}}
    <div class="bg-white pb-6 pt-6  pr-6 pl-6 w-6/7 mx-auto">
    <table class="w-full">
        <thead class="w-full">
            <tr class="pr-4">
                <th>商品</th>
                <th class="text-right">小計</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartlist as $cartItem)
                <tr class="w-full">
                <th class="border w-1/4"><img src="" alt="画像"></th>
                <th class="w-full pl-3">
                    <div class="w-full text-left">
                        <a href="/products/show/{{$cartItem->item_id}}">{{$cartItem->item_master->item_name}}</a>
                    </div>
                    <div class="grid grid-cols-3 w-full">
                        {{-- <p class="text-left">ボタン</p> --}}
                        <div class="grid grid-cols-3 spinner-container ">
                            <div class="grid-item w-1/2 bg-[#d0b49f] ml-auto"><span class="spinner-sub disabled text-center select-none text-white">-</span></div>
                            <input class="spinner h-8 select-none text-center w-full mx-auto" type="text" min="0" max="99" value="{{$cartItem->item_count}}">
                            <div class="grid-item w-1/2 bg-[#d0b49f] mr-auto"><span class="spinner-add text-center select-none text-white">+</span></div>
                        </div>
                        <div><img class="h-8" src="{{ asset('img/trashcan.png')}}" alt="ゴミ箱"></div>
                        <p class="text-right">￥{{$cartItem->item_master->item_price_in_tax}}</p>
                    </div>
                </th>
            </tr>
            @endforeach

        </tbody>

    </table>

    </div>



    {{-- under --}}
    <div class="mt-6 border-b-2"></div>
        <div class=""><p class="text-right">合計　￥2,350</p></div>
        <div class="flex w-full">
            <button class="btn-primary mt-4 w-140 ml-auto" onclick="location.href='">
                ご購入へ
            </button>
        </div>
    </div>

    {{-- 下の空白用 --}}
    <div class="mb-6"></div>

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
