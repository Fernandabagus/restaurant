<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuponDiskon extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode',
        'jumlah_diskon',
        'tanggal_kadaluarsa',
    ];
}
