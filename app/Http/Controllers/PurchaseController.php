<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Material;
use App\Models\Transection;

class PurchaseController extends Controller
{
    /** --------------- show data table
     * =============================================*/
    public function show()
    {
        $companyId = auth()->user()->company_id;

        $records = Purchase::where([
                        'company_id'    => $companyId,
                    ])
                    ->latest()
                    ->get();

        return view('supplier.materialPurchase.table')->with(compact('records'));
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

        $supplier = Supplier::where('company_id', $companyId)
                    // ->where('name', 'like', "%{$searchItem}%")
                    // ->orWhere('email', 'like', "%{$searchItem}%")
                    // ->orWhere('phone', 'like', "%{$searchItem}%")
                    ->where('company', 'like', "%{$searchItem}%")
                    ->latest()
                    ->simplePaginate(20);
                    
        return view('supplier.materialPurchase.table')->with(compact('supplier', 'searchItem'));
    }



    /** --------------- show create form
     * =============================================*/
    public function create()
    {
        $companyId = auth()->user()->company_id;

        $purchase = Purchase::where('company_id', $companyId)->get();
        $supplier = Supplier:: where('company_id', $companyId)->where('status', true)->get();
        $material = Material:: where('company_id', $companyId)->where('status', true)->get();

        return view('supplier.materialPurchase.form')->with(compact('purchase','supplier','material'));
    }



    /** --------------- Store data
     * =============================================*/
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'supplier_id'              => 'required',
            'purchase_date'            => 'required',
            'image'                 => 'nullable|mimes:jpg,jpeg,png,webp'
        ]);

        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('purchases'), $FileName);

            // save into database
            $path = 'purchases/' . $FileName;

            $data['image'] = $path;
        }

        for($i=0; $i < count($request->name); $i++)
        {
            $details[] = [
                'name'          => $request->name[$i],
                'quantity'      => $request->quantity[$i],
                'unit'          => $request->unit[$i],
                'unit_price'    => $request->unit_price[$i],
                'discount'      => $request->discount[$i] ?? 0,
                'sub_total'     => $request->sub_total[$i],
            ];
        }
        

        $data['data'] = json_encode($details);
        $data['company_id'] = auth()->user()->company_id;
        
       $suppliers = Purchase::create($data);

        return to_route('purchase')->with('success', 'Record created successfully');
    }

    
    /** --------------- show edit form
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $companyId = auth()->user()->company_id;

        $supplier = Supplier::where('company_id', $companyId)->get();
        $record = Purchase::where('company_id', $companyId)->find($key);

        return view('supplier.materialPurchase.form')->with(compact('record', 'supplier'));
    }



    /** --------------- Update data
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'supplier_id'              => 'required',
            'purchase_date'            => 'required',
            'image'                 => 'nullable|mimes:jpg,jpeg,png,webp'
        ]);

        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('purchases'), $FileName);

            // save into database
            $path = 'purchases/' . $FileName;

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
    
        //return $data;
        $suppliers = Purchase::find($key)->update($data);

        return to_route('purchase')->with('success', 'Record updated successfully');
    }



    /** --------------- delete data
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $supplier = Material::destroy($key);

        return back()->with('success', 'Record deleted successfully');
    }



    /**-------------------- Update Status
     * ===================================================*/
    public function updateStatus(Request $request)
    {
        $key = $request->key;
        $status = $request->status;
        $companyId = auth()->user()->company_id;

        $row = Purchase::where([
                    'company_id'    =>  $companyId,
                    'id'            =>  $key,
                ]);

        if($row->exists())
        {
            if($status == 1) 
            {
                $row->update(['status'  =>  1]);
            }
            else if($status == 2)
            {
                $row->update(['status' => 2]);
            }
            else    
            {
                $row->update(['status'  =>  0]);
            }
        
            return back()->with('success', 'Record updated successfully');
        }

        return back()->with('error', 'Something went wrong. Please try again after login');
    }


    
    /** --------------- invoice 
     * =============================================*/
    public function view(Request $request){
        $key = $request->key;

        $companyId = auth()->user()->company_id;
        $suppliers = Supplier::where('company_id', $companyId)->get();
        $record = Purchase::find($key);
        $supplier = Supplier:: find($record->supplier_id);
        $transection = Transection:: where('order_id',$record->id)->get();


        return view('supplier.materialPurchase.invoice')->with(compact('supplier','suppliers','record','transection'));
    }


    /**---------get due in transection page --------
     ===============================================*/
     public function getPurchaseDue(Request $request)
     {
         $companyId = auth()->user()->company_id;
         $key = $request->key;
         $html = 0;
 
         if($purchase = Purchase::find($key))
         {
             $html = $purchase->due;
         }
 
         return $html;
     }

}
