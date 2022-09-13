<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcTitle;
use Illuminate\Http\Request;

class AcTitleController extends Controller
{
    /** show records */
    public function showList()
    {
        return abort(400);
        // return redirect()->route('admin.content.list');
    }


    /** show update page */
    public function showUpdatePage(Request $request)
    {

        if($row = AcTitle::find($request->key))
        {
            return view('admin.ac-title.form')->with(compact('row'));
        }

        return back()->with('error', 'Record does not exists');
    }


    /** update Product */
    public function update(Request $request)
    {
        $key = $request->key;

        $data = $request->all();

        AcTitle::find($key)->update($data);
       
        return to_route('admin.content.list')->with('success', 'Content updated successfully');
    }




    /** status update */
    public function updateStatus(Request $request)
    {
        $key = $request->key;

        if($row = AcTitle::find($key))
        {
            if($row->status)
            {
                $row->status = (int)false;
                $row->save();

                return back()->with('success', 'Status updated successfully');
            }
            else
            {
                $row->status = (int)true;
                $row->save();

                return back()->with('success', 'Status updated successfully');
            }                       
        }

        return back()->with('error', 'Record does not exists');
    }
}
