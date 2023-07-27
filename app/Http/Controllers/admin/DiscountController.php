<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::with('product')->get();
        return view('admin.discount.index', compact('discounts'));
    }

    public function create()
    {
        $products = Product::with('discount')->get();
        return view('admin.discount.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'percentage' => 'required',
            'product_id' => 'required',
            'expiry_date' => 'required'
        ]);
        $data = Discount::create([
            'percentage' => $request->percentage,
            'product_id' => $request->product_id,
            'expiry_date' => $request->expiry_date
        ]);
        $data->save();
        return redirect()->route('discounts.index')->with('success', 'Discount created successfully');
    }

    public function edit($id)
    {
        $discounts = Discount::findOrFail($id);
        return view('admin.discount.edit', compact('discounts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'expiry_date' => 'required',
            'percentage' => 'required',
        ]);

        $discount = Discount::findOrFail($id);
        $discount->percentage = $request->percentage;
        $discount->expiry_date = $request->expiry_date;

        $discount->save();

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully');
    }

    public function destroy($id)
    {
        $product = Discount::find($id);
        $product->delete();
        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully');
    }
}

