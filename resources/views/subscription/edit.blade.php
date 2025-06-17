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
        <form action="{{route('subscription.update')}}" method="POST">
            @csrf
            <input type="hidden" name="subscriptionID" id="hiddenSubscriptionID" value="">
            <button type="submit" class="yes">はい</button>
        </form>
        <button class="no">いいえ</button>
        <br><button class="cancel">キャンセル</button>
    </div>
    <!--定期便削除用のポップアップ-->
    <div class="delete popup">
        <p>定期便を削除しますか</p>
        <form action="{{route('subscription.destroy')}}">
            <button class="yes">はい</button>
        </form>
        <br><button class="no">いいえ</button>
        <br><button class="cancel">キャンセル</button>
    </div>

    <!--登録している定期便を表示させる必要あり-->
    <br>
    　
    <span style="font-size:20px; text-decoration:underline; text-underline-offset: 5px;">ご登録中の定期便内容</span>
    <br><br>
    <center>
    <div class="field">
        <div style="width:40%;">
            <div style="height:60px; border:2px solid #201a1e; background-color:white;">
                定期便名<br>{{$subscription->subscribeDetailMaster->subscribe_item_name}}
            </div><br>
            <div style="height:60px; border:2px solid #201a1e; background-color:white;">
                お支払方法<br>{{$payment}}
            </div><br>
            <div style="height:60px; border:2px solid #201a1e; background-color:white;">
                次回の更新日<br>{{$subscription->subscribe_end_day}}
            </div><br>
        </div>

        <div style="width:50%; height:200px">
            <img id="LightNight" src="{{ asset($subscription->subscribeDetailMaster->subscribe_img) }}" alt="" style="height:90%;">
        </div>
    </div>
    </center>


    <!--登録している定期便の内容によって変更する定期便を変える必要あり-->
    <center><hr style="width:90%; border:solid #201a1e; height:1px;"></center>
    <br>
    　
    <span style="font-size:20px; text-decoration:underline; text-underline-offset: 5px;">定期便の変更</noframes></span>
    <br><br>
    <center>
    <div class="field">
        @foreach($subscriptionImg as $img)
            <div>
                <img id="DeepNight" src="{{ asset($img['img']) }}" alt="" style="width:80%;"><br>
                <button class="change_subscription" style="background-color:#d0b49f; height:40px; width:60%; color:white;" name="subscriptionID", data-product-id="{{$img['id']}}">変更する</button>
            </div>
        @endforeach
    </div>
    </center>
    <br>
    <center><hr style="width:90%; border:solid #201a1e; height:1px;"></center>
    <br>
    　
    <span style="font-size:20px; text-decoration:underline; text-underline-offset: 5px;">定期便の解除</noframes></span>
    <br><br><br>
    <center><button class="delete_subscription" style="background-color:#d0b49f; height:70px; width:80%; color:white;">登録中の定期便を解除する</button></center>
    <br><br>

</body>

@endsection 
<script src="{{ asset('/js/pop_up.js') }}"></script>
