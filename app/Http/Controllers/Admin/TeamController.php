<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**models */
use App\Models\Team;

class TeamController extends Controller
{
    /** show records */
    public function showList()
    {
        return redirect()->route('admin.content.list');
    }


    /** show create page */
    public function showCreatePage()
    {
        return view('admin.team.form');
    }


    /** create records */
    public function create(Request $request)
    {
        $request->validate([
            'image'             => 'required|mimes:jpg,jpeg,png,webp',
        ]);


        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('images/profiles'), $FileName);

            // save into database
            $path = 'images/profiles/' . $FileName;

            $data['image'] = $path;
        }

        $create = Team::create($data);        

        return to_route('admin.content.list', 'teams')->with('success', 'Content created successfully');
    }



    /** show update page */
    public function showUpdatePage(Request $request)
    {

       if($row = Team::find($request->key))
        {
            return view('admin.team.form')->with(compact('row'));
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
            $request->image->move(public_path('images/profiles'), $FileName);

            // save into database
            $path = 'images/profiles/' . $FileName;

            $data['image'] = $path;
        }

        Team::find($key)->update($data);

       
        return to_route('admin.content.list', 'teams')->with('success', 'Content updated successfully');
    }



    /** record remove from database */
    public function destroy(Request $request)
    {
        $key = $request->key;

        if($row = Team::find($key))
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

        if($row = Team::find($key))
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
