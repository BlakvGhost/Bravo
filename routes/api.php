<?php

namespace Routes;

use App\Controllers\MailsController;
use Juste\Facades\Routes\Route;

Route::post('api/mails', [MailsController::class, 'index'])->name('api')->middlewares(['cors']);