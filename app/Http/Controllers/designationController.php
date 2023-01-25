<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Designation;

class DesignationController extends Controller
{
    /** --------------- designations data table
     * =============================================*/
    public function show()
    {
        $designations = Designation::where('status', true)->latest()->get();

        return view('HR.designation.table')->with(compact('designations'));
    }


    /** --------------- designations data table
     * =============================================*/
    public function create()
    {
        return view('HR.designation.form');
    }



    /** --------------- Store designations
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:suppliers,name',
        ]);

        $data = $request->all();

        
        $designation = Designation::create($data);

        return to_route('designation')->with('success', 'Record created successfully');
    }


    
    /** --------------- edit designations data
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $designation = Designation::find($key);

        return view('HR.designation.form')->with(compact('designation'));
    }




    /** --------------- Update designations
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'name'  => 'required|unique:designations,name,'. $key .',id',
        ]);

        
        $data = $request->all();

        
        $designation = Designation::find($key)->update($data);

        return to_route('designation')->with('success', 'Record updated successfully');
    }



    /** --------------- delete designation
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $designation = Designation::destroy($key);

        return to_route('designation')->with('success', 'Record deleted successfully');
    }

}
