<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->mustAuthenticate(false);
    }

    public function index()
    {
        $user = User::find(1);
        $this->dd($user->password);
        return $this->html("<h2>Welcome To Index</h2>");
    }

    public function create()
    {
        return $this->html("<h2>Welcome To Create</h2>");
    }

    public function store()
    {
        return $this->html("<h2>Welcome To Store</h2>");
    }

    public function show(User $user)
    {
        return $this->html("<h2>Welcome To Show" . $user->email ."</h2>");
    }
    
    public function edit(User $user)
    {
        return $this->html("<h2>Welcome To Edit" . $user->email ."</h2>");
    }

    public function update(User $user)
    {
        return $this->html("<h2>Welcome To update</h2>");
    }

    public function destroy(User $user)
    {
        return $this->html("<h2>Welcome To Destroy</h2>");
    }

    public function welcome()
    {
        return $this->render('welcome', context: ['appName' => $_ENV['APP_NAME']], title: 'Welcome');
    }
}
