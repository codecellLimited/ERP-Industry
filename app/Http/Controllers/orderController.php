<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\party;
use App\Models\order;
use App\Models\product;

class OrderController extends Controller
{
    /** --------------- show data table
     * =============================================*/
    public function show()
    {
        $companyId = auth()->user()->company_id;

        $records = order::where([
                        'company_id'    => $companyId,
                    ])
                    ->latest()
                    ->get();

        return view('party.order.table')->with(compact('records'));
    }



    /** --------------- search records
     * =============================================*/
    public function search(Request $request)
    {
        // return $request;
        $searchItem = $request->search;
        $companyId  = auth()->user()->company_id;

        if(empty($searchItem))
        {
            return to_route('party.list');
        }

        $parties = Party::where('company_id', $companyId)
                    // ->where('name', 'like', "%{$searchItem}%")
                    // ->orWhere('email', 'like', "%{$searchItem}%")
                    // ->orWhere('phone', 'like', "%{$searchItem}%")
                    ->where('company', 'like', "%{$searchItem}%")
                    ->latest()
                    ->simplePaginate(20);
                    
        return view('party.order.table')->with(compact('parties', 'searchItem'));
    }



    /** --------------- show create form
     * =============================================*/
    public function create()
    {
        $companyId = auth()->user()->company_id;

        $order = order::where('company_id', $companyId)->get();
        $parties = party:: where('company_id', $companyId)->where('status', true)->get();
        $product = product:: where('company_id', $companyId)->where('status', true)->get();

        return view('party.order.form')->with(compact('order','parties','product'));
    }



    /** --------------- Store data
     * =============================================*/
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'party_id'              => 'required',
            'order_date'            => 'required',
            'order_delivery_date'   => 'required',
            'image'                 => 'nullable|mimes:jpg,jpeg,png'
        ]);

        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('orders'), $FileName);

            // save into database
            $path = 'orders/' . $FileName;

            $data['image'] = $path;
        }

        for($i=0; $i < count($request->name); $i++)
        {
            $details[] = [
                'name' => $request->name[$i],
                'quantity'      => $request->quantity[$i],
                'unit'          => $request->unit[$i],
                'unit_price'    => $request->unit_price[$i],
                'discount'      => $request->discount[$i] ?? 0,
                'sub_total'     => $request->sub_total[$i],
            ];
        }
        

        $data['data'] = json_encode($details);
        $data['company_id'] = auth()->user()->company_id;
        
        $suppliers = order::create($data);

        return to_route('order')->with('success', 'Record created successfully');
    }


    
    /** --------------- show edit form
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $companyId = auth()->user()->company_id;

        $parties = Party::where('company_id', $companyId)->get();
        $record = order::where('company_id', $companyId)->find($key);

        return view('party.order.form')->with(compact('record', 'parties'));
    }



    /** --------------- Update data
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'party_id'              => 'required',
            'order_date'            => 'required',
            'order_delivery_date'   => 'required',
            'image'                 => 'nullable|mimes:jpg,jpeg,png'
        ]);

        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('orders'), $FileName);

            // save into database
            $path = 'orders/' . $FileName;

            $data['image'] = $path;
        }

        for($i=0; $i < count($request->product); $i++)
        {
            $details[] = [
                'product' => $request->product[$i],
                'quantity'      => $request->quantity[$i],
                'unit'          => $request->unit[$i],
                'unit_price'    => $request->unit_price[$i],
                'discount'      => $request->discount[$i] ?? 0,
                'sub_total'     => $request->sub_total[$i],
            ];
        }
        

        $data['data'] = json_encode($details);
        $data['company_id'] = auth()->user()->company_id;
    

        $suppliers = order::find($key)->update($data);

        return to_route('order')->with('success', 'Record updated successfully');
    }



    /** --------------- delete data
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $party = order::destroy($key);

        return back()->with('success', 'Record deleted successfully');
    }



    /**-------------------- Update Status
     * ===================================================*/
    public function updateStatus(Request $request)
    {
        $key = $request->key;
        $companyId = auth()->user()->company_id;

        $row = order::where([
                    'company_id'    =>  $companyId,
                    'id'            =>  $key,
                ]);

        if($row->exists())
        {
            if($row->first()->status) // if status == 1
            {
                $row->update(['status'  =>  false]);
            }
            else    // if status == 0
            {
                $row->update(['status'  =>  true]);
            }

            return back()->with('success', 'Record updated successfully');
        }

        return back()->with('error', 'Something went wrong. Please try again after login');
    }



    /**-------------------- Invoice
     * ===================================================*/
    public function invoice(Request $request)
    {
        $key = $request->key;
        $companyId = auth()->user()->company_id;

        $row = order::where([
                    'company_id'    =>  $companyId,
                    'id'            =>  $key,
                ]);

        if($row->exists())
        {
            $record = $row->first();

            return view('order.invoice')->with(compact('record'));
        }

        return back()->with('error', 'Something went wrong. Please try again after login');
    }





}
