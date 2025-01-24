<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    private static $products =[
        ['id' => 1, 'name' => 'Product 1', 'price' => 10],
        ['id' => 2, 'name' => 'Product 2', 'price' => 20],
        ['id' => 3, 'name' => 'Product 3', 'price' => 30]
    ];

    public static function findById($id){
        foreach(self::$products as $product){
            if($product['id' == $id]){
                return $product;
            }
        }
        return null;
    }
    use HasFactory;
}
