<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
require_once 'models/order.php';
require_once 'models/product.php';
class orderController extends Controller
{
    private $order;

    public function __construct(){
        session_start();
        if(!isset($_SESSION['order'])){
            $_SESSION['order']=new order();
        }
        $this->order=$_SESSION['order'];
    }

    public function addToOrder($productId, $quantity){
        $product = Product::findById($productId);
        if($product){
            $this->order->addItem($product, $quantity);
            $_SESSION['order']=$this->order;
            header('Location: /order');
            exit;
        }else{
            echo "Product not found.";
        }
    }
    public function viewOrder(){
        $items = $this->order->getItems();
        $total = $this->order->getTotalPrice();
        require 'views/order.php';
    }
}
