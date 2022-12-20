<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Unit;

class UnitController extends Controller
{
    /** --------------- Units data table
     * =============================================*/
    public function show()
    {
        $Units = Unit::where('status', true)->latest()->get();

        return view('sales.unit.table')->with(compact('Units'));
    }


    /** --------------- Units data table
     * =============================================*/
    public function create()
    {
        return view('sales.unit.form');
    }



    /** --------------- Store Units
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:units,name',
        ]);

        $data = $request->all();

        
        $Unit = Unit::create($data);

        return to_route('Unit')->with('success', 'Record created successfully');
    }


    
    /** --------------- edit Units data
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $Unit = Unit::find($key);

        return view('sales.unit.form')->with(compact('Unit'));
    }




    /** --------------- Update Units
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'name'  => 'required|unique:Units,name,',
        ]);

        
        $data = $request->all();

        
        $Unit = Unit::find($key)->update($data);

        return to_route('Unit')->with('success', 'Record updated successfully');
    }



    /** --------------- delete Unit
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $Unit = Unit::destroy($key);

        return to_route('Unit')->with('success', 'Record deleted successfully');
    }

}
