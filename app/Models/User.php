<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'civil_status',
        'email',
        'password',
        'role',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
