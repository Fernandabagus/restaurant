<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $primaryKey = 'id_orderitems';

    protected $fillable = [
        'id_orderlist',
        'id_item',
        'type_item',
        'quantity',
        'price',
    ];

    // Accessor for formatted price
    public function getPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    // Relationships
    public function orderList()
    {
        return $this->belongsTo(OrderList::class, 'id_orderlist');
    }
}
