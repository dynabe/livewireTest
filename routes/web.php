<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\PusherController::class, 'home'])->name('home');
Route::get('/notifications', [App\Http\Controllers\HomeController::class, 'notifications'])->name('notifications');
Route::get('/crud', [App\Http\Controllers\HomeController::class, 'crud'])->name('crud');
Route::get('/chat', [App\Http\Controllers\HomeController::class, 'chat'])->name('chat');

Route::post('/submitForm', [App\Http\Controllers\HomeController::class, 'submitForm'])->name('submitForm');



