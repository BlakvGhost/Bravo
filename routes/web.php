<?php

namespace Routes;

use App\Controllers\WelcomeController;
use Facades\Routes\Route;

Route::get("/", [WelcomeController::class, 'welcome'])->name('welcome');
