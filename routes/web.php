<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\AdminCouponController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\WithdrawController;



Route::get('/', function () {
    return view('welcome');
});
// サブスク詳細画面
Route::get('/subscription/index',[SubscriptionController::class,'index']);

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


Route::get('/mypage/withdraw',function(){
    return view('mypage.withdraw');
})->name('mypage.withdraw');

Route::get('/mypage/withdraw_confirm', [WithdrawController::class, 'confirm'])->name('mypage.withdraw_confirm');


// 実行（退会処理）
Route::post('/mypage/withdraw', [WithdrawController::class, 'withdraw'])->name('mypage.withdraw');

Route::get('/admin/coupons/issue', [AdminCouponController::class, 'issue'])->name('admin.coupons.issue'); // フォーム表示
Route::post('/admin/coupons/issue', [AdminCouponController::class, 'store'])->name('admin.coupons.store'); // 登録処理

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
})->name('admin.coupons.index');

Route::get('/admin/products/insert',function(){
    return view('admin.products.insert');
});
// お問い合わせフォームを表示（GET）
Route::get('/contact/index', [InquiryController::class, 'index'])->name('inquiry.form');
Route::post('/contact/index', [InquiryController::class, 'store'])->name('inquiry.store');

Route::get('/reviews/index', function () {
    return view('reviews.index');
});

Route::get('/mypage/index',[MypageController::class, 'index'])->name('mypage.index');;

Route::get('/top', function () {
    return view('top');
})->name('top');

Route::get('/mypage/purchase_history_detail', function(){
    return view('mypage.purchase_history_detail');
});
// 購入確認画面
Route::get('/orders/confirm',[OrderController::class,'confirm']);

// ユーザー情報変更
Route::get('/mypage/edit_user',[MyPageController::class,'edit_user'])->name('mypage.edit_user');

// 購入履歴
Route::get('/mypage/purchase_history',[MyPageController::class,'history'])->name('mypage.purchase_history');;


Route::post('/reviews/index', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/admin/coupons/index', [CouponController::class, 'index'])->name('admin.coupons.index');

// 編集フォームを表示（GET）
Route::get('/admin/coupons/edit/{id}', [CouponController::class, 'edit'])->name('admin.coupons.edit');

// 更新処理（PUT or POST）
Route::post('/admin/coupons/update/{id}', [CouponController::class, 'update'])->name('admin.coupons.update');

Route::get('/mypage/history',[MyPageController::class,'history']);
