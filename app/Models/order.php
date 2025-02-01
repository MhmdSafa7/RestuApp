<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
private $items=[];
public function addItem($product, $quantity){
    $productId = $product['id'];

    if(isset($this->items[$productId])){
        $this->items[$productId]['quantity']+=$quantity;
    }else{
        $this->items[$productId]=[
            'product' => $product,
            'quantity' => $quantity
        ];
    }
}
public function getItems(){
    return $this->items;
}
public function getTotalPrice(){
    $total=0;
    foreach($this->items as $item){
        $total += $item['product']['price']*$item['quantity'];
    }
    return $total;
}
}
