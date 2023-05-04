<?php

namespace Routes;

use App\Controllers\AuthController;
use Facades\Routes\Route;

Route::get("/", [AuthController::class, 'register'])->name('auth.register');
Route::get("authentication/register", [AuthController::class, 'register'])->name('auth.register');
Route::get("authentication/login", [AuthController::class, 'login'])->name('auth.login');
