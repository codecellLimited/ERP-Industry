<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Supplier;
use App\Models\Purchase;

class SupplierController extends Controller
{
    /** --------------- Suppliers data table
     * =============================================*/
    public function show()
    {
        $suppliers = Supplier::where('status', true)->latest()->get();

        return view('supplier.supplier.table')->with(compact('suppliers'));
    }


    /**--view profile-- */
    public function profile(Request $request){
        $key = $request->key;
        $Suppliers = Supplier:: find($key);

        $records = Purchase:: where('supplier_id',$key)->get();

        return view('supplier.supplier.profile')->with(compact('Suppliers','records'));
    }


    /** --------------- Suppliers data table
     * =============================================*/
    public function create()
    {
        return view('supplier.supplier.form');
    }



    /** --------------- Store Suppliers
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:suppliers,name',
            'email'  => 'required|email|unique:suppliers,email',
            'phone'  => 'required|unique:suppliers,phone',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp'
        ]);

        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('suppliers'), $FileName);

            // save into database
            $path = 'suppliers/' . $FileName;

            $data['image'] = $path;
        }

        $suppliers = Supplier::create($data);

        return to_route('suppliers')->with('success', 'Record created successfully');
    }


    
    /** --------------- Suppliers data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $supplier = Supplier::find($key);

        return view('supplier.supplier.form')->with(compact('supplier'));
    }




    /** --------------- Update Suppliers
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'name'  => 'required',
            'email'  => 'required|email|unique:suppliers,email,'. $key .',id',
            'phone'  => 'required|unique:suppliers,phone,'. $key .',id',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp'
        ]);

        
        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('suppliers'), $FileName);

            // save into database
            $path = 'suppliers/' . $FileName;

            $data['image'] = $path;
        }

        $suppliers = Supplier::find($key)->update($data);

        return to_route('suppliers')->with('success', 'Record updated successfully');
    }



    /** --------------- Update Suppliers
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $suppliers = Supplier::destroy($key);

        return to_route('suppliers')->with('success', 'Record deleted successfully');
    }

}
