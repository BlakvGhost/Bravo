<?php

namespace App\Middleware;

use Juste\Http\Middleware\MiddlewareInterface;
use Juste\Facades\Controllers\Controller as Helpers;

class Authenticate extends Helpers implements MiddlewareInterface
{

    public function handle(): mixed
    {
        if (!$this->user()) {
            return $this->redirect('login');
        }
        return 1;
    }
}
