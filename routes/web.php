<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\DistanceController;

Route::get('/', function () {
        return view('welcome');
});

Route::resource('users', UserController::class);

Route::get('/users-export', [UserController::class, 'export'])
        ->name('users.export');


// audio upload routes
Route::get('/audio', [AudioController::class, 'index']);
Route::post('/audio', [AudioController::class, 'calculate'])
        ->name('audio.calculate');


// distance calculation routes

Route::get('/distance', [DistanceController::class, 'index']);
Route::post('/distance', [DistanceController::class, 'calculate'])
        ->name('distance.calculate');
