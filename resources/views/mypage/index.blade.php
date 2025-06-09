{{--footerを下に固定する必要あり--}}
{{--マイページの内容を表示するためのビュー--}}
{{--メニューのところアイコンがずれてるから直すべきかも--}}
@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
    <h1 class="text-center font-bold m-6 text-2xl">マイページ</h1>
    <div class="border border-[#201a19] rounded-lg m-4 p-4">
        <div>ここにお知らせなどが来ます。次回のお届け日などなど</div>
    </div>
    <div class="border border-[#201a19] ml-4 mr-4">
        <div class="border-b border-[#201a19] text-center mt-4 pb-4"><span class="material-icons">account_circle</span>マイページトップ</div>
        <div class="border-b border-[#201a19] text-center mt-4 pb-4"><span class="material-icons">edit</span>登録内容の確認・変更</div>
        <div class="border-b border-[#201a19] text-center mt-4 pb-4"><span class="material-icons">favorite</span>お気に入り商品</div>
        <div class="border-b border-[#201a19] text-center mt-4 pb-4"><span class="material-icons">receipt</span>ご注文履歴</div>
        <div class="text-center mt-4 pb-4"><span class="material-icons">logout</span>退会</div></div>
    <div class="flex items-center justify-center m-4">
        <button class="btn-primary">
            ログアウト
        </button>
    </div>
@endsection
