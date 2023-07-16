<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        {
            $search = $request->input('search');

          $products = Product::where('name', 'like', '%' . $search . '%')->get();
            return view('search', compact('products'));
        }
    }
}
