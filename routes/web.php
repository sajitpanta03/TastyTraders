<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DiscountController as AdminDiscountController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Dashbord page
Route::get('/', [DashbordController::class, 'index'])->name('dashbord')->middleware('check.login');
Route::get('/guest', [DashbordController::class, 'show'])->name('guest');

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Discount set
Route::get('/product/{id}', [ProductController::class, 'show']);

// Product page
Route::get('productPage/{id}', [ProductPageController::class, 'index'])->name('productPage');

// Cart page
Route::get('cart', [CartController::class, 'show'])->middleware('checkuserlogin');

// Order page
// Route::post('/confirm-order', OrderController::class, 'confirmOrder')->name('confirm.order');
Route::post('/confirm-order', [OrderController::class, 'store']);


// User Login page
Route::view('/login', 'auth.login');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashbord Route
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    // Admin Login Route
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashbord', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

        // Category Routes
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // User Route
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('users/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        // Product Route
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::get('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

        // Discount Route
        Route::get('/discounts', [AdminDiscountController::class, 'index'])->name('discounts.index');
        Route::get('/discounts/create', [AdminDiscountController::class, 'create'])->name('discounts.create');
        Route::post('/discounts/store', [AdminDiscountController::class, 'store'])->name('discounts.store');
        Route::get('/discounts/edit/{id}', [AdminDiscountController::class, 'edit'])->name('discounts.edit');
        Route::post('/discounts/update/{id}', [AdminDiscountController::class, 'update'])->name('discounts.update');
        Route::get('/discounts/destroy/{id}', [AdminDiscountController::class, 'destroy'])->name('discounts.destroy');

        // Order Route
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');    
    });
});
