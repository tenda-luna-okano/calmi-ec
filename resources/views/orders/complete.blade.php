<!DOCTYPE html>

@extends('layouts.app')
@section('title', 'トップページ')

@section('content')
    <center>
        <div class="border-b border-[#201a1e] mb-4" style="width:90%">
            <h1 class="font-black text-3xl text-center mt-6 ">Payment Complete</h1>
            <p class="text-center mb-6">決済完了</p>
        </div>
        <br>
        <div class="border border-black rounded-lg p-4 mb-6 text-center" style="width:90%">
            <p class="text-red-500 font-semibold">お知らせ</p>
        </div>

        <br>

        <div style="background-color:white; width:90%">
            <div style="width:90%;">
                <br>ご注文ありがとうございました。<br><br>

                確認のため、メールをご送信いたしましたので、ご確認ください。<br><br>

                <!--注文番号後で取得-->
                注文番号：{{$order_number['order_id']}}

                <br><br><br>
                <form action="{{route('top')}}">
                    <button id="top" style="background-color:#d0b49f; width:40%; color:white;">トップへ</button>
                </form>
                <br><br>
            </div>
        </div>
        <br>
    </center>

@endsection
