<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\party;
use App\Models\order;

class partyController extends Controller
{
    /** --------------- party data table
     * =============================================*/
    public function show()
    {
        $parties = party::where('status', true)->latest()->get();

        return view('party.party.table')->with(compact('parties'));
    }


    /** --------------- party data table
     * =============================================*/
    public function create()
    {
        return view('party.party.form');
    }



    /** --------------- Store party
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:parties,name',
            'email'  => 'required|email|unique:parties,email',
            'phone'  => 'required|unique:parties,phone',
            'image' => 'nullable|mimes:jpg,jpeg,png'
        ]);

        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('parties'), $FileName);

            // save into database
            $path = 'parties/' . $FileName;

            $data['image'] = $path;
        }

        $partys = party::create($data);

        return to_route('party')->with('success', 'Record created successfully');
    }


    
    /** --------------- party data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $parties = party::find($key);

        return view('party.party.form')->with(compact('parties'));
    }

    /**--view profile-- */
    public function profile(Request $request){
        $key = $request->key;
        $parties = party:: find($key);

        $records = order:: where('party_id',$key)->get();

        return view('party.party.profile')->with(compact('parties','records'));
    }


    /** --------------- Update party
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'name'  => 'required',
            'email'  => 'required',
            'phone'  => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png'
        ]);

        
        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('parties'), $FileName);

            // save into database
            $path = 'parties/' . $FileName;

            $data['image'] = $path;
        }

        $parties = party::find($key)->update($data);

        return to_route('party')->with('success', 'Record updated successfully');
    }



    /** --------------- delete party
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $party = party::destroy($key);

        return to_route('party')->with('success', 'Record deleted successfully');
    }

}
