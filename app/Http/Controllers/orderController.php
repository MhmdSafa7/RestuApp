<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller {
    public function storeOrder(Request $request) {
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'location' => 'required|string',
        'products' => 'required|array', // List of product IDs and quantities
        'products.*.id' => 'exists:products,id',
        'products.*.quantity' => 'integer|min:1',
        'order_arrival_time' => 'required|date',
    ]);

    $order = Order::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'location' => $request->location,
        'total_price' => 0, // Will calculate later
        'order_arrival_time' => $request->order_arrival_time,
    ]);

    $totalPrice = 0;

    foreach ($request->products as $productData) {
        $product = Product::find($productData['id']);
        $quantity = $productData['quantity'];
        $order->products()->attach($product->id, ['quantity' => $quantity]);
        $totalPrice += $product->price * $quantity;
    }

    $order->update(['total_price' => $totalPrice]);
    return response()->json(['message' => 'Order placed successfully!', 'order' => $order]);
    }
}

