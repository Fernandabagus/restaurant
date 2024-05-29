<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'id_customers';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
    ];

    // Relationships
    public function orderLists()
    {
        return $this->hasMany(OrderList::class, 'id_customers');
    }
}
