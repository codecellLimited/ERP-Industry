<?php

namespace App\Http\Controllers;

use App\Models\attendance;
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


    public function calculateSalary(Request $request)
    {
        $month = $request->searchmonth;
        $employees = employee::where('status', true)->orderBy('id_no', 'asc')->get();
        $salarys = [];

        foreach($employees as $item){
            $absence = attendance::whereMonth('date', $month)->where('employee_id', $item->id)->where('attendance', 0)->count();
        
            $item['monthly_salary'] = $item->monthly_salary - ($absence * $item->daily_salary);
            $salarys[] = $item;            
        }

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
