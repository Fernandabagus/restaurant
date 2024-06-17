<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booktable extends Model
{
    use HasFactory;
    protected $table = 'book_tables';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'many_person',
        'book_date',
    ];
}
