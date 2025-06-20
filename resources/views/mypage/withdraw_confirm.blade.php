@extends('layouts.app')

@section('title', '退会確認')

@section('content')
    <div class="border-b border-[#201a1e] mb-6">
            <h1 class="font-black text-3xl text-center mt-6 ">Withdraw Confirm</h1>
            <p class="text-center mb-6">退会確認</p>
    </div>
    <div class="bg-white text-center">
        <form method="POST" action="{{ route('mypage.withdraw') }}">
        @csrf
            <div>
                <p>本当に退会しますか？</p>
                <p>退会後はマイページを利用することができなくなります。</p>
            </div>
            <div class="mt-8">
                <div><a href="{{route('mypage.index')}}"><button type="button" class="btn-primary mt-8">キャンセル</button></a></div>
                <div type="submit" class="border-black"><button type="submit" class=" mt-8 border border-black py-2 px-6">退会する</button></div>
            </div>
    </form>
    </div>

@endsection
