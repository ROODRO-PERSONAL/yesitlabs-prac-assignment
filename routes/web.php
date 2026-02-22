<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AudioController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);

Route::get('/users-export', [UserController::class,'export'])
        ->name('users.export');


// audio upload routes
Route::get('/audio', [AudioController::class,'index']);
Route::post('/audio', [AudioController::class,'calculate'])
        ->name('audio.calculate');