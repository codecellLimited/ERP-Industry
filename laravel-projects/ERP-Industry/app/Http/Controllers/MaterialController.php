<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Material;

class MaterialController extends Controller
{
    /** --------------- Materials data table
     * =============================================*/
    public function show()
    {
        $Materials = Material::where('status', true)->latest()->get();

        return view('inventory.Material.table')->with(compact('Materials'));
    }

    
    /** --------------- Material data table
     * =============================================*/
    public function create()
    {
        return view('inventory.Material.form');
    }



    /** --------------- Store Material
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
           
            'name'  => 'required',
            'quantity'  => 'required|integer',
            'quality'  => 'required',
            'unit'  => 'required',
            'supplier_id' => 'required'

           
        ]);

        $data = $request->all();

        $Material = Material::create($data);

        return to_route('Material')->with('success', 'Record created successfully');
    }


    
    /** --------------- Material data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $Material = Material::find($key);

        return view('inventory.Material.form')->with(compact('Material'));
    }




    /** --------------- Update Material
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
           
            'name'  => 'required',
            'quantity'  => 'required|integer',
            'quality'  => 'required',
            'unit'  => 'required',
            'supplier_id' => 'required'

           
        ]);
        
        $data = $request->all();

        $Material = Material::find($key)->update($data);

        return to_route('Material')->with('success', 'Record updated successfully');
    }



    /** --------------- Delete Material
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $Material = Material::destroy($key);

        return to_route('Material')->with('success', 'Record deleted successfully');
    }



    

}
