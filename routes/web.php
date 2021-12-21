<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function(){
    \Insenseanalytics\NovaServerMonitor\NovaServerMonitor::make()
        ->onConnection('server_monitor')->hosts(['example1.com'])
        ->checks(['mysql']);
})->name('/');


Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');
