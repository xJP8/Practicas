<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user', 'pass',
    ];

    public function findForPassport($user)
    {
        return $this->where('user', $user)->first();
    }

    public function getAuthPassword() {
        return $this->pass;
    }
}
