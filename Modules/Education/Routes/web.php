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

Route::prefix('education')->middleware(['mustAuth','isExpert'])->group(function() {
    Route::get('/terms', [\Modules\Education\Http\Controllers\TermController::class,'index'])->name('terms');
    Route::get('/terms/create', [\Modules\Education\Http\Controllers\TermController::class,'create'])->name('term.create');
    Route::post('/terms/store', [\Modules\Education\Http\Controllers\TermController::class,'store'])->name('term.store');
    Route::get('/terms/edit/{term}', [\Modules\Education\Http\Controllers\TermController::class,'edit'])->name('term.edit');
    Route::patch('/terms/{term}/update', [\Modules\Education\Http\Controllers\TermController::class,'update'])->name('term.update');
    Route::delete('/terms/destroy/{term}', [\Modules\Education\Http\Controllers\TermController::class,'destroy'])->name('term.destroy');

    Route::get('/courses', [\Modules\Education\Http\Controllers\CourseController::class,'index'])->name('courses');
    Route::get('/courses/create', [\Modules\Education\Http\Controllers\CourseController::class,'create'])->name('course.create');
    Route::post('/courses/store', [\Modules\Education\Http\Controllers\CourseController::class,'store'])->name('course.store');
    Route::get('/courses/edit/{course}', [\Modules\Education\Http\Controllers\CourseController::class,'edit'])->name('course.edit');
    Route::patch('/courses/{course}/store', [\Modules\Education\Http\Controllers\CourseController::class,'update'])->name('course.update');
    Route::delete('/courses/destroy/{course}', [\Modules\Education\Http\Controllers\CourseController::class,'destroy'])->name('course.destroy');

    Route::get('/term/{term}/courses', [\Modules\Education\Http\Controllers\TermCoursesController::class,'index'])->name('term.courses');
    Route::post('/term/{term}/courses/sync', [\Modules\Education\Http\Controllers\TermCoursesController::class,'sync'])->name('term.courses.sync');

});
Route::prefix('dashboard')->middleware('mustAuth')->group(function() {
    Route::get('/', [\Modules\Education\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
    Route::get('/take-course', [\Modules\Education\Http\Controllers\TakeCourseController::class,'index'])->name('take-course');
    Route::post('/take-course/sync/{term}', [\Modules\Education\Http\Controllers\TakeCourseController::class,'sync'])->name('take-course.sync');
    Route::get('/token-courses', [\Modules\Education\Http\Controllers\TakeCourseController::class,'tokenCourses'])->name('token-courses');
});

