@extends('layouts.app')

@section('title', '退会確認')

@section('content')
    <h1 class="text-center">退会確認</h1>
    <div class="bg-white text-center">
        <form method="POST" action="{{ route('mypage.withdraw') }}">
        @csrf
            <div>
                <p>本当に退会しますか？</p>
                <p>退会後はマイページを利用することができなくなります。</p>
            </div>
            <div class="mt-8">
                <div><button type="button" class="btn-primary mt-8">キャンセル</button></div>
                <div type="submit" class="border-black"><button type="submit" class=" mt-8 border border-black py-2 px-6">退会する</button></div>
            </div>
    </form>
    </div>
    
@endsection
