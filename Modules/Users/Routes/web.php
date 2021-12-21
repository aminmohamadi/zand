<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::prefix('students')->middleware(['mustAuth','isExpert'])->group(function() {
    Route::get('/', [\Modules\Users\Http\Controllers\StudentsController::class,'index'])->name('students');
    Route::get('/create', [\Modules\Users\Http\Controllers\StudentsController::class, 'create'])->name('student.create');
    Route::post('/store', [\Modules\Users\Http\Controllers\StudentsController::class, 'store'])->name('student.store');
    Route::get('/{student}/edit', [\Modules\Users\Http\Controllers\StudentsController::class, 'edit'])->name('student.edit');
    Route::patch('/{student}/update', [\Modules\Users\Http\Controllers\StudentsController::class, 'update'])->name('student.update');
    Route::delete('/{student}/destroy', [\Modules\Users\Http\Controllers\StudentsController::class, 'destroy'])->name('student.destroy');
});
