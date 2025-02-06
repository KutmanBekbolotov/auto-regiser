<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

Route::get('/', [VehicleController::class, 'index'])->name('vehicle.index');

Route::get('/vehicle/register', [VehicleController::class, 'showForm'])->name('vehicle.register');
Route::post('/vehicle/register', [VehicleController::class, 'register'])->name('vehicle.store');

Route::get('/vehicle/re-register', [VehicleController::class, 'reRegister'])->name('vehicle.re-register');
Route::post('/vehicle/re-register', [VehicleController::class, 'reRegister'])->name('vehicle.re-register.store');

Route::get('/vehicle/re-register/success', [VehicleController::class, 'reRegisterSuccess'])->name('vehicle.re-register.success');

Route::get('/vehicle/history/form', [VehicleController::class, 'viewHistoryForm'])->name('vehicle.history.form');
Route::post('/vehicle/history', [VehicleController::class, 'viewHistory'])->name('vehicle.history');

Route::get('/vehicle/models', [VehicleController::class, 'viewModels'])->name('vehicle.models');

