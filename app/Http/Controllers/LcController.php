<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Lc;

class LcController extends Controller
{
    /** --------------- lc data table
     * =============================================*/
    public function show()
    { 
        $lc = lc::where('status', true)->latest()->get();

        return view('account.bankcash.LC.table')->with(compact('lc'));
    }


    /** --------------- lc data table
     * =============================================*/
    public function create()
    {
        return view('account.bankcash.LC.form');
    }



    /** --------------- Store lc
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
           
            'pi_number'  => 'required',
            'pi_date'  => 'required',
            'pi_value'  => 'required',
            'party_id'  => 'required',
            'received_bdt'  => 'required',
            'status_bdt'  => 'required',
            'lc_number'  => 'required',
            'lc_date'  => 'required',
            'bank_id'  => 'required',
            'maturity_date' => 'required',
            'submitted_date' => 'required',
            'ldbc_number' => 'required',
            'purchase_amount' => 'required'

           
        ]);

        $data = $request->all();

        $lc = lc::create($data);

        return to_route('lc')->with('success', 'Record created successfully');
    }


    
    /** --------------- lc data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $lc = lc::find($key);

        return view('account.bankcash.LC.form')->with(compact('lc'));
    }




    /** --------------- Update lc
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;
        
        $request->validate([
           
            'pi_number'  => 'required',
            'pi_date'  => 'required',
            'pi_value'  => 'required',
            'party_id'  => 'required',
            'received_bdt'  => 'required',
            'status_bdt'  => 'required',
            'lc_number'  => 'required',
            'lc_date'  => 'required',
            'bank_id'  => 'required',
            'maturity_date' => 'required',
            'submitted_date' => 'required',
            'ldbc_number' => 'required',
            'purchase_amount' => 'required'

           
        ]);

        
        $data = $request->all();

        $lc = lc::find($key)->update($data);

        return to_route('lc')->with('success', 'Record updated successfully');
    }



    /** --------------- Update lc
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $lc = lc::destroy($key);

        return to_route('lc')->with('success', 'Record deleted successfully');
    }

}
