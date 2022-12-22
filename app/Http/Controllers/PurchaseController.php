<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**Models*/
use App\Models\Purchase;

class PurchaseController extends Controller
{
     /** --------------- Purchase data table
     * =============================================*/
    function show()
    {
        $purchase = purchase::where('status', true)->latest()->get();

        return view('supplier.materialPurchase.table')->with(compact('purchase'));
    }


    /** --------------- Purchase data table
     * =============================================*/
    public function create()
    {
        return view('supplier.materialPurchase.form');
    }



    /** --------------- Store Purchase
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'material_id'  => 'required',
            'supplierID'  => 'required',
            'purchase_date'  => 'required',
            'quantity'  => 'required | integer',
            'unit_id'  => 'required',
            'unit_price'  => 'required | integer',
            'discount'  => 'required | integer',
            'total_discount'  => 'required | integer',
            'grand_total'  => 'required | integer',
            'transport_cost'  => 'required | integer',
            'total_paid'  => 'required | integer',
            'total_due'  => 'required | integer',
            'payment_method'  => 'required',
            'purchase_note'  => 'required',
        ]);

        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('upload'), $FileName);

            // save into database
            $path = 'upload/' . $FileName;

            $data['image'] = $path;
        }

        $purchases = purchase::create($data);

        return to_route('purchase')->with('success', 'Record created successfully');
    }


    
    /** --------------- Purchase data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $purchase = purchase::find($key);

        return view('supplier.materialPurchase.form')->with(compact('purchase'));
    }




    /** --------------- Update Purchase
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'material_id'  => 'required',
            'supplierID'  => 'required',
            'purchase_date'  => 'required',
            'quantity'  => 'required | integer',
            'unit_id'  => 'required',
            'unit_price'  => 'required | integer',
            'discount'  => 'required | integer',
            'total_discount'  => 'required | integer',
            'grand_total'  => 'required | integer',
            'transport_cost'  => 'required | integer',
            'total_paid'  => 'required | integer',
            'total_due'  => 'required | integer',
            'payment_method'  => 'required',
            'purchase_note'  => 'required',
        ]);

        
        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('upload'), $FileName);

            // save into database
            $path = 'upload/' . $FileName;

            $data['image'] = $path;
        }

        $purchases = purchase::find($key)->update($data);

        return to_route('purchase')->with('success', 'Record updated successfully');
    }



    /** --------------- delete Purchase
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $purchases = purchase::destroy($key);

        return to_route('supplier.materialPurchase.table')->with('success', 'Record deleted successfully');
    }
}
