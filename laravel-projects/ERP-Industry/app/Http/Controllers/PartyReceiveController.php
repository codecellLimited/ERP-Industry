<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\PartyReceive;

class PartyReceiveController extends Controller
{
    /** --------------- partyreceive data table
     * =============================================*/
    public function show()
    { 
        $partyreceive = PartyReceive::where('status', true)->latest()->get();

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
            'amount'  => 'required | integer',
            'party'  => 'required',
            'method' => 'required'

           
        ]);

        $data = $request->all();

        $partyreceive = PartyReceive::create($data);

        return to_route('partyreceive')->with('success', 'Record created successfully');
    }


    
    /** --------------- partyreceive data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $partyreceive = PartyReceive::find($key);

        return view('account.bankcash.party_receive.form')->with(compact('partyreceive'));
    }




    /** --------------- Update partyreceive
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
           
            'date'  => 'required',
            'amount'  => 'required | integer',
            'party'  => 'required',
            'method' => 'required'

           
        ]);

        
        $data = $request->all();

        $partyreceive = PartyReceive::find($key)->update($data);

        return to_route('partyreceive')->with('success', 'Record updated successfully');
    }



    /** --------------- Update partyreceive
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $partyreceive = PartyReceive::destroy($key);

        return to_route('partyreceive')->with('success', 'Record deleted successfully');
    }

}
