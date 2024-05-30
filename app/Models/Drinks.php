<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drinks extends Model
{
    use HasFactory;

    protected $table = 'drinks';
    protected $primaryKey = 'id_drinks';

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    // Accessor for formatted price
    public function getPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }
}
