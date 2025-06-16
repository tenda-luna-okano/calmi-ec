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
                <th class="border w-1/4"><a href="{{route('products.show',$cartItem->item_id)}}"><img class="mx-4 pe-8 mt-8 " src="{{asset($item->item_img ?? 'https://placehold.jp/150x150.png')}}" alt="商品画像"></a></th>
                <th class="w-full pl-3">
                    <div class="w-full text-left">
                        <a href="{{route('products.show',$cartItem->item_id)}}">{{$cartItem->item_master->item_name}}</a>
                    </div>
                    <div class="grid grid-cols-3 w-full">
                        {{-- <p class="text-left">ボタン</p> --}}
                        <div class="grid grid-cols-3 spinner-container ">
                            <div class="grid-item w-1/2 bg-[#d0b49f] ml-auto"><span class="spinner-btn spinner-sub disabled text-center select-none text-white">-</span></div>
                            <input class="spinner h-8 select-none text-center w-full mx-auto" type="text" min="1" max="99" value="{{$cartItem->item_count}}" data-cart-id="{{ $cartItem->cart_id }}">
                            <div class="grid-item w-1/2 bg-[#d0b49f] mr-auto"><span class="spinner-btn spinner-add text-center select-none text-white">+</span></div>
                        </div>
                        <div>
                            <form action="{{ route('cart.destroy', $cartItem->cart_id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button><img class="h-8" src="{{ asset('img/trashcan.png')}}" alt="ゴミ箱"></button></div>
                            </form>
                        {{-- 小計 --}}
                        <p class="text-right subtotal" data-price="{{ $cartItem->item_master->item_price_in_tax }}">￥{{number_format($cartItem->item_count*$cartItem->item_master->item_price_in_tax)}}</p>
                    </div>
                </th>
            </tr>
            @endforeach

        </tbody>

    </table>

    </div>



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
    // CSRFトークン設定（Bladeテンプレート内で <meta name="csrf-token"> が必要）
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // + / - ボタンのクリック処理
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

    // 数量変更イベントでAjax送信
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
                // ↓ 小計と合計を更新する関数を呼ぶ（次で定義）
                updatePrices();
            },
            error: function (xhr) {
                alert('数量更新に失敗しました');
                console.error(xhr.responseText);
            }
        });
    });

    // 合計・小計を更新する関数
    function updatePrices() {
        let total = 0;

        $('.spinner').each(function () {
            let count = parseInt($(this).val());
            let price = parseInt($(this).closest('th').find('.subtotal').data('price'));
            let cartId = $(this).data('cart-id');
            let subtotal = count * price;
            total += subtotal;

            // 小計の表示を更新
            $(this).closest('th').find('.subtotal').text('￥' + subtotal.toLocaleString());
        });

        // 合計金額を更新
        $('#totalPrice').text('合計 ￥' + total.toLocaleString());
    }
});
</script>
@endsection
