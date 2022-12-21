<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\supplierpayment;

class supplierpaymentController extends Controller
{
    /** --------------- supplierpayment data table
     * =============================================*/
    public function show()
    { 
        $supplierpayment = supplierpayment::where('status', true)->latest()->get();

        return view('account.bankcash.supplier_payment.table')->with(compact('supplierpayment'));
    }


    /** --------------- supplierpayment data table
     * =============================================*/
    public function create()
    {
        return view('account.bankcash.supplier_payment.form');
    }



    /** --------------- Store supplierpayment
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
           
            'date'  => 'required',
            'amount'  => 'required | integer',
            'name'  => 'required',
            'method' => 'required'

           
        ]);

        $data = $request->all();

        $supplierpayment = supplierpayment::create($data);

        return to_route('supplierpayment')->with('success', 'Record created successfully');
    }


    
    /** --------------- supplierpayment data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $supplierpayment = supplierpayment::find($key);

        return view('account.bankcash.supplier_payment.form')->with(compact('supplierpayment'));
    }




    /** --------------- Update supplierpayment
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;
        $request->validate([
           
            'date'  => 'required',
            'amount'  => 'required | integer',
            'name'  => 'required',
            'method' => 'required'

           
        ]);
        $data = $request->all();

        $supplierpayment = supplierpayment::find($key)->update($data);

        return to_route('supplierpayment')->with('success', 'Record updated successfully');
    }



    /** --------------- Update supplierpayment
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $supplierpayment = supplierpayment::destroy($key);

        return to_route('supplierpayment')->with('success', 'Record deleted successfully');
    }

}
