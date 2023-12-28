<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ColorProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('not.admin')->group(function () {
    Route::get('/', [HomeController::class,'index']);
    Route::prefix('products')->group(function () {
        Route::get('/',[ProductController::class,'index']);
        Route::get('/id={id}',[ProductController::class,'details']);

    });
    
});
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'registerView']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout']);
});
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::prefix('products')->group(function () {
        Route::post('/', [ProductController::class, 'add']);
        Route::put('/', [ProductController::class, 'update']);
        Route::get('/', [ProductController::class, 'indexAdmin']);
    });
    Route::prefix('categories')->group(function () {
        Route::post('/', [CategoryController::class, 'add']);
        Route::put('/', [CategoryController::class, 'update']);
        Route::delete('/', [CategoryController::class, 'delete']);
    });
    Route::prefix('colors')->group(function () {
        Route::post('/', [ColorController::class, 'add']);
        Route::put('/', [ColorController::class, 'update']);
        Route::delete('/', [ColorController::class, 'delete']);
    });
    Route::prefix('colors-products')->group(function () {
        Route::post('/', [ColorProductController::class, 'add']);
        Route::delete('/', [ColorProductController::class, 'delete']);
    });
    Route::prefix('images-products')->group(function () {
        Route::post('/', [ImageProductController::class, 'add']);
        Route::delete('/', [ImageProductController::class, 'delete']);
    });
});

Route::prefix('error')->group(function () {
    Route::get('/403', function () {
        return view('errors.page403');
    });
});
