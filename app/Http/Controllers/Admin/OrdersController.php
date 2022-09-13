<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/** models */
use App\Models\Order;

class OrdersController extends Controller
{
    /** show List */
    public function showList()
    {
        $data = Order::where('status', true)->latest()->get();

        return view('admin.orders.index')->with(compact('data'));
    }


    /** show pending requests */
    public function showPendingRequest()
    {
        $requests = NannyService::where('status', false)->latest()->get();

        return view('admin.nanny.index')->with(compact('requests'));
    }


    /** show products create page */
    public function showCreatePage()
    {
        return view('admin.nanny.form');
    }


    /** create profile */
    public function create(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            'email'         => 'required|email|unique:nanny_services,email',
            'phone'         => 'required|string|unique:nanny_services,phone',
            'age'           => 'required',
            'experiences'   => 'required',
            'education'     => 'required',
            'work_ability'  => 'required',
            'about_profile' => 'required',
            'salary'        => 'required|string',
            'address'       => 'required',
        ]);


        if($request->hasFile('image'))
        {
            $request->validate([
                'image' => 'mimes:png,jpg,jpeg,webp',
            ]);

            $FileName = $request->image->hashName(); // Generate a unique, random name...
                        // save into folder
            $request->image->move(public_path('nanny_profile'), $FileName);

            // save into database
            $path = 'nanny_profile/' . $FileName;
        }

        NannyService::create([
            'image'  => $path ?? '',
            'name'   => $request->name,
            'email'  => $request->email,
            'phone'  => $request->phone,
            'age'    => $request->age,
            'work_experiences' => $request->experiences,
            'education'   => $request->education,
            'work_ability'   => $request->work_ability,
            'about_profile'  => $request->about_profile,
            'additional_information' => $request->additional_information,
            'salary' => $request->salary,
            'address' => $request->address,
        ]);        

        return to_route('admin.nanny.list')->with('success', 'Profile created successfully');
    }



    /** show update page */
    public function showUpdatePage(Request $request)
    {
        $key = $request->key;

        if($row = NannyService::find($key))
        {
            return view('admin.nanny.form')->with(compact('row'));
        }

        return back()->with('error', 'Record does not exists');
    }



    /** show Profile page */
    public function showProfile(Request $request)
    {
        $key = $request->key;

        if($row = NannyService::find($key))
        {
            return view('admin.nanny.view')->with(compact('row'));
        }

        return back()->with('error', 'Record does not exists');
    }



    /** update profile */
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'name'          => 'required|string',
            'email'         => 'required|email|unique:nanny_services,email,'. $key .',id',
            'phone'         => 'required|unique:nanny_services,phone,'. $key .',id',
            'age'           => 'required',
            'experiences'   => 'required',
            'education'     => 'required',
            'work_ability'  => 'required',
            'about_profile' => 'required',
            'salary'        => 'required|string',
            'address'       => 'required',
        ]);


        if($request->hasFile('image'))
        {
            $request->validate([
                'image' => 'mimes:png,jpg,jpeg,webp',
            ]);

            $FileName = $request->image->hashName(); // Generate a unique, random name...
            // save into folder
            $request->image->move(public_path('nanny_profile'), $FileName);

            // save into database
            $path = 'nanny_profile/' . $FileName;
        }

        NannyService::find($key)->update([
            'image'  => $path ?? '',
            'name'   => $request->name,
            'email'  => $request->email,
            'phone'  => $request->phone,
            'age'    => $request->age,
            'work_experiences' => $request->experiences,
            'education'   => $request->education,
            'work_ability'   => $request->work_ability,
            'about_profile'  => $request->about_profile,
            'additional_information' => $request->additional_information,
            'salary' => $request->salary,
            'address' => $request->address,
        ]);

        return to_route('admin.nanny.list')->with('success', 'Profile updated successfully');
    }


    /** profile remove from database */
    public function destroy(Request $request)
    {
        $key = $request->key;

        if($row = NannyService::find($key))
        {
            if($row->delete())
            {
                return back()->with('success', 'Record remove successfully');
            }
            return back()->with('info', 'Something went wrong. Please try again');            
        }

        return back()->with('error', 'Record does not exists');
    }



    /** status update */
    public function updateStatus(Request $request)
    {
        $key = $request->key;

        if($row = NannyService::find($key))
        {
            if($row->status)
            {
                $row->status = (int)false;
                $row->save();
            }
            else
            {
                $row->status = (int)true;
                $row->save();
            }
            
                return to_route('admin.nanny.list')->with('success', 'Profile updated successfully');
            
        }

        return back()->with('error', 'Record does not exists');
    }
}
