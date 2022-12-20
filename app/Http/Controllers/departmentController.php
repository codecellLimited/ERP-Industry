<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\department;

class departmentController extends Controller
{
    /** --------------- departments data table
     * =============================================*/
    public function show()
    {
        $departments = department::where('status', true)->latest()->get();

        return view('HR.department.table')->with(compact('departments'));
    }


    /** --------------- departments data table
     * =============================================*/
    public function create()
    {
        return view('HR.department.form');
    }



    /** --------------- Store departments
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:departments,name',
        ]);

        $data = $request->all();

        
        $department = department::create($data);

        return to_route('department')->with('success', 'Record created successfully');
    }


    
    /** --------------- edit departments data
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $department = department::find($key);

        return view('HR.department.form')->with(compact('department'));
    }




    /** --------------- Update departments
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'name'  => 'required|unique:departments,name,'. $key .',id',
        ]);

        
        $data = $request->all();

        
        $department = department::find($key)->update($data);

        return to_route('department')->with('success', 'Record updated successfully');
    }



    /** --------------- delete department
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $department = department::destroy($key);

        return to_route('department')->with('success', 'Record deleted successfully');
    }

}
