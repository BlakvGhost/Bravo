<?php

namespace App\Middleware;

use Juste\Http\Middleware\MiddlewareInterface;
use Juste\Facades\Controllers\Controller as Helpers;

class Cors extends Helpers implements MiddlewareInterface
{

    public function handle(): mixed
    {
        require BASE_URL . DS . 'config' . DS . 'cors.php';
    }
}
