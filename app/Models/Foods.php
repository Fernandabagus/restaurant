<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Foods extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'foods';
    protected $primaryKey = 'id_food';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'img_url',
        'description',
        'price',
    ];
    
}
