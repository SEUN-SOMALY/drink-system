<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'total_price',
        'customer_name' // ✅ ADD THIS
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
