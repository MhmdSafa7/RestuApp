<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_product'; // Pivot table name

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity'
    ];

    // Each OrderProduct belongs to an Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Each OrderProduct belongs to a Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
