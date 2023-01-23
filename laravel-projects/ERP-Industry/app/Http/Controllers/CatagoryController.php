<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Catagory;

class CatagoryController extends Controller
{
    /** --------------- catagorys data table
     * =============================================*/
    public function show()
    {
        $catagorys = Catagory::where('status', true)->latest()->get();

        return view('sales.catagory.table')->with(compact('catagorys'));
    }


    /** --------------- catagorys data table
     * =============================================*/
    public function create()
    {
        return view('sales.catagory.form');
    }



    /** --------------- Store catagorys
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:catagories,name',
        ]);

        $data = $request->all();

        
        $catagory = Catagory::create($data);

        return to_route('catagory')->with('success', 'Record created successfully');
    }


    
    /** --------------- edit catagorys data
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $catagory = Catagory::find($key);

        return view('sales.catagory.form')->with(compact('catagory'));
    }




    /** --------------- Update catagorys
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'name'  => 'required|unique:catagories,name,',
        ]);

        
        $data = $request->all();

        
        $catagory = Catagory::find($key)->update($data);

        return to_route('catagory')->with('success', 'Record updated successfully');
    }



    /** --------------- delete catagory
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $catagory = Catagory::destroy($key);

        return to_route('catagory')->with('success', 'Record deleted successfully');
    }

}
