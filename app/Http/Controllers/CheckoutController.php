<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $order =  Product::find($id);
        return view('checkout', compact('product'));
    }
}
