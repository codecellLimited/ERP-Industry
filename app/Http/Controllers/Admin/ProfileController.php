<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/** Models */
use App\Models\Admin;

class ProfileController extends Controller
{
    //Update Profile

    public function updateProfile(Request $request)
    {
        // return $request->image;

        $key = auth()->guard('admin')->id();

        $request->validate([
            'email' =>  'email|unique:admins,email,'. $key .',id',
            'image' =>  'nullable|mimes:png,jpg,jpeg',
        ]);

        if($row = Admin::find($key))
        {
            $data = [
                'name'      =>      $request->name,
                'email'     =>      $request->email,
            ];

            if($request->hasFile('image'))
            {
                $FileName = $request->image->hashName(); // Generate a unique, random name...

                // save into folder
                $request->image->move(public_path('profiles'), $FileName);

                // save into database
                $path = 'profiles/' . $FileName;

                $data['image'] = $path;
            }

            $row->update($data);

            return back()->with('success', 'Profile Updated Successfully');
        }

        return back()->with('error', 'Failed to updated');
    }
}
