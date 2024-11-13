<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;


Route::get('/',[StudentsController::class,'index'])->name('students.index'); 

Route::get('/create',[StudentsController::class,'create'])->name('students.create');

Route::post('/store',[StudentsController::class,'store'])->name('students.store');

Route::get('/{id}',[StudentsController::class,'show'])->name('students.show');

Route::get('/{id}/edit',[StudentsController::class,'edit'])->name('students.edit');

Route::put('/{id}',[StudentsController::class,'update'])->name('students.update');

Route::delete('/{id}',[StudentsController::class,'destroy'])->name('students.destroy');