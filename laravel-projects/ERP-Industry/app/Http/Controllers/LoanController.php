<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Loan;

class LoanController extends Controller
{
    /** --------------- loan data table
     * =============================================*/
    public function show()
    { 
        $loan = Loan::where('status', true)->latest()->get();

        return view('account.financial.loan.table')->with(compact('loan'));
    }


    /** --------------- loan data table
     * =============================================*/
    public function create()
    {
        return view('account.financial.loan.form');
    }



    /** --------------- Store loan
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
           
            'date'  => 'required',
            'amount'  => 'required|integer',
            'note'  => 'required',
            'name'  => 'required',
            'employee_id' => 'required'

           
        ]);

        $data = $request->all();

        $loan = loan::create($data);

        return to_route('loan')->with('success', 'Record created successfully');
    }


    
    /** --------------- loan data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $loan = Loan::find($key);

        return view('account.financial.loan.form')->with(compact('loan'));
    }




    /** --------------- Update loan
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        // $request->validate([
        //     'name'  => 'required|unique:loans,name,'. $key .',id',
        //     'email'  => 'required|email|unique:loans,email,'. $key .',id',
        //     'phone'  => 'required|unique:loans,phone,'. $key .',id',
        //     'image' => 'nullable|mimes:jpg,jpeg,png'
        // ]);

        
        $data = $request->all();

        $loan = Loan::find($key)->update($data);

        return to_route('loan')->with('success', 'Record updated successfully');
    }



    /** --------------- Update loan
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $loan = Loan::destroy($key);

        return to_route('loan')->with('success', 'Record deleted successfully');
    }

}
