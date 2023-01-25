<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Transection;

class DebitController extends Controller
{
    /** --------------- debit data table
     * =============================================*/
    public function show()
    { 
        $transection = Transection::where('status', true)->where('purpose', 2)->where('payment_method', 2)->latest()->get();

        return view('account.financial.debitbalance.table')->with(compact('transection'));
    }


}
