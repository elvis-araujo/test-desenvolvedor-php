<?php

use App\Http\Controllers\CustomerWebController;
use Illuminate\Support\Facades\Route;

Route::resource('customers', CustomerWebController::class);
