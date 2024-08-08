<?php

use App\Http\Controllers\RouteController;
use App\Http\Controllers\TailwickController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ImportExportOrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupervisorController;

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

Route::get('index/{locale}', [TailwickController::class, 'lang']);

// Route::get('home',function(){
// return view('home');
// });

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // Route::get("/", [RouteController::class, 'index'])->name('dashboard');
    Route::get("/", [HomeController::class, 'index'])->name('dashboard');


    // User
    Route::resource('users', UserController::class);
    // Client
    Route::resource('clients', ClientController::class);
    // Employee
    Route::resource('employees',EmployeeController::class);
    // Permission
    Route::resource('permissions', PermissionController::class)->except('show');
    //Role
    Route::resource('roles', RoleController::class);
    // Warehouse
    Route::resource('warehouses', WarehouseController::class);
    // Supervisor
    Route::get('supervisor/index', [SupervisorController::class, 'index'])->name('supervisor.index');
    Route::post('supervisor/update-status', [SupervisorController::class, 'updateStatus'])->name('supervisor.update-status');

    // Order
    Route::resource('orders', OrderController::class);
    Route::post('/orders/update-warehouse', [OrderController::class, 'updateWarehouse'])->name('orders.updateWarehouse');
    Route::get('/orders/{id}/invoice', [OrderController::class, 'invoice'])->name('orders.invoice');


    // Import or Export Orders
    Route::middleware('can:order import_file')
        ->get('order_import', [ImportExportOrderController::class, 'show'])->name('orders.import');
    Route::middleware('can:order import_file')
        ->post('order_import_store', [ImportExportOrderController::class, 'store'])->name('orders.import.store');
        // download sample
        // routes/web.php
Route::get('sample-format', [ ImportExportOrderController::class, 'downloadSample'])->name('sample.format.download');


    // Route::get("{any}", [RouteController::class, 'routes']);
});
