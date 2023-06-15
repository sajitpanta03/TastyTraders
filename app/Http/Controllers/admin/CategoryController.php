<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;                                                                            
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index() 
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));

    }

    public function create() 
    {
       return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfull');
    }

    public function edit(Request $request, $id) 
    {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $categories = Category::find($request->id);
        $categories->name = $request->name;
        $categories->save();
        return redirect(route('categories.index'));
    }

    public function destroy($id) 
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect(route('categories.index'));
    }
}