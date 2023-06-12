<?php

namespace Routes;

use App\Controllers\WelcomeController;
use Juste\Facades\Routes\Route;

Route::get("/", [WelcomeController::class, 'welcome'])->name('welcome');
Route::resource('password', WelcomeController::class);


Route::group(function () {
    
})->middlewares(['auth']);

require_once 'api.php';
