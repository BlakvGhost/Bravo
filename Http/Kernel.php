<?php

namespace App;

trait Kernel {
    protected $middlewareAliases = [
        'auth' => \App\Middleware\Authenticate::class,
        'api' => \App\Middleware\Cors::class,
    ];
}