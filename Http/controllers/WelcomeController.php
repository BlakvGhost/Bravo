<?php

namespace App\Controllers;

use App\Controllers\Controller;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->mustAuthenticate(false);
    }

    public function index()
    {
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

    public function edit($id)
    {
        return $this->html("<h2>Welcome To Edit</h2>");
    }

    public function update($id)
    {
        return $this->html("<h2>Welcome To update</h2>");
    }

    public function destroy($id)
    {
        return $this->html("<h2>Welcome To Destroy</h2>");
    }

    public function welcome()
    {
        return $this->render('welcome', context: ['appName' => $_ENV['APP_NAME']]);
    }
}
