<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class OrderList extends Model
{
    use HasFactory;

    protected $table = 'order_list';
    protected $primaryKey = 'id_orderlist';

    protected $fillable = [
        'id_customers',
        'items_summary',
        'order_date',
        'status',
    ];

    // Accessor for formatted order_date
    public function getOrderDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }

    // Accessor for formatted total_price (if you have a total price or similar field)
    public function getTotalPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'id_customers');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'id_orderlist');
    }
}
