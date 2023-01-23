<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Leave;

class LeaveController extends Controller
{
    /** --------------- Leave data table
     * =============================================*/
    public function show()
    { 
        $leave = Leave::where('status', true)->latest()->get();

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

        $leave = Leave::create($data);

        return to_route('leave')->with('success', 'Record created successfully');
    }


    
    /** --------------- leave data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $leave = Leave::find($key);

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

        $leave = Leave::find($key)->update($data);

        return to_route('leave')->with('success', 'Record updated successfully');
    }



    /** --------------- Update leave
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $leave = Leave::destroy($key);

        return to_route('leave')->with('success', 'Record deleted successfully');
    }

}
