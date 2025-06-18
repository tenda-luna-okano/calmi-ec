{{--footerを下に固定する必要あり--}}
{{--マイページの内容を表示するためのビュー--}}
{{--メニューのところアイコンがずれてるから直すべきかも--}}
@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
    <h1 class="text-center font-bold m-6 text-2xl">マイページ</h1>
    <div class="border border-[#201a19] rounded-lg m-4 p-4">
        <div id="container">
            @foreach($notifications as $notification)
            <div x-data="{ showModal: false }" class="mb-4 text-center">
            <button @click="showModal = true " class="text-[#201a1e] underline">
            {{ $notification['notification_name'] }}</button>
            <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 x-cloak">
            <div class="bg-white p-6 rounded shadow-lg w-2/3 h-2/3 relative">
                <button class="absolute top-2 right-2 text-[#201a1e] hover:text-black"
                        @click = "showModal = false"
                >✕
                </button>
                <p class="text-lg font-semibold mb-4">お知らせ内容</p>
                <p>{{ $notification['notification_content'] }}</p>
                </div>
            </div>
        </div>
            @endforeach
        </div>
    </div>
    <div class="border border-[#201a19] ml-4 mr-4 flex flex-col">
        <a href="{{ route('mypage.index') }}" class="block border-b border-[#201a19] text-center mt-4 pb-4"><span class="material-icons">account_circle</span>マイページトップ</a>
        <a href="{{ route('edit_user.show') }}" class="block border-b border-[#201a19] text-center mt-4 pb-4"><span class="material-icons">edit</span>登録内容の確認・変更</a>
        <a href="{{ route('subscription.edit') }}" class="block  border-b border-[#201a19] text-center mt-4 pb-4"><span class="material-icons">redeem</span>定期便変更・解約</a>
        <a href="{{ route('mypage.purchase_history') }}" class="block border-b border-[#201a19] text-center mt-4 pb-4"><span class="material-icons">receipt</span>ご注文履歴</a>
        <a href="{{ route('mypage.withdraw_confirm') }}" class=" block text-center mt-4 pb-4"><span class="material-icons">logout</span>退会</a>
    </div>
    <div class="flex items-center justify-center m-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-primary">
                ログアウト
            </button>
        </form>
    </div>
@endsection
