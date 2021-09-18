<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\DatasetController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('dashboard', [App\Http\Controllers\PageController::class, 'dashboard'])
    ->middleware('auth:sanctum')
    ->name('dashboard');

Route::post('/datasets/store', [DatasetController::class, 'store'])
    ->name('store')
    ->middleware('auth:sanctum');
Route::post('/datasets/create', [DatasetController::class, 'create'])
    ->name('create')
    ->middleware('auth:sanctum');

/*
Route::resource('datasets', App\Http\Controllers\DatasetController::class)
    ->middleware('auth:sanctum');
*/

