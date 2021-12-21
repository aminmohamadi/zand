<?php
use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->group(function() {
    Route::post('/login',[\Modules\AAA\Http\Controllers\AuthController::class,'login'])->name('login');
    Route::get('/login', [\Modules\AAA\Http\Controllers\AuthController::class,'index'])->name('login.form');
    Route::post('/logout',[\Modules\AAA\Http\Controllers\AuthController::class,'logout'])->name('logout');
    Route::get('/newExpert',function (){
       $expert = \Modules\AAA\Entities\Expert::create([
          'first_name'=>'admin',
          'last_name'=>'admin',
          'phone'=>'09172156125',
          'personality_id'=>'123456789',
          'password'=>\Illuminate\Support\Facades\Hash::make('123456789'),
           'status'=>1,
           'gender'=>1,
       ]);
       echo 'expert created';
       return back();
    });
});

