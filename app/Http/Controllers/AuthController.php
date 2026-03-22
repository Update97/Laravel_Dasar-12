<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
      $request->validate([
        'email' => 'required|email|max:50',
        'password' => 'required|max:50',
      ]);
     if(Auth::attempt($request->only('email', 'password'), $request->remember)) {
        if (Auth::user()->role == 'customer') return redirect('/customer');
        return redirect('/dashboard');
     }
     return back()->with('failed', 'Email atau password salah!');
    }
    public function register(Request $request) {
      $request->validate([
        'name' => 'required|max:50',
        'password' => 'required|max:50|min:6',
        'confirm_password' => 'required|max:50|min:6|same:password',
      ]);
      $request['status'] = 'verify';
      $user = User::create($request->all());
      Auth::login($user);
      return redirect('/customer');
    }
    public function logout() {
      Auth::logout(Auth::user());
      return redirect('/login');
    }
    
}
