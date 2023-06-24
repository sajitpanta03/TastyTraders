<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;                                                                            
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));

    }

    public function create() 
    {
       return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfull');
    }

    public function edit(Request $request, $id) 
    {
        $users = User::find($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($request->id);
        $users->name = $request->name;
        $users->save();
        return redirect(route('users.index'));
    }

    public function destroy($id) 
    {
        $users = User::find($id);
        $users->delete();
        return redirect(route('users.index'));
    }
}