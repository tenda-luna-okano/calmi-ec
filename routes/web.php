<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
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


Route::get('/cart', [CartController::class, 'index'])
->name('cart');

Route::get('/admin/dashboard',function(){
    return view('admin.dashboard');
});
require __DIR__.'/auth.php';


Route::get('/orders/payment', function(){
    return view('orders.payment');
});

Route::get('/mypage/withdraw_confirm',function(){
    return view('mypage.withdraw_confirm');
});

Route::get('/admin/coupons/issue', function(){
    return view('admin.coupons.issue');
});

Route::get('/admin/coupons/update',function() {
    return view('admin.coupons.update');
});
Route::get('/admin/sales/index', function() {
    return view('admin.sales.index');
});


Route::get('/admin/products/index', function(){
    return view ('admin.products.index');
});

Route::get('/admin/products/edit', function(){
    return view('admin.products.edit');
});

Route::get('/admin/auth/login',function(){
    return view('admin.auth.login');
});

Route::get('/admin/coupons/index',function() {
    return view('admin.coupons.index');
});

Route::get('/admin/products/insert',function(){
    return view('admin.products.insert');
});

Route::get('/contact/index', function () {
    return view('contact.index');
});

Route::get('/reviews/index', function () {
    return view('reviews.index');
});

Route::get('/mypage/index',[MypageController::class, 'index']);

Route::get('/mypage/purchase_history_detail', function(){
    return view('mypage.purchase_history_detail');
});
// 購入確認画面
Route::get('/orders/confirm',[OrderController::class,'confirm']);

// ユーザー情報変更
Route::get('/mypage/edit_user',[MyPageController::class,'edit_user']);

// 購入履歴
Route::get('/mypage/history',[MyPageController::class,'history']);

