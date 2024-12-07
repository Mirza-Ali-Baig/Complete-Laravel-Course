<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\AuthRoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/blogs', 'blogs')->name('blogs');
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

Route::post('/login', [AuthController::class,'login'])->name('login');
Route::post('/register', [AuthController::class,'register'])->name('register');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');








Route::view('/test', 'test')->name('test')->middleware(AuthMiddleware::class);

Route::prefix('admin')->middleware([AuthMiddleware::class,AuthRoleMiddleware::class])->group(function () {
    Route::view('/home', 'admin.dashboard')->name('admin.home');
    Route::view('/posts', 'admin.posts')->name('admin.posts');

    Route::post('/logout', [AuthController::class,'logout'])->name('admin.logout');

});
