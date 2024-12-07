<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');
    Route::get('/create', 'create')->name('users.create');
    Route::post('/store', 'store')->name('users.store');
    Route::get('/show/{id}', 'show')->name('users.show');
    Route::get('/edit/{id}', 'edit')->name('users.edit');
    Route::put('/update/{id}', 'update')->name('users.update');
    Route::get('/delete/{id}', 'destroy')->name('users.destroy');
});
