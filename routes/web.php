<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



Route::get('/',([StudentController::class,'index']))
       ->name('students.index');
Route::get('/student/create',([StudentController::class,'create']))
->name('students.create');
Route::post('/student/create',([StudentController::class,'store']))
->name('students.store');

Route::get('/student/edit/{id}',([StudentController::class,'edit']))
->name('students.edit');
Route::put('/student/edit{id}',([StudentController::class,'update']))
->name('students.update');

Route::get('/student/destroy/{id}',([StudentController::class,'destroy']))
->name('students.destroy');
