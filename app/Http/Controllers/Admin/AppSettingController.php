<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppSettingController extends Controller
{
    //** update appsettings */
    public function update(Request $request)
    {
        $request->validate([
            'appLogo' => 'nullable|mimes:png,jpg,jpeg,webp|image',
        ]);

        $data = $request->all();

        if($request->hasFile('app_logo'))
        {
            $FileName = $request->app_logo->hashName(); // Generate a unique, random name...
            // save into folder
            $request->app_logo->move(public_path('app'), $FileName);

            // save into database
            $path = 'app/' . $FileName;

            $data['app_logo']   =  $path;
        }        

        \App\Models\AppSettings::first()->update($data);        

        return back()->with('success', 'App updated successfully');
    }
}
