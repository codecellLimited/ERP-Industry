<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/** models */
use App\Models\User;

class UserController extends Controller
{
    /** Show User table */
    public function showUserList()
    {
        $data = User::latest()->get();

        return view('admin.users.index')->with(compact('data'));
    }


    /** show user data for update */
    public function showUserData(Request $request)
    {
        $key = $request->key;

        if($user = User::find($key))
        {
            return view('admin.users.update')->with(compact('user'));
        }

        return back()->with('error', 'User does not exists');
    }


    /** show user data for update */
    public function userUpdate(Request $request)
    {
        $request->validate([
            'key'   => 'required',
            'email' => 'unique:users,email,'.$request->key .',id',
            'phone' => 'unique:users,phone,'.$request->key.',id',
        ]);

        $key = $request->key;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $gender = $request->gender;
        $dateOfBirth = $request->dateOfBirth;
        $location = $request->location;

        if($user = User::find($key))
        {
            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'gender' => $gender,
                'date_of_birth' => $dateOfBirth,
                'location' => $location,
            ];

            if($user->update($data))
            {
                return to_route('admin.user.list')->with('success', 'Record updated successfully');
            }

            return to_route('admin.user.list')->with('info', 'User record is safe');
        }

        return back()->with('error', 'User does not exists');
    }
    


    /** User remove from database */
    public function userDestroy(Request $request)
    {
        $key = $request->key;

        if($user = User::find($key))
        {
            if($user->delete())
            {
                return back()->with('success', 'User remove successfully');
            }
            return back()->with('info', 'Something went wrong. Please try again');            
        }

        return back()->with('error', 'User does not exists');
    }



    /** User Restricted from database */
    public function userRestricted(Request $request)
    {
        $key = $request->key;

        if($user = User::find($key))
        {
            if($user->status)
            {
                $user->status = (int)false;
                $user->save();

                return back()->with('success', 'User account deactivated successfully');
            }
            else
            {
                $user->status = (int)true;
                $user->save();

                return back()->with('success', 'User account activated successfully');
            }                       
        }

        return back()->with('error', 'User does not exists');
    }
}
