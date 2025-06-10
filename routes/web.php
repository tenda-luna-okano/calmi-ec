<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('top');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products/index', [ProductsController::class, 'index']);
require __DIR__.'/auth.php';

//定期便詳細ページへ
Route::get('/subscription/index',function(){return view('subscription/index');})->name('subscription.index');

//ジャンルごとページへ({id}は後で検索結果ページのロジック作成時修正)
Route::get('/search/results/{id}',function(){return view('search/results');})->name('search.results');
