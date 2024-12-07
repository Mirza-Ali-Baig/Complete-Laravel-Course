<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/',[StudentController::class,'index'])->name("home");
Route::post('/store',[StudentController::class,'store'])->name("store");

Route::get('/student',[StudentController::class,'showStudentForm'])->name("student");
Route::post('/student',[StudentController::class,'storeStudentForm'])->name("student.store");
