<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('userlogin');
    }

    public function showSignupForm() {
        return view('usersignup');
    }

    public function index()
    {
        $users = User::all();
        return view('customer', compact('users'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required'
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->save();
        
        return redirect('/userlogin')->with('success', 'You have been successfully registered.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/home');
        }
        else{
            //return redirect()->route('userlogin')->withErrors(['error' => 'Invalid username or password']);
            return redirect()->route('userlogin')->with('error', 'Invalid username or password');

        }
       
    }

    public function logout() {
        Auth::logout();
        return redirect('/userlogin');
    }
    
}

