<?php

namespace App\Models;

use App\Models\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['nom', 'prenom', 'email', 'password'];

}