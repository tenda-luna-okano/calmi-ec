@extends('layouts.app')
@section('title', 'コラム一覧')

@section('content')
<div class="border-b border-[#201a1e] m-4">
    <h1 class="font-black text-3xl text-center mt-6 ">Columns</h1>
    <p class="text-center mb-6">コラム</p>
</div>
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 px-4">
    @foreach ($columns as $column)
        <div class="flex flex-col items-center">
            <a href="{{ route('columns.show', $column->column_id) }}">
            <img src="{{ asset($column->column_img) }}" 
                 alt="{{ $column['column_name'] }}" 
                 class="w-full aspect-square object-cover mb-2">
            <a href="{{ route('columns.show', $column->column_id) }}">
                <p class="text-center">{{ $column->column_name }}</p>
            </a>
        </div>
    @endforeach
</div>
@endsection