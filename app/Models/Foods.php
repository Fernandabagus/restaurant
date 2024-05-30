<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;

    protected $table = 'foods';
    protected $primaryKey = 'id_foods';

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
