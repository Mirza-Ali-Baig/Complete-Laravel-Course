<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/',[EmployeeController::class,'index'])->name("employees.home");
Route::get('/create',[EmployeeController::class,'create'])->name("employees.create");
Route::post('/store',[EmployeeController::class,'store'])->name("employees.store");
Route::get('/edit/{id}',[EmployeeController::class,'edit'])->name("employees.edit");
Route::put('/update/{id}',[EmployeeController::class,'update'])->name("employees.update");
Route::get('/delete/{id}',[EmployeeController::class,'delete'])->name("employees.delete");

