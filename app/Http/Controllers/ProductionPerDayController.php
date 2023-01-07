<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\ProductionPerDay;
use App\Models\order;

class ProductionPerDayController extends Controller
{
    /** --------------- ProductionPerDay data table
     * =============================================*/
    public function show()
    {
        $ProductionPerDays = ProductionPerDay::where('status', true)->latest()->get();

        return view('inventory.ProductionPerDay.table')->with(compact('ProductionPerDays'));
    }


    /** --------------- ProductionPerDay data table
     * =============================================*/
    public function create()
    {
        return view('inventory.ProductionPerDay.form');
    }



    /** --------------- Store ProductionPerDay
     * =============================================*/
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([

            'production'=>'required',
            'production_date'=>'required'

        ]);

        


        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('ProductionPerDays'), $FileName);

            // save into database
            $path = 'ProductionPerDays/' . $FileName;

            $data['image'] = $path;
        }

        $ProductionPerDays = ProductionPerDay::create($data);

        return to_route('ProductionPerDay')->with('success', 'Record created successfully');
    }


    
    /** --------------- ProductionPerDay data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $orderid = ProductionPerDay::find($key);
        $quantity = \App\Models\order::find($orderid->order_id)->quantity;
        $record = true;

        // $totalProduction =  \App\Models\ProductionPerDay::where('order_id', $orderid->order_id)->sum('production');
        // $leftProduction = \App\Models\order::where($orderid->order_id,'order_id')->quantity - $totalProduction;

        $totalProduction = ProductionPerDay:: where('order_id', $orderid->order_id)->sum('production');
        $leftProduction = $quantity - $totalProduction;

        return view('inventory.ProductionPerDay.form')->with(compact('orderid', 'record','totalProduction','leftProduction'));
    }




    /** --------------- Update ProductionPerDay
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->orderid;
        $request->validate([

            'production'=>'required',
            'production_date'=>'required'

        ]);

        
        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('ProductionPerDays'), $FileName);

            // creating path using folder name
            $path = 'ProductionPerDays/' . $FileName;

            $data['image'] = $path;
        }

        $ProductionPerDay = ProductionPerDay::find($key)->update($data);

        return to_route('ProductionPerDay')->with('success', 'Record updated successfully');
    }



    /** --------------- Update ProductionPerDay
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $ProductionPerDay = ProductionPerDay::destroy($key);

        return to_route('ProductionPerDay')->with('success', 'Record deleted successfully');
    }

    /** --------------- search ordered item
     * =============================================*/

    public function search(Request $request)
    {
        $key = $request->key;
        if($orderid = order::find($key)):
        $totalProduction = \App\Models\ProductionPerDay:: where('order_id', $orderid->id)->sum('production');
        $leftProduction = $orderid->quantity - $totalProduction;
        return view('inventory.ProductionPerDay.form')->with(compact('orderid', 'totalProduction', 'leftProduction'));
        else:
        return back()->with('error', "Record does not exists");
        endif;

        
    }

}
