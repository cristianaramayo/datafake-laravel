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

Route::post('/attach', [DatasetController::class, 'attach'])
    ->name('attach')
    ->middleware('auth:sanctum');
//Route::get('/show', [DatasetController::class, 'show'])->name('show');

//Route::resource('datas', App\Http\Controllers\DatasetController::class)
//    ->middleware('auth:sanctum');


