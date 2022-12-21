<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\order;

class orderController extends Controller
{
    /** --------------- Order data table
     * =============================================*/
    public function show()
    {
        $order = order::latest()->get();

        return view('party.order.table')->with(compact('order'));
    }


    /** --------------- order data table
     * =============================================*/
    public function create()
    {
        return view('party.order.form');
    }



    /** --------------- Store order
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'product_id'  => 'required',
            'party_id'  => 'required',
            'order_date'  => 'required',
            'quantity'  => 'required',
            'unit_id'  => 'required',
            'unit_price'  => 'required',
            'discount'  => 'required',
            'total_discount'  => 'required',
            'grand_total'  => 'required',
            'transport_cost'  => 'required',
            'total_paid'  => 'required',
            'total_due'  => 'required',
            'payment_method'  => 'required',
            'order_note'  => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png'
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

        $order = order::create($data);

        return to_route('order')->with('success', 'Record created successfully');
    }


    
    /** --------------- order data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $order = order::find($key);

        return view('party.order.form')->with(compact('order'));
    }




    /** --------------- Update order
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            
            'party_id'  => 'required',
            'product_id'  => 'required',
            'order_date'  => 'required',
            'order_delivery_date' => 'required',
            'quantity'  => 'required',
            'unit_id'  => 'required',
            'unit_price'  => 'required',
            'discount'  => 'required',
            'total_discount'  => 'required',
            'grand_total'  => 'required',
            'transport_cost'  => 'required',
            'total_paid'  => 'required',
            'total_due'  => 'required',
            'payment_method'  => 'required',
            'order_note'  => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png'
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

        $order = order::find($key)->update($data);

        return to_route('order')->with('success', 'Record updated successfully');
    }



    /** --------------- delete order
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $order = order::destroy($key);

        return to_route('order')->with('success', 'Record deleted successfully');
    }


    /** --------------- Change Status
     * =============================================*/


    public function orderStatus(Request $request)
    {
        $user = order::find($request->key);
        $user->status = $request->status;
        $user->save();
  
        return back();
    }

}
