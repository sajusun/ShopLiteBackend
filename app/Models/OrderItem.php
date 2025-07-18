<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'quantity',
        'price',
    ];

    // Relation to Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relation to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
