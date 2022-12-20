<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\sanction;


class sanctionController extends Controller
{
    /** --------------- sanction data table
     * =============================================*/
    public function show()
    {
        $sanction = sanction::where('status', true)->latest()->get();

        return view('sales.sanction_payment.table')->with(compact('sanction'));
    }


    /** --------------- sanction data table
     * =============================================*/
    public function create()
    {
        return view('sales.sanction_payment.form');
    }



    /** --------------- Store sanction
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([

            'purpose'  => 'required',
            'amount' => 'required',
            'sanction_date' => 'required'
        ]);

        $data = $request->all();

        $sanction = sanction::create($data);

        return to_route('sanction')->with('success', 'Record created successfully');
    }


    
    /** --------------- sanction data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $sanction = sanction::find($key);

        return view('sales.sanction_payment.form')->with(compact('sanction'));
    }




    /** --------------- Update sanction
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([

            'purpose'  => 'required',
            'amount' => 'required',
            'sanction_date' => 'required'
        ]);

        
        $data = $request->all();

        $sanction = sanction::find($key)->update($data);

        return to_route('sanction')->with('success', 'Record updated successfully');
    }



    /** --------------- delete sanction
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $sanction = sanction::destroy($key);

        return to_route('sanction')->with('success', 'Record deleted successfully');
    }

}
