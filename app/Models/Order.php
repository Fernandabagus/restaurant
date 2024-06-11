<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_drink',
        'quantity',
        'order_date',
    ];

     // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Drink
    public function drink()
    {
        return $this->belongsTo(Drinks::class, 'id_drink');
    }
}
