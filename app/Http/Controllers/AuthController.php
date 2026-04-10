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
      ],[
        'email.required'  => 'Email tidak boleh kosong',
        'email.max'       => 'Email maksimal 50 karakter',
        'password.required' => 'Password tidak boleh kosong',
        'password.max'      => 'Password maksimal 50 karakter', 
      ]);
     if(Auth::attempt($request->only('email', 'password'), $request->remember)) {
        if (Auth::user()->role == 'customer') 
        return redirect('/customer');
        return redirect('/dashboard');
     }
     return back()->with('failed', 'Email atau password salah!');
    }
    public function register(Request $request) {
      $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|unique:users,email',
        'password' => 'required|max:50|min:6',
        'confirm_password' => 'required|same:password',
      ],[
        'name.required'     => 'nama lengkap tidak boleh kosong',
        'name.max'          => 'nama lengkap maksimal 50 karakter',
        'email.required'    => 'Email tidak boleh kosong',
        'email.unique'      => 'Email ini sudah terdaftar!',
        'password.required' => 'Password tidak boleh kosong',
        'password.max'      => 'Password maksimal 50 karakter',
        'password.min'      => 'Password minimal 6 karakter',
        'confirm_password.required' => 'Konfirmasi Password anda wajib di isi',
        'confirm_password.same'     => 'Konfirmasi password tidak cocok.',
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
