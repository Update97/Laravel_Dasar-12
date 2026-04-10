<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserIndex() 
    {
       $users = User::all();
       return view('pages.user.show',compact('users')); 
    }
}
