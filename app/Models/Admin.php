<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';
    protected $guard = 'admin';
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'id_admin',
        'nama_admin',
        'username_admin',
        'email_admin',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
