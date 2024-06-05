<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drinks extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'drinks';
    protected $primaryKey = 'id_drink';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'image',
        'name',
        'price',
        'description',
    ];
}
