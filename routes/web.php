<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MyPageController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('subscription/index', function () {
    return view('subscription.index');
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


Route::get('/contact/index', function () {
    return view('contact.index');
});

Route::get('/reviews/index', function () {
    return view('reviews.index');
});

Route::get('/mypage/index', function () {
    return view('mypage.index');
});

Route::get('/mypage/purchase_history_detail', function(){
    return view('mypage.purchase_history_detail');
});
// 購入確認画面
Route::get('/orders/confirm',[OrderController::class,'confirm']);

// ユーザー情報変更
Route::get('/mypage/edit_user',[MyPageController::class,'edit_user']);

// 購入履歴
Route::get('/mypage/history',[MyPageController::class,'history']);

