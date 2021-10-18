<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->middleware('auth')->group(function(){

    Route::get('/',[AdminController::class,'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('posts',PostController::class);


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
