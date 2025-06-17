@extends('layouts.app')

@section('title', 'お問い合わせフォーム')

@section('content')
    <div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center mt-6 ">Contact</h1>
    <p class="text-center mb-6">お問い合わせ</p>
</div>
{{-- バリデーションエラー表示 --}}
    @if ($errors->any())
        <div class="max-w-md mx-auto text-red-500 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>・{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
<form method="POST" action = "{{ route('inquiry.store') }}" class="max-w-md mx-auto px-4">
    @csrf
    <div class="form-group m-4">
        <label for="customer_nickname" class="text-left">お名前</label><br>
        <input type="text" id="customer_nickname" name="customer_nickname" class="form-control w-80" placeholder="お名前を入力してください">
    </div>
    <div class="form-group m-4">
        <label for="customer_mail">メールアドレス</label><br>
        <input type="email" id="customer_mail" name="customer_mail" class="form-control w-80" placeholder="メールアドレスを入力してください">
    </div>
    <div class="form-group m-4">
        <label for="inquiry_content" class="text-left">お問い合わせ内容</label><br>
        <textarea id="inquiry_content" name="inquiry_content" class="form-control w-80" rows="4" placeholder="お問い合わせ内容を入力してください"></textarea>
    </div>
    <div class="flex justify-center mb-6">
            <button class="btn-primary px-4 py-2">
                送信
            </button>
        </div>
    </div>
</form>
@endsection
