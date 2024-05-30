<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;

    protected $table = 'foods';
    protected $primaryKey = 'id_food';

    protected $fillable = [
        'name',
        'img_url',
        'description',
        'price',
    ];
    
}
