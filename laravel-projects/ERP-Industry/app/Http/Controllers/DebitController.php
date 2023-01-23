<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Debit;

class DebitController extends Controller
{
    /** --------------- debit data table
     * =============================================*/
    public function show()
    { 
        $debit = Debit::where('status', true)->latest()->get();

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
            'amount'  => 'required|integer',
            'received'  => 'required',
           
        ]);

        $data = $request->all();

        $debit = Debit::create($data);

        return to_route('debit')->with('success', 'Record created successfully');
    }


    
    /** --------------- debit data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $debit = Debit::find($key);

        return view('account.financial.debitbalance.form')->with(compact('debit'));
    }




    /** --------------- Update debit
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
           
            'credit_from'  => 'required',
            'account'  => 'required',
            'amount'  => 'required|integer',
            'received'  => 'required',
           
        ]);

        
        $data = $request->all();

        $debit = Debit::find($key)->update($data);

        return to_route('debit')->with('success', 'Record updated successfully');
    }



    /** --------------- Update debit
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $debit = Debit::destroy($key);

        return to_route('debit')->with('success', 'Record deleted successfully');
    }

}
