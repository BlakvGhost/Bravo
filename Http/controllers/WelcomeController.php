<?php

namespace App\Controllers;

use App\Controllers\Controller;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->mustAuthenticate(false);
    }

    public function welcome()
    {
        return $this->render('welcome', context: ['appName' => $_ENV['APP_NAME']]);
    }
}
