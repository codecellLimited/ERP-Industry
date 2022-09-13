<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/** models */
use App\Models\OtpToken;

class OtpTokenController extends Controller
{
    //** Save Otp */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email|exists:users,email',
            'phone' => 'nullable|exists:users,phone',
            'token' => 'required|unique:otp_tokens,token|min:4'
        ],[
            'email.exists' => "The email does not exists in our records",
            'phone.exists' => "The phone does not exists in our records",
        ]);

        $row = OtpToken::where('email', $request->email)->orWhere('phone', $request->phone);

        if($row->exists())
        {
            $row->update($request->all());
            $row = $row->first();
        }
        else
        {
            $row = OtpToken::create($request->all());
        }
        

        return response()->json([
            'success'   => true,
            'message'   => "Record save successfully",
            'data'      => $row,
        ]);
    }
    


    //** show Otp */
    public function showTokenForChecking(Request $request)
    {
        $request->validate([
            'email' => 'nullable|exists:otp_tokens,email',
            'phone' => 'nullable|exists:otp_tokens,phone',
            'token' => 'required|exists:otp_tokens,token|min:4'
        ],[
            'email.exists' => "The email does not exists in our records",
            'phone.exists' => "The phone does not exists in our records",
        ]);

        $row = OtpToken::where('email', $request->email)
                        ->orWhere('phone', $request->phone)
                        ->first();

        return response()->json([
            'success'   => true,
            'message'   => "1 record found",
            'data'      => $row,
        ]);
    }



    //** remove otp after otp matched */
    public function destroy(Request $request)
    {
        $request->validate([
            'email' => 'nullable|exists:otp_tokens,email',
            'phone' => 'nullable|exists:otp_tokens,phone',
        ],[
            'email.exists' => "The email does not exists in our records",
            'phone.exists' => "The phone does not exists in our records",
        ]);

        $row = OtpToken::where('email', $request->email)
                        ->orWhere('phone', $request->phone)
                        ->delete();

        return response()->json([
            'success'   => true,
            'message'   => "Record remove successfully",
        ]);
    }
}
