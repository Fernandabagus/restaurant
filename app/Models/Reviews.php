<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'id_reviews';

    protected $fillable = [
        'id_user',
        'id_food',
        'id_drink',
        'rating',
        'comment',
    ];
}
