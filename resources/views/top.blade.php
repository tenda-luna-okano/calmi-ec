<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />


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

        <div class="mb-6 border border-[#ccc] rounded overflow-hidden">
            <ul class="slick">
                <li><img id="スライドショー用１" src="{{ asset('img/スライドショー用１.png') }}" alt=""></li>
                <li><img id="スライドショー用２" src="{{ asset('img/スライドショー用２.png') }}" alt=""></li>
            </ul>
        </div>

        <div style="height:25px;"></div>

        <!--
            LightNight,DeepNight,PremiumNightの文字が横幅少し広いので松竹梅のような短い名前で表したほうがいいかもしれない
        -->
        <h2 class="text-xl font-semibold text-center mb-4 border-b pb-2 border-[#d8cfcf]">Calmi定期便ラインナップ</h2>
        <div class="field">
            <li style="list-style:none;">
                <a href="{{route('subscription.index')}}">
                    LightNight<img class="subscription" name="LightNight" src="{{ asset('img/LightNight.png') }}" alt="" style="width:80%;">
                </a>
            </li>
            <li style="list-style:none;">
                <a href="{{route('subscription.index')}}">
                    DeepNight<img class="subscription" name="DeepNight" src="{{ asset('img/DeepNight.png') }}" alt="" style="width:80%;">
                </a>
            </li>
            <li style="list-style:none;">
                <a href="{{route('subscription.index')}}">
                    PremiumNight<img class="subscription" name="PremiumNight" src="{{ asset('img/PremiumNight.png') }}" alt="" style="width:80%;">
                </a>
            </li>
        </div>
            

        
        
        <!--
            ジャンルごとの写真がまだないのでジャンルの中から一つの写真をピックアップして載せてます
        -->
        <div class="m-10"></div>
        {{-- ジャンルごとのご紹介 --}}
        <h2 class="text-xl font-semibold text-center mt-4 mb-4 border-b pのご紹介b-2 border-[#d8cfcf]">カテゴリ別に見る癒しグッズ</h2>
        <div class="field">
            <li style="list-style:none;">
                <a href="{{route('search.results.category',['idName'=>'アロマ'])}}">
                    アロマ<img class="category" id="アロマ" src="{{ asset('img/ピローミスト.png') }}" alt="" style="width:60%;">
                </a>
            </li>
            <li style="list-style:none;">
                <a href="{{route('search.results.category',['idName'=>'フード'])}}">
                    フード<img class="category" id="フード" src="{{ asset('img/GABAチョコレート.png') }}" alt="" style="width:60%;">
                </a>
            </li>
        </div>
        <br>
        <div class="field">
            <li style="list-style:none;">
                <a href="{{route('search.results.category',['idName'=>'タッチ'])}}">
                    タッチ<img class="category" id="タッチ" src="{{ asset('img/温感ジェル.png') }}" alt="" style="width:60%;">
                </a>
            </li>
            <li style="list-style:none;">
                <a href="{{route('search.results.category',['idName'=>'ご褒美スイーツ'])}}">
                    ご褒美スイーツ<img class="category" id="ご褒美スイーツ" src="{{ asset('img/マカロン.png') }}" alt="" style="width:60%;">
                </a>
            </li>
        </div>

        <div style="height:50px;"></div>

    </center>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

<script src="{{ asset('/js/slideshow.js') }}"></script>

