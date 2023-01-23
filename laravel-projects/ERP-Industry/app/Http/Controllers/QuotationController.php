<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quotation;
use App\Models\Party;


class QuotationController extends Controller
{
    /** --------------- quotation data table
     * =============================================*/
    public function show()
    {
        $quotation = Quotation::where('status', true)->latest()->get();

        return view('sales.quotation.table')->with(compact('quotation'));
    }


    /** --------------- quotation data table
     * =============================================*/
    public function create()
    {
        $parties = Party::where('status', true)->get();
        return view('sales.quotation.form')->with(compact('parties'));
    }



    /** --------------- Store quotation
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([

            'party_id'  => 'required',
            'quotation_date'  => 'required',
            'total_price' => 'required ',
        ]);

        $data = $request->all();


        for($i=0; $i < count($request->product_id); $i++)
        {
            $details[] = [
                'product_id'    => $request->product_id[$i],
                'quantity'      => $request->quantity[$i],
                'unit'          => $request->unit[$i],
                'unit_price'    => $request->unit_price[$i],
                'discount'      => $request->discount[$i] ?? 0,
                'sub_total'     => $request->sub_total[$i],
            ];
        }

        
        $data['data'] = json_encode($details);
        $data['company_id'] = auth()->user()->company_id;
        $quotation = Quotation::create($data);

        return to_route('quotation')->with('success', 'Record created successfully');
    }


    
    /** --------------- quotation data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $quotation = Quotation::find($key);

        return view('sales.quotation.form')->with(compact('quotation'));
    }




    /** --------------- Update quotation
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            
            'party_id'  => 'required',
            'quotation_date'  => 'required',
            'total_price' => 'required',

        ]);

        
        $data = $request->all();

        for($i=0; $i < count($request->product_id); $i++)
        {
            $details[] = [
                'product_id'    => $request->product_id[$i],
                'quantity'      => $request->quantity[$i],
                'unit'          => $request->unit[$i],
                'unit_price'    => $request->unit_price[$i],
                'discount'      => $request->discount[$i] ?? 0,
                'sub_total'     => $request->sub_total[$i],
            ];
        }

        $data['data'] = json_encode($details);
        $data['company_id'] = auth()->user()->company_id;
        $quotation = Quotation::find($key)->update($data);

        return to_route('quotation')->with('success', 'Record updated successfully');
    }



    /** --------------- delete quotation
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $quotation = Quotation::destroy($key);

        return to_route('quotation')->with('success', 'Record deleted successfully');
    }

}
