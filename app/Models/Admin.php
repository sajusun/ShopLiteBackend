<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;


    protected $fillable = ['name', 'email', 'password','role_id'];

    protected $hidden = ['password', 'remember_token'];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
