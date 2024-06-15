<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        'id_food',
        'id_drink',
        'quantity',
        'order_date',
      'status',
        'created_at',
        'updated_at',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function food()
    {
        return $this->hasMany(Foods::class, 'id_food', 'id');

    }

    // Relationship with Food
    public function foods()
    {
        return $this->belongsTo(Foods::class, 'id_food');
    }
}
