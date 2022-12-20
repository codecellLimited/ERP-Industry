<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\attendance;
use App\Models\employee;

class attendanceController extends Controller
{
    /** --------------- attendance data table
     * =============================================*/
    public function show(Request $request)
    {
        $date = $request;
        if(isset($request->searchdate)){
            $attendanceday = attendance::where('status', true)->wheredate('date', $request->searchdate)->orderBy('employee_id', 'asc')->get();
            return view('HR.attendance.table')->with(compact('attendanceday'));
        }
        
        elseif(isset($request->searchmonth)){
            $attendancemonth = attendance::where('status', true)->orderBy('employee_id', 'asc')->get();
            $searchmonth=$request->searchmonth;


            if(isset($request->searchid)){

                
                $request->validate([
                    'searchmonth'  => 'required'        
                ]);

                $searchid=$request->searchid;
                $employee = employee::where('status', true)->orderBy('id_no', 'asc')->get();
                return view('HR.attendance.table')->with(compact('attendancemonth','employee','searchmonth','searchid'));
            }
            else{
 
                $employee = employee::where('status', true)->orderBy('id_no', 'asc')->get();
                return view('HR.attendance.table')->with(compact('attendancemonth','employee','searchmonth'));
            }
           
        }
        
        
        else {
        $attendances = attendance::where('status', true)->get();
        return view('HR.attendance.table')->with(compact('attendances'));    
        }
        
    }


    /** --------------- attendance data table
     * =============================================*/
    public function create()
    {
        $employee = employee:: where('status', true)->orderBy('id_no', 'asc')->get();
        return view('HR.attendance.form')->with(compact('employee'));
    }



    /** --------------- Store attendance
     * =============================================*/
    public function store(Request $request)
    {

        
        

        foreach($request->employee_id as $key => $item)
        {
            attendance::insert([
                'employee_id'   =>  $item,
                'name'          =>  $request->name[$key],
                'attendance'    =>  $request->attendance[$key],
                'date'          =>  $request->date,
            ]);
        }

        // $attendance = attendance::create($data);

        return to_route('attendance')->with('success', 'Record created successfully');
    }

    /** --------------- attendance search by ID
     * =============================================*/
    public function searchid(Request $request)
    {
        $key = $request->key;
        $employee = employee::find($key);

        return view('HR.attendance.form')->with(compact('employee','searchmonth',''));
    }
    


}
