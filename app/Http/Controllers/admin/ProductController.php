<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $product = Product::all();
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $imagePath = $request->file('image')->store('public/images');
        $product = new Product([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'image' => $imagePath,
        ]);
        dd($product);
        $product->save();
        return redirect('product.create')->with('sucess', 'Created sucessfully');
    }
}
