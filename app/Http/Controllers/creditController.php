<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\credit;

class creditController extends Controller
{
    /** --------------- credit data table
     * =============================================*/
    public function show()
    { 
        $credit = credit::where('status', true)->latest()->get();

        return view('account.financial.creditbalance.table')->with(compact('credit'));
    }


    /** --------------- credit data table
     * =============================================*/
    public function create()
    {
        return view('account.financial.creditbalance.form');
    }



    /** --------------- Store credit
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
           
            'debit_by'  => 'required',
            'amount'  => 'required|integer',
            'pay_via'  => 'required',
           
        ]);

        $data = $request->all();

        
        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('credit'), $FileName);

            // save into database
            $path = 'credit/' . $FileName;

            $data['image'] = $path;
        }

        $credit = credit::create($data);

        return to_route('credit')->with('success', 'Record created successfully');
    }


    
    /** --------------- credit data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $credit = credit::find($key);

        return view('account.financial.creditbalance.form')->with(compact('credit'));
    }




    /** --------------- Update credit
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'debit_by'  => 'required',
            'amount'  => 'required|integer',
            'pay_via'  => 'required',
            
        ]);

        
        $data = $request->all();

        
        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('credit'), $FileName);

            // save into database
            $path = 'credit/' . $FileName;

            $data['image'] = $path;
        }

        $credit = credit::find($key)->update($data);

        return to_route('credit')->with('success', 'Record updated successfully');
    }



    /** --------------- Update credit
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $credit = credit::destroy($key);

        return to_route('credit')->with('success', 'Record deleted successfully');
    }

}
