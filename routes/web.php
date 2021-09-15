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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::post('/store', [DatasetController::class, 'store'])
    ->name('store');
Route::get('/create', [DatasetController::class, 'create'])
    ->name('create')
    ->middleware('auth:sanctum');

/*
Route::resource('datasets', App\Http\Controllers\DatasetController::class)
    ->middleware('auth:sanctum');
*/

