<?php

namespace App\Http\Controllers;

use App\Models\Category;

class DashbordController extends Controller
{
    public function index()
    {
        $categories = Category::has('product')->get();
        return view('dash', compact('categories'));
    }
}
