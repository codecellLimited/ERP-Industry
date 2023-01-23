<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Attendance;

class SalaryController extends Controller
{


    /** --------------- salary data table
     * =============================================*/
    public function show(Request $request)
    {
        $salarys = Employee::where('status', true)->orderBy('id_no', 'asc')->get();
        return view('HR.salary.table')->with(compact('salarys'));  
    }



    /** --------------- salary search by ID
     * =============================================*/
    public function searchid(Request $request)
    {
        $key = $request->key;
        $employee = Employee::find($key);

        return view('HR.salary.form')->with(compact('employee','searchmonth',''));
    }

    
    /** --------------- salary search by month
     * =============================================*/

    public function calculateSalary(Request $request)
    {
        $month = $request->searchmonth;
        $employees = Employee::where('status', true)->orderBy('id_no', 'asc')->get();
        $salarys = [];

        foreach($employees as $item){
            $absence = Attendance::whereMonth('date', $month)->where('employee_id', $item->id_no)->where('attendance', 0)->count();
        
            $item['monthly_salary'] = $item->monthly_salary - ($absence * $item->daily_salary);
            $salarys[] = $item;            
        }

        return view('HR.salary.table')->with(compact('salarys'));

    }
    


}
