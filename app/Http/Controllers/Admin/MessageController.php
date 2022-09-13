<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/** Models */
use App\Models\CustomerMessage as Message;
use App\Models\MessageSubject;

class MessageController extends Controller
{
    /** show List */
    public function showList()
    {
        $data = Message::latest()->get();
        Message::where('status', true)
        ->update([
            'response_by'       => auth()->guard()->id(),
            'status'            => false,
            'read_at'           => now(),
        ]);

        return view('admin.message.index')->with(compact('data'));
    }


    /** store subject */
    public function storeSubject(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:message_subjects,name',
        ]);

        MessageSubject::create([
            'name'              => trim($request->name),
            'name_in_bangla'    => trim($request->name_in_bangla),
        ]);

        return to_route('admin.content.list', 'subject')->with('success', 'Record added successfully');
    }



    /** subject remove from database */
    public function destroy(Request $request)
    {
        $key = $request->key;

        if($row = MessageSubject::find($key))
        {
            if($row->delete())
            {
                return redirect(url('/subject'))->with('success', 'Record remove successfully');
            }
            return to_route('admin.content.list', 'subject')->with('info', 'Something went wrong. Please try again');            
        }

        return to_route('admin.content.list', 'subject')->with('error', 'Record does not exists');
    }



    /** status update */
    public function updateStatus(Request $request)
    {
        $key = $request->key;

        if($row = MessageSubject::find($key))
        {
            if($row->status)
            {
                $row->status = (int)false;
                $row->save();

                return to_route('admin.content.list', 'subject')->with('success', 'Status updated successfully');
            }
            else
            {
                $row->status = (int)true;
                $row->save();

                return to_route('admin.content.list', 'subject')->with('success', 'Status updated successfully');
            }                       
        }

        return to_route('admin.content.list', 'subject')->with('error', 'Record does not exists');
    }
}
