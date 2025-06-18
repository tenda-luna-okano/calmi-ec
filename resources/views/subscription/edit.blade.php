<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<style>
    .field{
        display: flex;
		justify-content: space-around;
    }
    .popup {
        width: 70%;
        margin: auto;
        padding: 30px 20px;
        display: none;
        text-align: center;
        position: fixed;
        background: white;
        z-index:9999;
    }
    .modal{
        display:none;
        position:fixed;
        width:100vw;
        height:100vh;
        background: rgba(0,0,0,0.5);
        z-index:9998;
    }
    .button-group {
    display: flex;
    justify-content: center;
    gap: 2rem; /* ボタン間の余白 */
    margin-top: 1rem;
    }

    .button-group form,
    .button-group button {
        margin: 0;
    }
</style>
<div class="modal"></div>
@extends('layouts.app')
@section('title', 'トップページ')

@section('content')
<body>


    <!--定期便変更用のポップアップ-->
    <div class="change popup">
        <p>定期便を変更しますか</p>
        <br>
        <div class="button-group">
        <form action="{{route('subscription.update')}}" method="POST">
            @csrf
            <input type="hidden" name="subscriptionID" id="hiddenSubscriptionID" value="1">
            <button type="submit" class="yes">はい</button>
        </form>
        <button class="no">いいえ</button>
</div>
        {{-- <br><button class="cancel">キャンセル</button> --}}
    </div>
    <!--定期便削除用のポップアップ-->
    <div class="delete popup">
        <p>定期便を解約しますか</p>
        <div class="button-group">
        <form action="{{route('subscription.destroy')}}">
            <button class="yes">はい</button>
        </form>
        <br><button class="no">いいえ</button>
        {{-- <br><button class="cancel">キャンセル</button> --}}
</div>
    </div>

    <!--登録している定期便を表示させる必要あり-->
    <br>
    　
    <span style="font-size:20px; text-decoration:underline; text-underline-offset: 5px;" class="flex justify-center">ご登録中の定期便内容</span>
    <br><br>
    <center>
    <div class="field">
        <div style="width:40%;" class="ml-4">
            <div class="shadow-sm rounded" style="height:60px; border:1px solid #201a1e; background-color:white;">
                定期便名<br>{{$subscription->subscribe_detail_master->subscribe_item_name}}
            </div><br>
            <div class="shadow-sm rounded" style="height:60px; border:1px solid #201a1e; background-color:white;">
                お支払方法<br>{{$payment}}
            </div><br>
            <div class="shadow-sm rounded" style="height:60px; border:1px solid #201a1e; background-color:white;">
                次回の更新日<br>{{$subscription->subscribe_end_day}}
            </div><br>
        </div>

        <div style="width:50%; height:200px">
            <img id="LightNight" src="{{ asset($subscription->subscribe_detail_master->subscribe_img) }}" alt="" style="height:90%;">
        </div>
    </div>
    </center>


    <!--登録している定期便の内容によって変更する定期便を変える必要あり-->
    <div class="border-[#D8CFCF]">
    <br>

    <span style="font-size:20px; text-decoration:underline; text-underline-offset: 5px;" class="flex justify-center">定期便の変更</noframes></span>
    <br><br>
    <center>
    <div class="field">
        @foreach($subscriptionImg as $img)
            <div>
                <img id="DeepNight" src="{{ asset($img['img']) }}" alt="" style="width:80%;"><br>
                <p>{{$img['name']}}</p>
                <button class="change_subscription rounded m-2" style="background-color:#d0b49f; height:40px; width:60%; color:white;" name="subscriptionID", data-product-id="{{$img['id']}}">変更する</button>
            </div>
        @endforeach
    </div>
    </center>
    <br>

    <br>
    <span style="font-size:20px; text-decoration:underline; text-underline-offset: 5px;" class="flex justify-center">定期便の解除</noframes></span>
    <br><br><br>
    <center><button class="delete_subscription btn-primary" style="height:70px; width:80%; color:white;" ">登録中の定期便を解除する</button></center>
    <br><br>

</body>

@endsection
<script src="{{ asset('/js/pop_up.js') }}"></script>
