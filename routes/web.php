<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


    Route::get('/systemUsers/index', [App\Http\Controllers\SystemsUserController::class, 'index'])->name('systemUsers.index');
    Route::get('/systemUsers/create', [App\Http\Controllers\SystemsUserController::class, 'create'])->name('systemUsers.create');
    Route::post('/systemUsers/createSave', [App\Http\Controllers\SystemsUserController::class, 'createSave'])->name('systemUsers.createSave');
    Route::patch('/systemUsers/Admin/{id}', [App\Http\Controllers\SystemsUserController::class, 'Admin'])->name('systemUsers.Admin');
    Route::patch('/systemUsers/UnAdmin/{id}', [App\Http\Controllers\SystemsUserController::class, 'UnAdmin'])->name('systemUsers.UnAdmin');
    Route::patch('/systemUsers/Verified/{id}', [App\Http\Controllers\SystemsUserController::class, 'Verified'])->name('systemUsers.Verified');
    Route::patch('/systemUsers/UnVerified/{id}', [App\Http\Controllers\SystemsUserController::class, 'UnVerified'])->name('systemUsers.UnVerified');
    Route::delete('/systemUsers/delete/{id}', [App\Http\Controllers\SystemsUserController::class, 'delete'])->name('systemUsers.delete');
    Route::get('/systemUsers/search', [App\Http\Controllers\SystemsUserController::class, 'search'])->name('systemUsers.search');

    Route::get('/customer/index', [App\Http\Controllers\CustomersController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [App\Http\Controllers\CustomersController::class, 'create'])->name('customer.create'); // create page
    Route::post('/customer/createSave', [App\Http\Controllers\CustomersController::class, 'createSave'])->name('customer.createSave'); // save function from create customers
    Route::delete('/customer/delete/{id}', [App\Http\Controllers\CustomersController::class, 'delete'])->name('customer.delete'); // delete function in customers
    Route::get('/customer/update/{id}', [App\Http\Controllers\CustomersController::class, 'update'])->name('customer.update'); // update page
    Route::patch('/customer/saveEdit/{id}', [App\Http\Controllers\CustomersController::class, 'saveEdit'])->name('customer.saveEdit'); // save function from edit customers
    Route::get('/customer/search', [App\Http\Controllers\CustomersController::class, 'search'])->name('customer.search');

    Route::get('/vouchreq/index', [App\Http\Controllers\VouchReqController::class, 'index'])->name('vouchreq.index');
    Route::get('/vouchreq/create/{id?}', [App\Http\Controllers\VouchReqController::class, 'create'])->name('vouchreq.create');
    Route::post('/vouchreq/createSave', [App\Http\Controllers\VouchReqController::class, 'createSave'])->name('vouchreq.createSave'); // save function from create vouuchreq
    Route::delete('/vouchreq/delete/{id}', [App\Http\Controllers\VouchReqController::class, 'delete'])->name('vouchreq.delete'); // delete function in vouuchreq
    Route::get('/vouchreq/update/{id}', [App\Http\Controllers\VouchReqController::class, 'update'])->name('vouchreq.update'); // update page 
    Route::patch('/customer/saveEdit/{id}', [App\Http\Controllers\VouchReqController::class, 'saveEdit'])->name('vouchreq.saveEdit'); // save function from edit vouuchreq
    Route::get('/vouchreq/search', [App\Http\Controllers\VouchReqController::class, 'search'])->name('vouchreq.search');
    Route::get('/generate-pdf/{id}', [App\Http\Controllers\PDFController::class, 'generatePDFVoucherRequest'])->name('vouchreq.GenPDF'); // PDF Generator 1
    Route::get('/laraview-pdf/{id}', [App\Http\Controllers\PDFController::class, 'genLaraview'])->name('vouchreq.Laraview'); // PDF Laraview

    Route::get('/disbursement/index', [App\Http\Controllers\DisbursementController::class, 'index'])->name('disbursement.index');
    Route::get('/disbursement/create', [App\Http\Controllers\DisbursementController::class, 'create'])->name('disbursement.create');
    Route::get('/disbursement/read', [App\Http\Controllers\DisbursementController::class, 'read'])->name('disbursement.read');
    Route::get('/disbursement/delete', [App\Http\Controllers\DisbursementController::class, 'delete'])->name('disbursement.delete');
    Route::get('/disbursement/update', [App\Http\Controllers\DisbursementController::class, 'update'])->name('disbursement.update');

});


require __DIR__.'/auth.php';
