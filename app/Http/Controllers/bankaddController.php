<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\bankadd;

class bankaddController extends Controller
{
    /** --------------- bankadd data table
     * =============================================*/
    public function show()
    {
        $bankadd = bankadd::where('status', true)->latest()->get();

        return view('account.financial.bankadd.table')->with(compact('bankadd'));
    }


    /** --------------- bankadd data table
     * =============================================*/
    public function create()
    {
        return view('account.financial.bankadd.form');
    }



    /** --------------- Store bankadd
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'bank_name'  => 'required',
            'branch'  => 'required',
            'account_number'  => 'required|unique:bankadds,account_number',
            'account_type'  => 'required',
            'account_holder'  => 'required',
           
        ]);

        $data = $request->all();

        $bankadd = bankadd::create($data);

        return to_route('bankadd')->with('success', 'Record created successfully');
    }


    
    /** --------------- bankadd data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $bankadd = bankadd::find($key);

        return view('account.financial.bankadd.form')->with(compact('bankadd'));
    }




    /** --------------- Update bankadd
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        // $request->validate([
        //     'name'  => 'required|unique:bankadd,name,'. $key .',id',
        //     'email'  => 'required|email|unique:bankadd,email,'. $key .',id',
        //     'phone'  => 'required|unique:bankadd,phone,'. $key .',id',
        //     'image' => 'nullable|mimes:jpg,jpeg,png'
        // ]);

        
        $data = $request->all();

        $bankadd = bankadd::find($key)->update($data);

        return to_route('bankadd')->with('success', 'Record updated successfully');
    }



    /** --------------- Update bankadd
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $bankadd = bankadd::destroy($key);

        return to_route('bankadd')->with('success', 'Record deleted successfully');
    }

}
