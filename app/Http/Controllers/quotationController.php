<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\quotation;


class quotationController extends Controller
{
    /** --------------- quotation data table
     * =============================================*/
    public function show()
    {
        $quotation = quotation::where('status', true)->latest()->get();

        return view('sales.quotation.table')->with(compact('quotation'));
    }


    /** --------------- quotation data table
     * =============================================*/
    public function create()
    {
        return view('sales.quotation.form');
    }



    /** --------------- Store quotation
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([

            'party_id'  => 'required',
            'product_id'  => 'required',
            'quotation_date'  => 'required',
            'quantity'  => 'required | integer',
            'unit_id'  => 'required',
            'unit_price'  => 'required | integer',
            'discount'  => 'required | integer',
            'total_discount'  => 'required | integer',
            'grand_total'  => 'required | integer',
            'total' => 'required | integer',
            'tax' => 'required | integer'
        ]);

        $data = $request->all();

        $quotation = quotation::create($data);

        return to_route('quotation')->with('success', 'Record created successfully');
    }


    
    /** --------------- quotation data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $quotation = quotation::find($key);

        return view('sales.quotation.form')->with(compact('quotation'));
    }




    /** --------------- Update quotation
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            
            'party_id'  => 'required',
            'product_id'  => 'required',
            'quotation_date'  => 'required',
            'quantity'  => 'required | integer',
            'unit_id'  => 'required',
            'unit_price'  => 'required | integer',
            'discount'  => 'required | integer',
            'total_discount'  => 'required | integer',
            'grand_total'  => 'required | integer',
            'total' => 'required | integer',
            'tax' => 'required | integer'
        ]);

        
        $data = $request->all();

        $quotation = quotation::find($key)->update($data);

        return to_route('quotation')->with('success', 'Record updated successfully');
    }



    /** --------------- delete quotation
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $quotation = quotation::destroy($key);

        return to_route('quotation')->with('success', 'Record deleted successfully');
    }

}
