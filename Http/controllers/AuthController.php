<?php

namespace App\Controllers;

use App\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->mustAuthenticate(false);
    }

    /**
     * Function de login
     */
    public function login()
    {
        return $this->render('auth/login', "Page de login");
    }

    public function register()
    {
        return $this->render('auth/register', "Page d'ouverture de compte");
    }

    public function logout()
    {
        session_destroy();

        return $this->redirecTo('/auth/login');
    }
}
