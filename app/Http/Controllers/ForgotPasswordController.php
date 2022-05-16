<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
//use Mail;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {

        return view('customauth.passwords.email');
    }

    public function postEmail(Request $request)
    {
        //dd($request);
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        //$token = str_random(64);
        $token = Str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        // this code block will work when mail functionality working
       /* Mail::send('customauth.verify', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return view('customauth.passwords.email', ['token' => $token]);*/

        return view('customauth.passwords.reset', ['token' => $token]);
    }
}
