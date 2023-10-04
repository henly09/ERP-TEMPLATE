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


    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF'])->name('pdfgen1');; // PDF Generator 1

    Route::get('/customer/index', [App\Http\Controllers\CustomersController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [App\Http\Controllers\CustomersController::class, 'create'])->name('customer.create');
    Route::get('/customer/read', [App\Http\Controllers\CustomersController::class, 'read'])->name('customer.read');
    Route::get('/customer/delete', [App\Http\Controllers\CustomersController::class, 'delete'])->name('customer.delete');
    Route::get('/customer/update', [App\Http\Controllers\CustomersController::class, 'update'])->name('customer.update');

    Route::get('/vouchreq/index', [App\Http\Controllers\VouchReqController::class, 'index'])->name('vouchreq.index');
    Route::get('/vouchreq/create', [App\Http\Controllers\VouchReqController::class, 'create'])->name('vouchreq.create');
    Route::get('/vouchreq/read', [App\Http\Controllers\VouchReqController::class, 'read'])->name('vouchreq.read');
    Route::get('/vouchreq/delete', [App\Http\Controllers\VouchReqController::class, 'delete'])->name('vouchreq.delete');
    Route::get('/vouchreq/update', [App\Http\Controllers\VouchReqController::class, 'update'])->name('vouchreq.update');

    Route::get('/disbursement/index', [App\Http\Controllers\DisbursementController::class, 'index'])->name('disbursement.index');
    Route::get('/disbursement/create', [App\Http\Controllers\DisbursementController::class, 'create'])->name('disbursement.create');
    Route::get('/disbursement/read', [App\Http\Controllers\DisbursementController::class, 'read'])->name('disbursement.read');
    Route::get('/disbursement/delete', [App\Http\Controllers\DisbursementController::class, 'delete'])->name('disbursement.delete');
    Route::get('/disbursement/update', [App\Http\Controllers\DisbursementController::class, 'update'])->name('disbursement.update');

    
});


require __DIR__.'/auth.php';
