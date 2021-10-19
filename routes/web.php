<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\pagesController;





Route::prefix('admin')->middleware('auth','check_user')->group(function(){

    Route::get('/',[AdminController::class,'index'])->name('dashboard')->middleware('check_admin');
    Route::resource('categories', CategoryController::class);
    Route::resource('posts',PostController::class);

});

Route::get('/',[pagesController::class,'index'])->name('index');
Route::get('/about',[pagesController::class,'about'])->name('about');
Route::get('/contact',[pagesController::class,'contact'])->name('contact');
Route::post('/contact',[pagesController::class,'contactSubmit'])->name('contact');
Route::get('/blog/{slug}',[pagesController::class,'single'])->name('blog.single');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
