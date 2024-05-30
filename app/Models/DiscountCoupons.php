<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DiscountCoupons extends Model
{
    use HasFactory;

    protected $table = 'discount_coupons';
    protected $primaryKey = 'id_discountcoupon';

    protected $fillable = [
        'code',
        'discount_value',
        'expiration_date',
    ];

    // Accessor for formatted expiration_date
    public function getExpirationDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    // Accessor for formatted discount_value
    public function getDiscountValueAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }
}
