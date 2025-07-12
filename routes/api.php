<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\StateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;

Route::get('/customers/filter', [CustomerController::class, 'filter']);
Route::apiResource('customers', CustomerController::class);
Route::get('/states', [StateController::class, 'index']);
Route::get('/cities', [CityController::class, 'index']);
