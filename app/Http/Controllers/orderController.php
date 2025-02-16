<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {
    public function storeOrder(Request $request) {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'location' => 'required|string',
            'products' => 'required|string', // Products are sent as a JSON string
            'order_arrival_time' => 'required|date',
        ]);

        // Decode the products JSON string into an array
        $products = json_decode($request->products, true);

        // Create the order
        $orderData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'total_price' => 0, // Will calculate later
            'order_arrival_time' => $request->order_arrival_time,
        ];

        // Assign user_id only if the user is authenticated
        if (Auth::check()) {
            $orderData['user_id'] = Auth::id();
        }

        $order = Order::create($orderData);

        // Calculate total price and attach products to the order
        $totalPrice = 0;
        foreach ($products as $productData) {
            $product = Product::find($productData['id']);
            if ($product) {
                $quantity = $productData['quantity'];
                $order->products()->attach($product->id, ['quantity' => $quantity]);
                $totalPrice += $product->price * $quantity;
            }
        }

        // Update the total price of the order
        $order->update(['total_price' => $totalPrice]);

        return redirect('/menu')->with('success', 'Order placed successfully!');
    }
}


