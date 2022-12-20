<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\debit;

class debitController extends Controller
{
    /** --------------- debit data table
     * =============================================*/
    public function show()
    { 
        $debit = debit::where('status', true)->latest()->get();

        return view('account.financial.debitbalance.table')->with(compact('debit'));
    }


    /** --------------- debit data table
     * =============================================*/
    public function create()
    {
        return view('account.financial.debitbalance.form');
    }



    /** --------------- Store debit
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
           
            'credit_from'  => 'required',
            'account'  => 'required',
            'amount'  => 'required',
            'received'  => 'required',
           
        ]);

        $data = $request->all();

        $debit = debit::create($data);

        return to_route('debit')->with('success', 'Record created successfully');
    }


    
    /** --------------- debit data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $debit = debit::find($key);

        return view('account.financial.debitbalance.form')->with(compact('debit'));
    }




    /** --------------- Update debit
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        // $request->validate([
        //     'name'  => 'required|unique:debit,name,'. $key .',id',
        //     'email'  => 'required|email|unique:debit,email,'. $key .',id',
        //     'phone'  => 'required|unique:debit,phone,'. $key .',id',
        //     'image' => 'nullable|mimes:jpg,jpeg,png'
        // ]);

        
        $data = $request->all();

        $debit = debit::find($key)->update($data);

        return to_route('debit')->with('success', 'Record updated successfully');
    }



    /** --------------- Update debit
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $debit = debit::destroy($key);

        return to_route('debit')->with('success', 'Record deleted successfully');
    }

}
