<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registration() 
    {
        return view('auth.register');
    }

    public function postLogin(Request $request)
    {
        $request->validate(([
            'email' => 'required',
            'password' => 'required',
        ]));

        $crendentials = $request->only('email', 'password');
        if (auth()->attempt($crendentials)) {
            return redirect()->intended('/')
            ->withSuccess('You have successfully logged in.');
        }
        return redirect("login")->withSuccss('Opps! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('/login')->withSuccess('Great! Your registration successed');
    }

    public function dashboard()
    {
        if(auth()->check()) {
            return view('index');
        }
        return redirect('login')->withSuccess('Opps! You donot have access');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return Redirect('/');
    }
}
