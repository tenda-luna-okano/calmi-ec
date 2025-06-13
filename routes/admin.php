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
use App\Http\Controllers\AdminCouponController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\AdminColumnController;
use App\Http\Controllers\ColumnController;

//admin用ルーティング
//prefixのなかに入れるとurlに勝手に/adminがつきます
//ログインしてない用
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function() {
        Route::get('/login', [AdminloginController::class, 'create'])
        ->name('login');
        Route::post('/login', [AdminloginController::class, 'store']);



    });
    //ログインしてる用
   Route::middleware('auth:admin')->group(function() {
        Route::get('/dashboard', function() {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/coupons/index',function() {
            return view('admin.coupons.index');
        })->name('coupons.index');

        Route::get('/products/insert',function(){
            return view('products.insert');
        });

        Route::get('/coupons/index', [CouponController::class, 'index'])
        ->name('coupons.index');

        // 編集フォームを表示（GET）
        Route::get('/coupons/edit/{id}', [CouponController::class, 'edit'])
        ->name('coupons.edit');

        Route::get('/sales/index', [AdminSalesController::class, 'index'])
        ->name('sales.index');

        // 更新処理（PUT or POST）
        Route::post('/coupons/update/{id}', [CouponController::class, 'update'])
        ->name('coupons.update');

        Route::get('/columns/create',function(){
            return view('columns.create');
        });
        Route::post('/columns/create', [AdminColumnController::class, 'store'])
        ->name('columns.post');

        // 編集フォーム表示
        Route::get('/products/edit/{id}', [AdminProductController::class, 'edit'])
        ->name('products.edit');


        Route::post('/products/insert',[AdminProductController::class, 'store'])
        ->name('products.insert');
        Route::get('/products/index', [AdminProductController::class, 'index'])
        ->name('products.index');
        Route::post('/products/update/{id}', [AdminProductController::class, 'update'])->name('products.update');

        Route::get('/coupons/issue', [AdminCouponController::class, 'issue'])
        ->name('coupons.issue'); // フォーム表示
        Route::post('/coupons/issue', [AdminCouponController::class, 'store'])
        ->name('coupons.store'); // 登録処理

        Route::get('/coupons/update',function() {
            return view('coupons.update');
        });

        Route::get('/sales/index', function() {
            return view('sales.index');
        })->name('sales.index');




        Route::get('/products/index', [AdminProductController::class, 'index']);

    });
});
