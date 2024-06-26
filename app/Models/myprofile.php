<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'username',
        'phone',
        'address',
        'password',
        'img',
    ];

}
