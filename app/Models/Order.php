<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_product',
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

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    // Relationship with Food
    // public function food()
    // {
    //     return $this->belongsTo(Foods::class, 'id_food');
    // }
}
