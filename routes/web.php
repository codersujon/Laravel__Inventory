<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;

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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

/**
 * Admin Controllers
 */

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/profile', 'index')->name('admin.profile'); 
    Route::get('/admin/profile/edit', 'edit')->name('edit.profile'); 
    Route::post('/admin/profile/update', 'update')->name('update.profile'); 
    Route::get('/change/password', 'changePassword')->name('change.password'); 
    Route::post('/update/password', 'updatePassword')->name('update.password'); 
});

/**
 * Suppliers Controller
 */

Route::controller(SupplierController::class)->group(function(){
    Route::get('/supplier/all', 'index')->name('supplier.all'); 
    Route::post('/supplier/add', 'store')->name('supplier.add');
    Route::get('/supplier/show/{id}', 'show')->name('supplier.show'); 
    Route::post('/supplier/update/{id}', 'update')->name('supplier.update');
    Route::get('/supplier/destroy/{id}', 'destroy')->name('supplier.destroy'); 
});

/**
 * Customers Controller
 */

Route::controller(CustomerController::class)->group(function(){
    Route::get('/customer/all', 'index')->name('customer.all'); 
    Route::post('/customer/add', 'store')->name('customer.add');
    Route::post('/customer/update/{id}', 'update')->name('customer.update');
    Route::get('/customer/destroy/{id}', 'destroy')->name('customer.destroy'); 
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
