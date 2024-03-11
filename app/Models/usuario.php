<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class usuario extends Authenticatable
{
    protected $table = 'usuarios';
    
    protected $fillable = [
        'Nom_Usuario', 'email', 'password', 'Rol', 'Sede'
    ];
}