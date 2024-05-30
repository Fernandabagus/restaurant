<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'id_transaction';

    protected $fillable = [
        'id_orderlist',
        'amount',
        'transactions_date',
    ];

    // Accessor for formatted transactions_date
    public function getTransactionsDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }

    // Accessor for formatted amount
    public function getAmountAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    // Relationships
    public function orderList()
    {
        return $this->belongsTo(OrderList::class, 'id_orderlist');
    }
}
