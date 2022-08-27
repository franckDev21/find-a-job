<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|min:6'
        ]);

        $data['password'] = Hash::make($request->password) ;

        // create user
        $user = User::create($data);

        // login
        auth()->login($user);

        return to_route('listing.index')->with('message','User created and logged in');
    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $data = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(auth()->attempt($data)){
            $request->session()->regenerate();
            return to_route('listing.index')->with('message','You are now logged in !');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('listing.index')->with('message','You have been logged out');
    }

}
