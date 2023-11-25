<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;

class Login extends AuthenticatableUser implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id'; 
}
