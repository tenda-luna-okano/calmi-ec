@extends('layouts.admin')

@section('title', 'コラム投稿')

@section('content')
    <div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center mt-6 ">Contact</h1>
    <p class="text-center mb-6">コラム投稿</p>
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
<form method="POST" action="{{ route('admin.columns.post') }}" enctype="multipart/form-data" class="max-w-md mx-auto px-4">
    @csrf
    <div class="form-group m-4">
        <label for="column_name" class="text-left">タイトル</label><br>
        <input type="text" id="column_name" name="column_name" class="form-control w-80" placeholder="コラムタイトル">
    </div>
    <div class="form-group mt-4 pb-4">
            <label for="column_img">コラムイメージ画像</label>
            <input class="w-80" type="file" id="column_img" name="column_img" class="form-control-file">
        </div>
    <div class="form-group m-4">
        <label for="column_content" class="text-left">コラム内容</label><br>
        <textarea id="column_content" name="column_content" class="form-control w-80 h-80" rows="10" placeholder="コラム内容"></textarea>
    </div>
    <div class="flex justify-center mb-6">
            <button class="btn-primary px-4 py-2">
                投稿
            </button>
        </div>
    </div>
</form>
@endsection
