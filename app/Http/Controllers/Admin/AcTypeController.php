<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcType;
use Illuminate\Http\Request;

class AcTypeController extends Controller
{
    /** show records */
    public function showList()
    {
        return redirect()->route('admin.content.list');
    }


    /** show create page */
    public function showCreatePage()
    {
        return view('admin.ac-type.form');
    }


    /** create records */
    public function create(Request $request)
    {
        $request->validate([
            'image'             => 'image|mimes:jpg,jpeg,png,webp',
            'type'              =>  'required|unique:ac_types,type',
        ]);


        $data = $request->all();
        $data['slug'] = strtolower(\Str::random(10));


        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('images/actypes'), $FileName);

            // save into database
            $path = 'images/actypes/' . $FileName;

            $data['image'] = $path;
        }

        $create = AcType::create($data);        

        return to_route('admin.content.list')->with('success', 'Record created successfully');
    }



    /** show update page */
    public function showUpdatePage(Request $request)
    {

        if($row = AcType::find($request->key))
        {
            return view('admin.ac-type.form')->with(compact('row'));
        }

        return back()->with('error', 'Record does not exists');
    }


    /** update Product */
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'image'         => 'nullable|mimes:jpg,jpeg,png,webp',
        ]);

        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('images/actypes'), $FileName);

            // save into database
            $path = 'images/actypes/' . $FileName;

            $data['image'] = $path;
        }

        AcType::find($key)->update($data);

       
        return to_route('admin.content.list')->with('success', 'Content updated successfully');
    }




    /** record remove from database */
    public function destroy(Request $request)
    {
        $key = $request->key;

        if($row = AcType::find($key))
        {
            if($row->delete())
            {
                return back()->with('success', 'Content remove successfully');
            }
            return back()->with('info', 'Something went wrong. Please try again');            
        }

        return back()->with('error', 'Record does not exists');
    }



    /** status update */
    public function updateStatus(Request $request)
    {
        $key = $request->key;

        if($row = AcType::find($key))
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
