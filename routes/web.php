<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleRegistrationController;
use App\Http\Controllers\VehicleHistoryController;
use App\Http\Controllers\VehicleModelController;

Route::get('/', [VehicleController::class, 'index'])->name('vehicle.index');

Route::get('/vehicle/register', [VehicleRegistrationController::class, 'showForm'])->name('vehicle.register'); 
Route::post('/vehicle/register', [VehicleRegistrationController::class, 'register'])->name('vehicle.store'); 

Route::get('/vehicle/re-register', [VehicleRegistrationController::class, 'reRegisterForm'])->name('vehicle.re-register');  
Route::post('/vehicle/re-register', [VehicleRegistrationController::class, 'reRegister'])->name('vehicle.re-register.store'); 

Route::get('/vehicle/re-register/success', [VehicleRegistrationController::class, 'reRegisterSuccess'])->name('vehicle.re-register.success');  

Route::get('/vehicle/history/form', [VehicleHistoryController::class, 'viewHistoryForm'])->name('vehicle.history.form');
Route::post('/vehicle/history', [VehicleHistoryController::class, 'viewHistory'])->name('vehicle.history');

Route::get('/vehicle/models', [VehicleModelController::class, 'viewModels'])->name('vehicle.models');
