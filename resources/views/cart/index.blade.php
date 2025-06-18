@extends('layouts.app')

@section('title', 'cart')

@section('content')
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <div class="w-5/6 mx-auto">
    <div class="border-b border-[#201a1e] mb-6">
            <h1 class="font-black text-3xl text-center mt-6 ">Cart</h1>
            <p class="text-center mb-6">カート</p>
        </div>

    {{-- main --}}
    @foreach ($cartlist as $cartItem)
<div class="bg-white rounded-lg shadow-md p-4 mb-4">
    <div class="flex items-center">
        <a href="{{ route('products.show', $cartItem->item_id) }}">
            <img src="{{ asset($cartItem->item_master->item_img ?? 'https://placehold.jp/150x150.png') }}"
                 alt="商品画像"
                 class="w-24 h-24 object-cover rounded mr-4">
        </a>
        <div class="flex-1">
            <p class="text-base font-semibold">{{ $cartItem->item_master->item_name }}</p>

            <div class="spinner-container flex items-center mt-2 space-x-2">
                {{-- マイナス --}}
                <button type="button" class="spinner-btn spinner-sub bg-[#d0b49f] text-white w-8 h-8 rounded">-</button>

                {{-- 数量 --}}
                <input type="text"
                       class="spinner w-12 h-8 text-center border rounded"
                       min="1"
                       max="99"
                       value="{{ $cartItem->item_count }}"
                       data-cart-id="{{ $cartItem->cart_id }}"
                       data-item-id="{{ $cartItem->item_id}}">

                {{-- プラス --}}
                <button type="button" class="spinner-btn spinner-add bg-[#d0b49f] text-white w-8 h-8 rounded">+</button>

                {{-- ゴミ箱 --}}
                <form action="{{ route('cart.destroy', $cartItem->cart_id) }}"
                      method="POST"
                      onsubmit="return confirm('本当に削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button>
                        <img src="{{ asset('img/trashcan.png') }}" alt="削除" class="w-6 h-6">
                    </button>
                </form>
            </div>

            {{-- 小計 --}}
            <p class="mt-2 text-right subtotal text-sm text-gray-700" data-price="{{ $cartItem->item_master->item_price_in_tax }}">
                小計：￥{{ number_format($cartItem->item_count * $cartItem->item_master->item_price_in_tax) }}
            </p>
        </div>
    </div>
</div>
@endforeach




    {{-- under --}}
    <div class="mt-6 border-b-2"></div>
        <div class=""><p class="text-right" id="totalPrice" >合計　￥{{number_format($cart_sum)}}</p></div>
        <div class="flex w-full">
            {{-- 商品情報を受け渡す --}}
            <button class="btn-primary mt-4 w-140 ml-auto">
                <a href="{{route('orders.confirm')}}">
                ご購入へ
                </a>
            </button>
        </div>
    </div>

    {{-- 下の空白用 --}}
    <div class="mb-6"></div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // プラス・マイナスボタンの処理
    $('.spinner-container').on('click', '.spinner-add, .spinner-sub', function () {
        let container = $(this).closest('.spinner-container');
        let input = container.find('.spinner');
        let cartId = input.data('cart-id');
        let currentVal = parseInt(input.val());
        let min = parseInt(input.attr('min'));
        let max = parseInt(input.attr('max'));

        if ($(this).hasClass('spinner-add') && currentVal < max) {
            input.val(currentVal + 1).trigger('change');
        } else if ($(this).hasClass('spinner-sub') && currentVal > min) {
            input.val(currentVal - 1).trigger('change');
        }
    });

    // Ajaxによる数量変更
    $('.spinner').on('change', function () {
        let cartId = $(this).data('cart-id');
        let newCount = $(this).val();

        if (!cartId || !newCount) {
            console.error('cartId または newCount が不正です');
            return;
        }

        $.ajax({
            url: `/cart/${cartId}`,
            type: 'PATCH',
            data: {
                _method: 'PATCH',
                item_count: newCount
            },
            dataType: 'json',
            success: function (response) {
                console.log('数量更新成功:', response);
                updatePrices();
            },
            error: function (xhr) {
                alert('数量更新に失敗しました');
                console.error(xhr.responseText);
            }
        });
    });

    // 小計・合計更新関数
    function updatePrices() {
        let total = 0;

        $('.spinner').each(function () {
            let count = parseInt($(this).val());
            let container = $(this).closest('.spinner-container');
            let price = parseInt($(this).closest('.flex-1').find('.subtotal').data('price'));

            if (isNaN(count) || isNaN(price)) {
                console.warn('count or price is NaN', count, price);
                return;
            }

            let subtotal = count * price;
            total += subtotal;

            // container.find('.subtotal').text('￥' + subtotal.toLocaleString());
            $(this).closest('.flex-1').find('.subtotal').text('小計：￥' + subtotal.toLocaleString());
        });

        $('#totalPrice').text('合計 ￥' + total.toLocaleString());
    }
});
</script>
@endsection
