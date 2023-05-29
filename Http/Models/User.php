<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['nom', 'prenom', 'email', 'password'];

}