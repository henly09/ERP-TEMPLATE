<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');

    Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

    Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

    Route::get('/services', [App\Http\Controllers\ServicesController::class, 'index'])->name('services');
    
});


require __DIR__.'/auth.php';
