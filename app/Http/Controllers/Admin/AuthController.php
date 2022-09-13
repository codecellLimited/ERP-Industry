<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetLink;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Admin;

class AuthController extends Controller
{
    //**    Admin Login  */
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:8',
        ],[
            'email.exists' => 'The email does not exists in our records',
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $request->session()->regenerate();

            return to_route('admin.dashboard');
        }

        return back()->withInput()
                ->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
    }


    /** logout */
    public function logout()
    {
        Auth::logout();
        return to_route('login');        
    }


    /** send password reset link */
    public function sendPasswordResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:admins,email|email',
        ],['email.exists' => 'This email does not exists our records']);

        $token = Str::random(50);
        $email = $request->email;

        //** Select Datatable */
        $table = DB::table('password_resets');
        $tableRow = $table->where('email', $email);

        if($tableRow->exists())
        {
           $tableRow->update([
                'email' => $email,
                'token' => bcrypt($token),
            ]);
        }
        else
        {
            $table->insert([
                'email' => $email,
                'token' => bcrypt($token),
            ]);
        }

        $resetLink = env('APP_URL') . '/password/reset/'. $token .'?email=' . $email;

        Mail::to($email)->send(new PasswordResetLink([
            'subject' => 'Reset Password Notification',
            'resetLink' => $resetLink,
        ]));

        return back()->with('status', 'We have send an email to reset your password');
    }



    /** updateAdminPassword */
    public function updateAdminPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required',
        ]);

        $token = $request->token;
        $email = $request->email;
        $password = $request->password;

        //** Select Datatable */
        $table = DB::table('password_resets');
        $tableRow = $table->where('email', $email);


        if(Hash::check($token, $tableRow->first()->token))
        {
            $tableRow  = Admin::where('email', $email);

            $tableRow->update([
                'password' => bcrypt($password),
            ]);

            Auth::guard('admin')->login($tableRow->first());

            return to_route('admin.dashboard');
        }

        return back()->withErrors('email.required', 'Token is expired. Please try again');
    }
}
