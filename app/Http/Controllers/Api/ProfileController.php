<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/** models */
use App\Models\User;

class ProfileController extends Controller
{
    //** show profile Records */
    public function show(Request $request)
    {
        $key = $request->key;

        if($row = User::find($key))
        {
            return response()->json([
                'success' => true,
                'message' => "User exists",
                'data' => $row,
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => "User does not exists",
        ], 401);
    }



    /** update profile record */
    public function update(Request $request)
    {
        // return $request;

        $request->validate([
            'key' => 'required',
            'email' => 'unique:users,email,'. $request->key .',id',
            'phone' => 'unique:users,phone,'. $request->key .',id',
            'image' => 'mimes:jpg,jpeg,png,webp',
        ]);

        $key = $request->key;

        if($row = User::find($key))
        {
            $row->update($request->all());

            if($request->hasFile('image'))
            {
                $FileName = $request->image->hashName(); // Generate a unique, random name...
                // save into folder
                $request->image->move(public_path('nanny_profile'), $FileName);

                // save into database
                $path = 'nanny_profile/' . $FileName;

                $row->image = $path;
                $row->save();
            }

            return response()->json([
                'success' => true,
                'message' => "Profile update successfully",
                'user'    => $row, 
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => "User does not exists",
        ], 401);
    }
}
