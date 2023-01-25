<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sanction;


class SanctionController extends Controller
{
    /** --------------- sanction data table
     * =============================================*/
    public function show()
    {
        $sanction = Sanction::latest()->get();

        return view('sales.sanction_payment.table')->with(compact('sanction'));
    }

    /** --------------- sanction data table
     * =============================================*/
    public function showaccount()
    {
        $sanction = Sanction::where('status','>',1)->latest()->get();

        return view('account.sanction_payment.table')->with(compact('sanction'));
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

        $sanction = Sanction::create($data);

        return to_route('sanction')->with('success', 'Record created successfully');
    }


    
    /** --------------- sanction data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $sanction = Sanction::find($key);

        return view('sales.sanction_payment.form')->with(compact('sanction'));
    }




    /** --------------- Update sanction
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([

            'purpose'  => 'required',
            'amount' => 'required | integer',
            'sanction_date' => 'required'
        ]);
        
        $data = $request->all();

        $sanction = Sanction::find($key)->update($data);

        return to_route('sanction')->with('success', 'Record updated successfully');
    }



    /** --------------- delete sanction
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $sanction = Sanction::destroy($key);

        return to_route('sanction')->with('success', 'Record deleted successfully');
    }


    /** --------------- Change Status
     * =============================================*/


     public function sanctionStatus(Request $request)
     {
         $user = Sanction::find($request->key);
         $user->status = $request->status;
         $user->save();
   
         return back();
     }


}
