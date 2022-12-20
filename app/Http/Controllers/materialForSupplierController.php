<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\materialForSupplier;

class materialForSupplierController extends Controller
{
    /** --------------- materialForSuppliers data table
     * =============================================*/
    public function show()
    {
        $materialForSupplier = materialForSupplier::where('status', true)->latest()->get();

        return view('supplier.materialForSupplier.table')->with(compact('materialForSupplier'));
    }


    /** --------------- materialForSuppliers data table
     * =============================================*/
    public function create()
    {
        return view('supplier.materialForSupplier.form');
    }



    /** --------------- Store materialForSuppliers
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'image' => 'nullable | mimes: jpg,jpeg,png'
        ]);

        $data = $request->all();

        
        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('materialForSupplier'), $FileName);

            // save into database
            $path = 'materialForSupplier/' . $FileName;

            $data['image'] = $path;
        }
        
        $materialForSupplier = materialForSupplier::create($data);

        return to_route('materialForSupplier')->with('success', 'Record created successfully');
    }


    
    /** --------------- edit materialForSuppliers data
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $materialForSupplier = materialForSupplier::find($key);

        return view('supplier.materialForSupplier.form')->with(compact('materialForSupplier'));
    }




    /** --------------- Update materialForSuppliers
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'name'  => 'required',
            'image' => 'nullable | mimes: jpg,jpeg,png'
        ]);

        
        $data = $request->all();

        
        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('materialForSupplier'), $FileName);

            // save into database
            $path = 'materialForSupplier/' . $FileName;

            $data['image'] = $path;
        }

        $materialForSupplier = materialForSupplier::find($key)->update($data);

        return to_route('materialForSupplier')->with('success', 'Record updated successfully');
    }



    /** --------------- delete materialForSupplier
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $materialForSupplier = materialForSupplier::destroy($key);

        return to_route('materialForSupplier')->with('success', 'Record deleted successfully');
    }

}
