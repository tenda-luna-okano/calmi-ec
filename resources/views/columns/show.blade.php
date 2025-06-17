@extends('layouts.app')
@section('title', $column->column_name)

@section('content')
<div class="max-w-3xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4 text-center">{{ $column->column_name }}</h1>
        <div class="flex justify-center">
            <img src="{{ asset($column->column_img) }}" alt="{{ $column->column_name }}" class="w-[50%] mb-4">
        </div>
        <div class="flex justify-center">
            <p class="text-center">{!! nl2br(e($column->column_content)) !!}</p>
        </div>
</div>
@endsection
