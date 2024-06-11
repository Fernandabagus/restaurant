<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'order_id',
        'transaction_date',
        'total_price',
        'payment_method',
        'status',
    ];

    protected $dates = [
        'transaction_date',
    ];
}

