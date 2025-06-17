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


Route::get('/', function () {
    return view('top');

});

//Route::get('/',[OrderController::class,'confirm']);

// Route::get('', function(){
//     return view('search.results');

// });

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

Route::get('/products/show',[ProductsController::class,'show']); //テスト用

Route::get('/products/show',[ProductsController::class,'show']); //テスト用

Route::get('/cart', [CartController::class, 'index'])
->name('cart');

Route::get('/admin/dashboard',function(){
    return view('admin.dashboard');
})->name('admin.dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


Route::get('/orders/payment', function(){
    return view('orders.payment');
})->name('orders.payment');

Route::get('/mypage/withdraw_confirm',function(){
    return view('mypage.withdraw_confirm');
});


Route::get('/mypage/withdraw',function(){
    return view('mypage.withdraw');
})->name('mypage.withdraw');

Route::get('/mypage/withdraw_confirm', [WithdrawController::class, 'confirm'])->name('mypage.withdraw_confirm');


// 実行（退会処理）
// Route::post('/mypage/withdraw', [WithdrawController::class, 'withdraw'])->name('mypage.withdraw');

// Route::get('/admin/coupons/issue', [AdminCouponController::class, 'issue'])->name('admin.coupons.issue'); // フォーム表示
// Route::post('/admin/coupons/issue', [AdminCouponController::class, 'store'])->name('admin.coupons.store'); // 登録処理

// Route::get('/admin/coupons/update',function() {
//     return view('admin.coupons.update');
// });


// Route::get('/admin/sales/index', function() {
//     return view('admin.sales.index');
// })->name('admin.sales.index');





// Route::get('/admin/products/index', [AdminProductController::class, 'index']);


// Route::get('/admin/products/index', function(){
//     return view ('admin.products.index');
// })->name('admin.products.index');



//Route::get('/admin/auth/login',[AdminloginController::class,'create'])
//->name('admin.login');

//Route::post('/admin/auth/login',[AdminloginController::class, 'store']);

//Route::post('logout', [AdminloginController::class, 'destroy'])->name('admin.auth.logout');


// 編集フォーム表示
// Route::get('/admin/products/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.products.edit');

// Route::get('/admin/auth/login',function(){
//     return view('admin.auth.login');
// });


//admin用ルーティング
//prefixのなかに入れるとurlに勝手に/adminがつきます
//ログインしてない用
// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::middleware('guest:admin')->group(function() {
//         Route::get('/login', [AdminloginController::class, 'create'])
//         ->name('login');
//         Route::post('/login', [AdminloginController::class, 'store']);
//     });
//     //ログインしてる用
//    Route::middleware('auth:admin')->group(function() {
//         Route::get('/dashboard', function() {
//             return view('admin.dashboard');
//         })->name('dashboard');
//     });
// });



// Route::get('/admin/coupons/index',function() {
//     return view('admin.coupons.index');
// })->name('admin.coupons.index');


// Route::get('/admin/products/insert',function(){
//     return view('admin.products.insert');
// });



Route::get('/contact/index', function () {
    return view('contact.index');
});

// レビュー投稿のビュー
Route::get('/reviews/index/{item_id}', [
  ReviewController::class,'index'])
->name('reviews.index');


Route::get('/mypage/index', function () {
    return view('mypage.index');
});
// マイページの購入履歴詳細画面
Route::get('/mypage/purchase_history_detail', [MyPageController::class,'history_detail']);
Route::post('/mypage/purchase_history_detail', [MyPageController::class,'history_detail']);


// お問い合わせフォームを表示（GET）
Route::get('/contact/index', [InquiryController::class, 'index'])->name('inquiry.form');
Route::post('/contact/index', [InquiryController::class, 'store'])->name('inquiry.store');

Route::get('/mypage/index',[MypageController::class, 'index'])->name('mypage.index');;



Route::get('/mypage/purchase_history_detail', function(){
    return view('mypage.purchase_history_detail');
});


// Route::get('/orders/payment',function(){
//     return view('orders.payment');
// })->name('orders.payment');

// Route::get('/orders/confirm',function(){
//     return view('orders.confirm');
// })->name('orders.confirm');;

// 購入確認画面
Route::get('/orders/confirm',[OrderController::class,'confirm'])
->name('orders.confirm');

// ユーザー情報変更

//Route::get('/mypage/edit_user',[MyPageController::class,'edit_user']);comp

Route::get('/mypage/edit_user',[EditUserController::class,'show'])
->name('edit_user.show');

Route::put('/mypage/edit_user',[EditUserController::class,'update'])
->name('edit_user.update');



// 購入履歴
Route::get('/mypage/history',[MyPageController::class,'history']);

/* もう一つのController経由のsubscription.indexが正しい
//定期便詳細ページへ
Route::get('/subscription/index',function(){
    return view('subscription/index');
})->name('subscription.index');
*/

//ジャンルごとのページへ(検索結果ページを後で作成して調整する)
// Route::get('/search/results/{id}',function(){
//     return view('search/results');
// })->name('search.results');


Route::post('/reviews/store/{item_id}', [ReviewController::class, 'store'])->name('reviews.store');

// Route::get('/admin/coupons/index', [CouponController::class, 'index'])->name('admin.coupons.index');

// // 編集フォームを表示（GET）
// Route::get('/admin/coupons/edit/{id}', [CouponController::class, 'edit'])->name('admin.coupons.edit');

// Route::get('/admin/sales/index', [AdminSalesController::class, 'index'])->name('admin.sales.index');

//検索結果
// Route::post('/search/results',[ProductsController::class,'search'])->name('search.results');

//決済方法の取得
Route::post('/orders/complete',[OrderController::class,'payment'])->name('orders.complete');

//定期便変更画面へ
Route::get('/subscription/edit',[SubscriptionController::class,'edit'])->name('subscription.edit');

//定期便更新
Route::post('/subscription/update',[SubscriptionController::class,'update'])->name('subscription.update');

//定期便削除
Route::get('/subscription/destroy',[SubscriptionController::class,'destroy'])->name('subscription.destroy');


// // 更新処理（PUT or POST）
// Route::post('/admin/coupons/update/{id}', [CouponController::class, 'update'])->name('admin.coupons.update');

// Route::get('/admin/columns/create',function(){
//     return view('admin.columns.create');
// });
// Route::post('/admin/columns/create', [AdminColumnController::class, 'store'])->name('admin.columns.post');

//ユーザーのコラム表示
Route::get('/columns/index', [ColumnController::class, 'index'])
->name('columns.index');
Route::get('/columns/show/{id}', [ColumnController::class, 'show'])
->name('columns.show');

Route::get('/mypage/history',[MyPageController::class,'history']);

Route::get('/products/show',function(){
    return view('products.show');
});

// Route::post('/admin/products/insert',[AdminProductController::class, 'store'])->name('admin.products.insert');
// Route::get('/admin/products/index', [AdminProductController::class, 'index'])->name('admin.products.index');
// Route::post('/admin/products/update/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');





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
Route::get('/search/results',[ProductsController::class,'search'])
->name('search.results');




//決済方法の取得
// Route::post('/orders/complete',[OrderController::class,'payment'])->name('orders.complete');


//決済方法の取得
Route::post('/subscription/complete',[SubscriptionController::class,'payment'])->name('subscription.complete');



// 購入確認画面
Route::post('/subscription/confirm',[SubscriptionController::class,'confirm'])
->name('subscription.confirm');

Route::post('/subscription/payment', [SubscriptionController::class,'pre_payment'])
->name('subscription.payment');

/*
Route::get('/subscription/confirm', function () {
    return view('subscription.confirm');
});*/