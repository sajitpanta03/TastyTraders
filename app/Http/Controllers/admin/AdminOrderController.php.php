<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminOrderController extends Controller
{
        public function index()
        {
            $orders = Order::all();
            return view('admin.order.index', compact('orders'));
        }
}
