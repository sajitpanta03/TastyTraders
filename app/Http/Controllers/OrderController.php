<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function generateOrderId()
    {
        // Generate a random numeric order ID part
        $randomPart = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); // Pad with leading zeros

        // Combine the parts to create the order ID
        $id = $randomPart;

        return $id;
    }

    public function getUserId()
    {
        if (Auth::check()) {
            return Auth::user()->id;
        } else {

            return null;
        }
    }

    public function quantity()
    {
        $quantity = 2;
        return $quantity;
    }

    public function price()
    {
        $price = 180;
        return $price;
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->id = $this->generateOrderId(); // You need to implement the generateOrderId() function
        $order->quantity = $this->quantity('quantity');
        $order->price = $this->price('price');
        $order->total_price = $request->input('quantity') * $request->input('price');
        $order->product_id = $request->input('product_id');
        $order->user_id = $this->getUserId(); // You need to implement the getUserId() function
        $order->save();

        return $message = (['message' => 'Order confirmed and saved to the database']);
    }

    public function __invoke(Request $request)
    {
    }
}
