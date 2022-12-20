<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\employee;

class salaryController extends Controller
{


    /** --------------- salary data table
     * =============================================*/
    public function show(Request $request)
    {
        
        $salarys = employee::where('status', true)->orderBy('id_no', 'asc')->get();
        return view('HR.salary.table')->with(compact('salarys'));    
        
        
    }



    /** --------------- salary search by ID
     * =============================================*/
    public function searchid(Request $request)
    {
        $key = $request->key;
        $employee = employee::find($key);

        return view('HR.salary.form')->with(compact('employee','searchmonth',''));
    }
    


}
