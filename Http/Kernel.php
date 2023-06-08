<?php

namespace App;

trait Kernel {
    protected $middlewareAliases = [
        'auth' => \App\Middleware\MustAuth::class,
        'api' => \App\Middleware\MustAuth::class,
    ];
}