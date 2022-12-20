<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\expense;

class expenseController extends Controller
{
    /** --------------- expense data table
     * =============================================*/
    public function show()
    { 
        $expense = expense::where('status', true)->latest()->get();

        return view('account.bankcash.expenses.table')->with(compact('expense'));
    }


    /** --------------- expense data table
     * =============================================*/
    public function create()
    {
        return view('account.bankcash.expenses.form');
    }



    /** --------------- Store expense
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
           
            'datee'  => 'required',
            'amount'  => 'required',
            'purpose'  => 'required',
            'payment_method' => 'required'

           
        ]);

        $data = $request->all();

        $expense = expense::create($data);

        return to_route('expense')->with('success', 'Record created successfully');
    }


    
    /** --------------- expense data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $expense = expense::find($key);

        return view('account.bankcash.expenses.form')->with(compact('expense'));
    }




    /** --------------- Update expense
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
           
            'datee'  => 'required',
            'amount'  => 'required',
            'purpose'  => 'required',
            'payment_method' => 'required'

           
        ]);

        
        $data = $request->all();

        $expense = expense::find($key)->update($data);

        return to_route('expense')->with('success', 'Record updated successfully');
    }



    /** --------------- Update expense
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $expense = expense::destroy($key);

        return to_route('expense')->with('success', 'Record deleted successfully');
    }

}
