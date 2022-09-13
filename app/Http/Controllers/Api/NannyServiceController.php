<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NannyService;
use Illuminate\Http\Request;

class NannyServiceController extends Controller
{
    //** Show nanny services */
    public function showAll()
    {
        $rows = NannyService::where('status', true)->latest()->get();

        return response()->json([
            'success' => true,
            'message' => $rows->count() . " items found",
            'data'    => $rows,
        ], 201);
    }


    /** find one profile */
    public function findOne(Request $request)
    {
        $key = $request->key;

        if($rows = NannyService::find($key))
        {
            return response()->json([
                'success' => true,
                'message' => $rows->count() . " item found",
                'user'    => $rows,
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => "Profile does not exists",
        ], 404);
    }



    /** create profile for nanny service */
    public function create(Request $request)
    {
        $request->validate([
            "email"     => "required|unique:nanny_services,email|email",
            "phone"     => "required|unique:nanny_services,phone",
            "name"      => "required|string",
            "age"       => "required|string",
            "address"   => "required|string",
            "work_experiences"   => "required|string",
            "work_ability"   => "required|string",
            "education"   => "required|string",
            "about_profile"   => "required|string",
            "additional_information"   => "nullable|string",
            "salary"   => "required|string",
            "image"    => "required|mimes:jpg,jpeg,png|image",
        ]);


        $row = NannyService::create($request->all());

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...
            // save into folder
            $request->image->move(public_path('nanny_profile'), $FileName);

            // save into database
            $path = 'nanny_profile/' . $FileName;

            NannyService::find($row->id)->update([
                'image' => $path,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => "Profile created successfully",
        ], 201); 


    }



    /** update profile for nanny service */
    public function update(Request $request)
    {
        $request->validate([
            "key"       => "required|exists:nanny_services,id",
            "email"     => "email|unique:nanny_services,email,". $request->key .",id",
            "phone"     => "unique:nanny_services,phone,". $request->key .",id",
            "name"      => "string",
            "age"       => "string",
            "address"   => "string",
            "work_experiences"   => "string",
            "work_ability"   => "string",
            "education"   => "string",
            "about_profile"   => "string",
            "additional_information"   => "nullable|string",
            "salary"   => "string",
            "image"    => "mimes:jpg,jpeg,png|image",
        ]);


        NannyService::find($request->key)->update($request->all());

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...
            // save into folder
            $request->image->move(public_path('nanny_profile'), $FileName);

            // save into database
            $path = 'nanny_profile/' . $FileName;

            NannyService::find($request->key)->update([
                'image' => $path,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => "Profile updated successfully",
        ], 201); 


    }
}
