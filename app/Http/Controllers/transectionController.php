<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\expense;
use App\Models\partyreceive;
use App\Models\supplierpayment;

class transectionController extends Controller
{


    /** --------------- salary data table
     * =============================================*/
    public function show(Request $request)
    {
        
        $expense = expense::where('status', true)->orderBy('created_at', 'desc')->get();
        
        $partyreceive = partyreceive::where('status', true)->orderBy('created_at', 'desc')->get();
        $supplierpayment = supplierpayment::where('status', true)->orderBy('created_at', 'desc')->get();

        
        return view('account.bankcash.bank_transection.table')->with(compact('expense','partyreceive','supplierpayment'));    
        
        
    }

}
