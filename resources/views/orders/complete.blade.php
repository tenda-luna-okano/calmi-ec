<!DOCTYPE html>

@extends('layouts.app')
@section('title', 'トップページ')

@section('content')
    <center>
        <br><br>
        決済完了<br>
        <hr style="width:40%; border:solid #e2e6e7; height:1px;">
        <br>
        <!--お知らせの内容を後で更新-->
        <div style="background-color:white; border:2px solid #201a1e; color:red; border-radius:10px; width:90%; height:80px">
            お知らせ
        </div>

        <br>

        <div style="background-color:white; width:90%">
            <div style="width:90%;">
                <br>ご注文ありがとうございました。<br><br>

                確認のため、メールをご送信いたしましたので、ご確認ください。<br><br>

                <!--注文番号後で取得-->
                注文番号：000000000000

                <br><br><br>
                <button id="top" style="background-color:#d0b49f; width:40%; color:white;">トップへ</button>
                <br><br>
            </div>
        </div>
        <br>
    </center>


@endsection 