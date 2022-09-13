<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** MOdels */
use App\Models\CustomerMessage;

class SendMessageController extends Controller
{
    //** sendMessageToAdmin */

    public function sendMessageToAdmin(Request $request)
    {
        $request->validate([
            'name'      =>  'nullable|string',
            'email'     =>  'required|email',
            'phone'     =>  'nullable|string',
            'location'     =>  'nullable|string',
            'subject'     =>  'nullable|string',
            'message'     =>  'required|string',
        ]);

        CustomerMessage::create($request->all());

        return back()->with('success', 'Message sent successfully');
        
    }
}
