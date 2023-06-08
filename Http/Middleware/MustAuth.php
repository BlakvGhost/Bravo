<?php

namespace App\Middleware;

use Juste\Http\Middleware\MiddlewareInterface;
use Juste\Facades\Controllers\Controller as Helpers;

class MustAuth extends Helpers implements MiddlewareInterface {

    public function handle(): bool
    {
        return false;
    }
}