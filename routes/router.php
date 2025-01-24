<?php 

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
require_once 'controllers/OrderController.php';
require_once 'controllers/ProductController.php';

$cartController = new OrderController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/add-to-order'){
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $orderController->addToOrder($productId, $quantity);
} elseif($_SERVER['REQUEST_URI'] === '/order'){
    $orderController->viewOrder();
}else{
    echo "Page not fount,";
}