<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\leave;

class leaveController extends Controller
{
    /** --------------- leave data table
     * =============================================*/
    public function show()
    { 
        $leave = leave::where('status', true)->latest()->get();

        return view('HR.leave.table')->with(compact('leave'));
    }


    /** --------------- leave data table
     * =============================================*/
    public function create()
    {
        return view('HR.leave.form');
    }



    /** --------------- Store leave
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
           
            'date_from'  => 'required',
            'date_to'  => 'required',
            'total_days'  => 'required',
            'name'  => 'required',
            'employee_id' => 'required',
            'remark' => 'nullable'

           
        ]);

        $data = $request->all();

        $leave = leave::create($data);

        return to_route('leave')->with('success', 'Record created successfully');
    }


    
    /** --------------- leave data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $leave = leave::find($key);

        return view('HR.leave.form')->with(compact('leave'));
    }




    /** --------------- Update leave
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
           
            'date_from'  => 'required',
            'date_to'  => 'required',
            'total_days'  => 'required',
            'name'  => 'required',
            'employee_id' => 'required',
            'remark' => 'nullable'

           
        ]);

        
        $data = $request->all();

        $leave = leave::find($key)->update($data);

        return to_route('leave')->with('success', 'Record updated successfully');
    }



    /** --------------- Update leave
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $leave = leave::destroy($key);

        return to_route('leave')->with('success', 'Record deleted successfully');
    }

}
