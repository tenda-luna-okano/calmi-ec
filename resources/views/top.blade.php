<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<style>
    .field{
        display: flex;
		justify-content: space-between;
    }
</style>

@extends('layouts.app')
@section('title', 'トップページ')

@section('content')

<!--
    画像はpublic/img内に保存して実行(imgフォルダは作成する)
-->

    <center>
        <div style="height:30px;"></div>

        <div style="width:90%; border:2px solid #201a1e;">
            <ul class="slick">
                <li><img id="スライドショー用１" src="{{ asset('img/スライドショー用１.png') }}" alt=""></li>
                <li><img id="スライドショー用２" src="{{ asset('img/スライドショー用２.png') }}" alt=""></li>
            </ul>
        </div>

        <div style="height:25px;"></div>

        <hr style="width:90%; border:solid #201a1e; height:1px;">
        <div style="height:25px;"></div>

        <!--
            LightNight,DeepNight,PremiumNightの文字が横幅少し広いので松竹梅のような短い名前で表したほうがいいかもしれない
        -->
        <b style="font-size:30px;">定期便のご紹介</b><br><br>
        <div class="field">
            <li style="list-style:none;">LightNight<img id="LightNight" src="{{ asset('img/LightNight.png') }}" alt="" style="width:80%;"></li>
            <li style="list-style:none;">DeepNight<img id="DeepNight" src="{{ asset('img/DeepNight.png') }}" alt="" style="width:80%;"></li>
            <li style="list-style:none;">PremiumNight<img id="PremiumNight" src="{{ asset('img/PremiumNight.png') }}" alt="" style="width:80%;"></li>
        </div>
            

        
        <div style="height:25px;"></div>
        <hr style="width:90%; border:solid #201a1e; height:1px;">
        <div style="height:25px;"></div>
        
        <!--
            ジャンルごとの写真がまだないのでジャンルの中から一つの写真をピックアップして載せてます
        -->

        <b style="font-size:30px;">ジャンルごとのご紹介</b><br><br>
        <div class="field">
            <li style="list-style:none;">アロマ<img id="アロマ" src="{{ asset('img/ピローミスト.png') }}" alt="" style="width:80%;"></li>
            <li style="list-style:none;">フード<img id="フード" src="{{ asset('img/GABAチョコレート.png') }}" alt="" style="width:80%;"></li>
        </div>
        <br>
        <div class="field">
            <li style="list-style:none;">タッチ<img id="タッチ" src="{{ asset('img/温感ジェル.png') }}" alt="" style="width:80%;"></li>
            <li style="list-style:none;">ご褒美スイーツ<img id="ご褒美スイーツ" src="{{ asset('img/マカロン.png') }}" alt="" style="width:80%;"></li>
        </div>

        <div style="height:50px;"></div>

    </center>

@endsection

<script src="{{ asset('/js/slideshow.js') }}"></script>