<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'location', 'total_price', 'order_arrival_time','user_id',
    ];

    public function products() {
        return $this->belongsToMany(Product::class, 'order_product')
        ->withPivot('quantity')
        ->withTimestamps();
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}

