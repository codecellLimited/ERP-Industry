<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Employee;

class EmployeeController extends Controller
{
    /** --------------- employee data table
     * =============================================*/
    public function show()
    {
        $employee = Employee::where('status', true)->orderBy('id_no', 'asc')->get();

        return view('HR.employee.table')->with(compact('employee'));
    }


    /** --------------- employee data table
     * =============================================*/
    public function create()
    {
        return view('HR.employee.form');
    }



    /** --------------- Store employee
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'department_id'  => 'required',
            'id_no'  => 'required|unique:employees,id_no',
            'designation_id'  => 'required',
            'work_shift_name'  => 'required',
            'daily_salary'  => 'required|integer',
            'monthly_salary'  => 'required|integer',
            'phone'  => 'required|unique:employees,phone',
            'gender'  => 'required',
            'status'  => 'required',
            'date_of_birth'  => 'required',
            'date_of_joining'  => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'nid_image' => 'nullable|mimes:jpg,jpeg,png',
            'email' =>'nullable|email|unique:employees,email'
        ]);

        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('employee'), $FileName);

            // save into database
            $path = 'Employee/' . $FileName;

            $data['image'] = $path;
        }
        if($request->hasFile('nid_image'))
        {
            $FileName = $request->nid_image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->nid_image->move(public_path('employee'), $FileName);

            // save into database
            $path = 'employee/' . $FileName;

            $data['nid_image'] = $path;
        }

        $employee = Employee::create($data);

        return to_route('employee')->with('success', 'Record created successfully');
    }


    
    /** --------------- employee data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $employee = Employee::find($key);

        return view('HR.employee.form')->with(compact('employee'));
    }




    /** --------------- Update employee
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([

            'name'  => 'required',
            'department_id'  => 'required',
            'id_no'  => 'required',
            'designation_id'  => 'required',
            'branch'  => 'nullable',
            'work_shift_name'  => 'required',
            'daily_salary'  => 'required|integer',
            'monthly_salary'  => 'required|integer',
            'phone'  => 'required',
            'gender'  => 'required',
            'date_of_birth'  => 'required',
            'date_of_joining'  => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'nid_no'=>'nullable',
            'nid_image' => 'nullable|mimes:jpg,jpeg,png,pdf',
            'email'  => 'nullable',
            'marital_status'  => 'nullable',
            'address'  => 'nullable',
            'emergency_name'  => 'nullable',
            'emergency_contact'  => 'nullable',
            'date_of_leave'  => 'nullable',
            'religion'  => 'nullable',

        ]);

        
        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('employee'), $FileName);

            // save into database
            $path = 'employee/' . $FileName;

            $data['image'] = $path;
        }

        if($request->hasFile('nid_image'))
        {
            $FileName = $request->nid_image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->nid_image->move(public_path('employee'), $FileName);

            // save into database
            $path = 'employee/' . $FileName;

            $data['nid_image'] = $path;
        }

        $employee = Employee::find($key)->update($data);

        return to_route('employee')->with('success', 'Record updated successfully');
    }



    /** --------------- Update employee
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $employee = Employee::destroy($key);

        return to_route('employee')->with('success', 'Record deleted successfully');
    }

    public function getemployeename(Request $request){
        $companyId = auth()->user()->company_id;
        $key = $request->key;
        $html = "Not Found";

        if($employee = Employee::where("id_no", $key)->first())
        {
            $html = $employee->name;
        }

        return $html;
    }

}
