<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $table = 'drinks';

    protected $fillable = [
        'name',
        'price',
        'stock'
    ];
}
