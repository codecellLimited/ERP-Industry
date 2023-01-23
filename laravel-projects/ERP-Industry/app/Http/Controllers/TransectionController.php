<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Transection;

class TransectionController extends Controller
{
    /** --------------- transection data table
     * =============================================*/
    public function show()
    { 
        $transection = Transection::where('status', true)->latest()->get();

        return view('account.bankcash.transection.table')->with(compact('transection'));
    }


    /** --------------- transection data table
     * =============================================*/
    public function create()
    {
        return view('account.bankcash.transection.form');
    }



    /** --------------- Store transection
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
           
            'date'  => 'required',
            'amount'  => 'required|integer',
            'purpose'  => 'required',
            'payment_method' => 'required'

           
        ]);

        $data = $request->all();

        $transection = Transection::create($data);

        return to_route('transection')->with('success', 'Record created successfully');
    }


    
    /** --------------- transection data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $transection = Transection::find($key);

        return view('account.bankcash.transection.form')->with(compact('transection'));
    }




    /** --------------- Update transection
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
           
            'date'  => 'required',
            'amount'  => 'required|integer',
            'purpose'  => 'required',
            'payment_method' => 'required'

           
        ]);

        
        $data = $request->all();

        $transection = Transection::find($key)->update($data);

        return to_route('transection')->with('success', 'Record updated successfully');
    }



    /** --------------- Update transection
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $transection = Transection::destroy($key);

        return to_route('transection')->with('success', 'Record deleted successfully');
    }

}
