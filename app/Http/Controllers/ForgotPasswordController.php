<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

use function Symfony\Component\Clock\now;

class ForgotPasswordController extends Controller
{
    public function showForm(){
        return view('auth.forgot-password');
    }
    public function sendResetLink(Request $request) {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token,'created_at' => now()]
        );

        Mail::send('emails.password_reset', ['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Your Password');
        });
        return back()->with('success', 'Reset Password has been sent to your email!');
    }
}
