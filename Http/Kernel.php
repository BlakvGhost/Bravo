<?php

namespace App\Kernel;

class Kernel {
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class,
    ];
}