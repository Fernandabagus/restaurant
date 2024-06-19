<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaction',
        'id_order',
        'transaction_date',
        'total_price',
        'payment_method',
        'status',
    ];

    protected $dates = [
        'transaction_date',
    ];
}

