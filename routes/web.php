<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
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

Route::get('/', function () {
    return view('index');
});

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
    });
});


