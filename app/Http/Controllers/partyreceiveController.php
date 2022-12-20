<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\partyreceive;

class partyreceiveController extends Controller
{
    /** --------------- partyreceive data table
     * =============================================*/
    public function show()
    { 
        $partyreceive = partyreceive::where('status', true)->latest()->get();

        return view('account.bankcash.party_receive.table')->with(compact('partyreceive'));
    }


    /** --------------- partyreceive data table
     * =============================================*/
    public function create()
    {
        return view('account.bankcash.party_receive.form');
    }



    /** --------------- Store partyreceive
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
           
            'date'  => 'required',
            'amount'  => 'required',
            'party'  => 'required',
            'method' => 'required'

           
        ]);

        $data = $request->all();

        $partyreceive = partyreceive::create($data);

        return to_route('partyreceive')->with('success', 'Record created successfully');
    }


    
    /** --------------- partyreceive data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $partyreceive = partyreceive::find($key);

        return view('account.bankcash.party_receive.form')->with(compact('partyreceive'));
    }




    /** --------------- Update partyreceive
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        // $request->validate([
        //     'name'  => 'required|unique:partyreceives,name,'. $key .',id',
        //     'email'  => 'required|email|unique:partyreceives,email,'. $key .',id',
        //     'phone'  => 'required|unique:partyreceives,phone,'. $key .',id',
        //     'image' => 'nullable|mimes:jpg,jpeg,png'
        // ]);

        
        $data = $request->all();

        $partyreceive = partyreceive::find($key)->update($data);

        return to_route('partyreceive')->with('success', 'Record updated successfully');
    }



    /** --------------- Update partyreceive
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $partyreceive = partyreceive::destroy($key);

        return to_route('partyreceive')->with('success', 'Record deleted successfully');
    }

}
