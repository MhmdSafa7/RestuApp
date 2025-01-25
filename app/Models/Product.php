<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
<<<<<<< HEAD
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
=======

    public $timestamps=false;

    // Table name
    public $table='products';

    // Primary Key
    public $primaryKey='id';

>>>>>>> fafad3d9bb1ebe1d47cd1dfe745a38b46e59e29e
    use HasFactory;
}
