<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use Auth;
use Hash;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{
     //** User Registration */
    public function UserRegister(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'min:2', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:255', 'unique:users,phone'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($Validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => $Validator->errors(),
            ], 400);
        }

        $data = $request->all();

        $user = User::create([
                    'username' => trim(strtolower($data['username'])),
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => bcrypt($data['password']),
                ]);
        
        $response = [
            'token' => $user->createToken($data['username'])->plainTextToken,
            'user' => $user
        ];

        return response()->json([
            'status' => true,
            'message' => "Registered successfully",
            'data' => $response,
        ], 400);
    }



    /** User Login by Api */
    public function UserLogin(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255', 'exists:users,username'],
            'password' => ['required', 'string', 'min:8'],
        ],
        ['email.exists' => 'This credential does not matched out records.']
        );

        if($Validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => $Validator->errors(),
            ], 400);
        }

        if(Auth::attempt(['name' => $request->username, 'password' => $request->password, 'status' => true]))
        {
            $user = Auth::user();

            $response = [
                'token' => $user->createToken($request->username)->plainTextToken,
                'user' => $user,
            ];

            return response()->json([
                'status' => true,
                'message' => "Login successfully",
                'data' => $response,
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => false,
                'message' => "These credentials do not match our records.",
            ]);
        }

    }
}
