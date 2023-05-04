<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;

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

        if ($this->server('REQUEST_METHOD') == 'POST') {

            $email = $this->sanitize_post('email');
            $password = $this->sanitize_post('password');

            if ($user = User::getBy('email', $email)) {
                if (password_verify($password, $user['password'])) {
                    $this->setDataOnSession('user', $user);
                    return $this->redirecTo('/');
                } else {
                    $this->back()->with("Votre Mot de passe est incorrect...");
                }
            } else {
                $this->back()->with("Votre email est incorrect...");
            }
        }

        return $this->render('auth/login', "Page de login");
    }

    public function register()
    {

        if ($this->server('REQUEST_METHOD') == 'POST') {

            $payloads = [
                'nom' => $this->sanitize_post('nom'),
                'prenom' => $this->sanitize_post('prenom'),
                'email' => $this->sanitize_post('email'),
                'password' => password_hash($this->sanitize_post('pass'), PASSWORD_DEFAULT),
            ];

            if (password_verify($this->sanitize_post('password2'), $payloads['password'])) {
                if ($user = User::create($payloads)) {
                    $new_user = User::getBy('email', $payloads['email']);
                    $this->setDataOnSession('user', $new_user);
                    return $this->redirecTo('/');
                }
            } else {
                $this->back()->with("Vos deux mots de passe ne sont pas conformes");
            }
        }

        return $this->render('auth/register', "Page de d'ouverture de compte");
    }

    public function logout()
    {
        session_destroy();

        return $this->redirecTo('/auth/login');
    }
}
