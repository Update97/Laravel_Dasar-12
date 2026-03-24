<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Requestk;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function showResetForm($token) {
        return view('auth.reset-password', ['token' => $token]);
    }
        public function updatePassword (Request $request) {
        $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6|confirmed',
        'token' => 'required'
        ]);

         $record = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$record || Carbon::parse($record->created_at)->addMinutes(60)->isPast()){
            return back()->with('error', 'Invalid or expired token.');
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
        
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect('/login')->with('success', 'Your Password has been reset!');
    }  
}
