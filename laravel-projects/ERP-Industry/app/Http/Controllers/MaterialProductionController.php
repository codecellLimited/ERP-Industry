<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\MaterialProduction;
use App\Models\Material;

class MaterialProductionController extends Controller
{
    /** --------------- MaterialProductions data table
     * =============================================*/
    public function show()
    {
        $MaterialProductions = MaterialProduction::where('status', true)->latest()->get();

        return view('inventory.MaterialProduction.table')->with(compact('MaterialProductions'));
    }

    
    /** --------------- MaterialProduction data table
     * =============================================*/
    public function create()
    {
        return view('inventory.MaterialProduction.form');
    }



    /** --------------- Store MaterialProduction
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'quantity'  => 'required | integer',
            'receiver'  => 'required',
            'unit'  => 'required',
        ]);

        $data = $request->all();

        $MaterialProduction = MaterialProduction::create($data);

        return to_route('MaterialProduction')->with('success', 'Record created successfully');
    }


    
    /** --------------- MaterialProduction data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $Materialedit = MaterialProduction::find($key);

        return view('inventory.MaterialProduction.form')->with(compact('Materialedit'));
    }




    /** --------------- Update MaterialProduction
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->MaterialPurchase_id;

        
        $request->validate([
            'quantity'  => 'required | integer',
            'receiver'  => 'required',
            'unit'  => 'required',
        ]);
        
        $data = $request->all();

        $Materialedit = MaterialProduction::find($key)->update($data);

        return to_route('MaterialProduction')->with('success', 'Record updated successfully');
    }



    /** --------------- delete MaterialProduction
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $MaterialProduction = MaterialProduction::destroy($key);

        return to_route('MaterialProduction')->with('success', 'Record deleted successfully');
    }

     
    /** --------------- search MaterialProduction
     * =============================================*/

    public function search(Request $request)
    {
        $key = $request->key;
        $materialid = Material::find($key);

        return view('inventory.MaterialProduction.form')->with(compact('materialid'));
    }

    

    

}

