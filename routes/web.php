<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VerificationController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/chart', [DashboardController::class, 'chart']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware('auth', 'ensureTime')->group(function () {
//     Route::controller(ItemController::class)->prefix('item')->middleware('role:admin|toko-1')->group(function () {
//         Route::get('', 'index')->name('item.index');
//         Route::get('create', 'create')->name('item.create');
//         Route::post('store', 'store')->name('item.store');
//         Route::get('edit/{id}', 'edit')->name('item.edit');
//         Route::put('update/{id}', 'update')->name('item.update');
//         Route::get('delete/{id}', 'destroy')->name('item.destroy');
//     });
//     Route::resource('first-shop', FirstShopController::class);
//     Route::resource('second-shop', SecondShopController::class);
//     Route::resource('warehouse', WarehouseController::class);
//     Route::controller(OrderController::class)->prefix('order')->group(function () {
//         Route::get('', 'index')->name('order.index');
//         Route::post('store', 'store')->name('order.store');
//         Route::get('delete/{id}', 'destroy')->name('order.destroy');
//     });
// });

Route::middleware('auth', 'role:admin')->group(function () {
    // Employee
    Route::controller(EmployeeController::class)->prefix('employee')->group(function () {
        Route::get('', 'index')->name('employee.index');
        Route::get('create', 'create')->name('employee.create');
        Route::post('store', 'store')->name('employee.store');
        Route::get('show/{id}', 'show')->name('employee.show');
        Route::get('edit/{id}', 'edit')->name('employee.edit');
        Route::put('update/{id}', 'update')->name('employee.update');
        Route::get('delete/{id}', 'destroy')->name('employee.destroy');
    });
    // Fuel
    Route::controller(FuelController::class)->prefix('fuel')->group(function () {
        Route::get('', 'index')->name('fuel.index');
        Route::get('create', 'create')->name('fuel.create');
        Route::post('store', 'store')->name('fuel.store');
        Route::get('show/{id}', 'show')->name('fuel.show');
        Route::get('edit/{id}', 'edit')->name('fuel.edit');
        Route::put('update/{id}', 'update')->name('fuel.update');
        Route::get('delete/{id}', 'destroy')->name('fuel.destroy');
    });
    // Service
    Route::controller(ServiceController::class)->prefix('service')->group(function () {
        Route::get('', 'index')->name('service.index');
        Route::get('create', 'create')->name('service.create');
        Route::post('store', 'store')->name('service.store');
        Route::get('show/{id}', 'show')->name('service.show');
        Route::get('edit/{id}', 'edit')->name('service.edit');
        Route::put('update/{id}', 'update')->name('service.update');
        Route::get('delete/{id}', 'destroy')->name('service.destroy');
    });
    // Transaction
    Route::controller(TransactionController::class)->prefix('transaction')->group(function () {
        Route::get('', 'index')->name('transaction.index');
        Route::get('create', 'create')->name('transaction.create');
        Route::post('store', 'store')->name('transaction.store');
        Route::get('show/{id}', 'show')->name('transaction.show');
        Route::get('edit/{id}', 'edit')->name('transaction.edit');
        Route::put('update/{id}', 'update')->name('transaction.update');
        Route::get('delete/{id}', 'destroy')->name('transaction.destroy');
    });
    // Vehicle
    Route::controller(VehicleController::class)->prefix('vehicle')->group(function () {
        Route::get('', 'index')->name('vehicle.index');
        Route::get('create', 'create')->name('vehicle.create');
        Route::post('store', 'store')->name('vehicle.store');
        Route::get('show/{id}', 'show')->name('vehicle.show');
        Route::get('edit/{id}', 'edit')->name('vehicle.edit');
        Route::put('update/{id}', 'update')->name('vehicle.update');
        Route::get('delete/{id}', 'destroy')->name('vehicle.destroy');
    });
});
Route::middleware('auth', 'role:user')->group(function () {
    // verification
    Route::controller(VerificationController::class)->prefix('verification')->group(function () {
        Route::get('low', 'verificationLow')->name('verification.low');
        Route::get('high', 'verificationHigh')->name('verification.high');
        Route::put('updateLow/{id}', 'updateLow')->name('verification.updateLow');
        Route::put('updateHigh/{id}', 'updateHigh')->name('verification.updateHigh');
    });
});
require __DIR__ . '/auth.php';
