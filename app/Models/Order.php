<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
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
