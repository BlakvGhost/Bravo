<?php

namespace Routes;

use App\Controllers\WelcomeController;
use Juste\Facades\Routes\Route;

Route::resource('password', WelcomeController::class);
Route::get("/", [WelcomeController::class, 'welcome'])->name('welcome')->middleware(['auth']);

require_once 'api.php';