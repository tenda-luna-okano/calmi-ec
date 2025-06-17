<?php

use App\Http\Controllers\AdminloginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\Auth\EditUserController;
use App\Http\Controllers\AdminSalesController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ColumnController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\ReviewController;

// ----------------トップページ----------------
Route::get('/', function () {
    return view('top');
});

Route::get('/top', function(){
    return view('top');
})->name('top');


// サブスク詳細画面
Route::get('/subscription/index',[SubscriptionController::class,'index'])
->name('subscription.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // カート画面
    Route::get('/cart', [CartController::class, 'index'])
    ->name('cart');

    // カートのゴミ箱削除機能
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    // カートの変更をし、購入確認画面へ遷移
    Route::patch('/cart/{id}',[CartController::class, 'update'])->name('cart.update');

    Route::get('/orders/payment', function(){
        return view('orders.payment');
    })->name('orders.payment');

    //決済方法の取得
    Route::post('/orders/complete',[OrderController::class,'payment'])->name('orders.complete');

    //定期便変更画面へ
    Route::get('/subscription/edit',[SubscriptionController::class,'edit'])->name('subscription.edit');

    //定期便更新
    Route::post('/subscription/update',[SubscriptionController::class,'update'])->name('subscription.update');

    //定期便削除
    Route::get('/subscription/destroy',[SubscriptionController::class,'destroy'])->name('subscription.destroy');

    // 購入確認画面
    Route::get('/orders/confirm',[OrderController::class,'confirm'])
    ->name('orders.confirm');

    // レビュー投稿のビュー
    Route::get('/reviews/index/{item_id}', [ReviewController::class,'index'])
    ->name('reviews.index');

    //mypage関係のルート
    Route::prefix('mypage')->group(function(){
        Route::get('index', function () {
            return view('mypage.index');
        });

        Route::get('index',[MypageController::class, 'index'])
        ->name('mypage.index');;

        // ユーザー情報変更
        Route::get('edit_user',[EditUserController::class,'show'])
        ->name('edit_user.show');

        Route::put('edit_user',[EditUserController::class,'update'])
        ->name('edit_user.update');

        // 購入履歴
        Route::get('history',[MyPageController::class,'history'])
        ->name('mypage.purchase_history');

        Route::get('purchase_history_detail', function(){
            return view('mypage.purchase_history_detail');
        });

        // マイページの購入履歴詳細画面
        Route::get('purchase_history_detail', [MyPageController::class,'history_detail']);
        Route::post('purchase_history_detail', [MyPageController::class,'history_detail']);



        Route::get('withdraw_confirm',function(){
            return view('mypage.withdraw_confirm');
        });

        Route::get('withdraw',function(){
            return view('mypage.withdraw');
        })->name('mypage.withdraw');

        Route::post('withdraw',[WithdrawController::class, 'withdraw']);

        Route::get('withdraw_confirm', [WithdrawController::class, 'confirm'])
        ->name('mypage.withdraw_confirm');
    });
});

Route::get('/products/index', [ProductsController::class, 'index'])
->name('products.index');
// 本番環境は商品IDを指定する
Route::get('/products/show/{item_id}',[ProductsController::class,'show'])
->name('products.show');
// 商品をカートに保存する
Route::post('/products/show/{item_id}',[ProductsController::class,'store'])
->name('products.store');
// カートにある商品の個数を増やす
Route::patch('/products/show/{item_id}',[ProductsController::class,'update'])
->name('products.update');

// Route::get('/products/show',[ProductsController::class,'show']); //テスト用

// Route::get('/products/show',[ProductsController::class,'show']); //テスト用

// Route::get('/admin/dashboard',action: function(){
//     return view('admin.dashboard');
// })->name('admin.dashboard');

Route::get('/contact/index', function () {
    return view('contact.index');
});

// お問い合わせフォームを表示（GET）
Route::get('/contact/index', [InquiryController::class, 'index'])->name('inquiry.form');
Route::post('/contact/index', [InquiryController::class, 'store'])->name('inquiry.store');

Route::post('/reviews/store/{item_id}', [ReviewController::class, 'store'])->name('reviews.store');

//ユーザーのコラム表示
Route::get('/columns/index', [ColumnController::class, 'index'])
->name('columns.index');
Route::get('/columns/show/{id}', [ColumnController::class, 'show'])
->name('columns.show');

Route::get('/products/show',function(){
    return view('products.show');
});

//ジャンルごとのページへ
Route::get('/search/results/category/{idName}',[ProductsController::class,'category'])
->name('search.results.category');

//検索結果ページ search/resultsをURLで直接入力したとき用
// Route::get('/search/results',[ProductsController::class,'search'])
// ->name('search.results');
Route::get('/serch/results',function(){
    return view('search.results');
});

//検索結果ページ
Route::post('/search/results',[ProductsController::class,'search'])
->name('search.results');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
