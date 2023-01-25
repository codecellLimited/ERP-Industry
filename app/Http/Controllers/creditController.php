<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Transection;

class CreditController extends Controller
{
    /** --------------- credit data table
     * =============================================*/
    public function show()
    { 
        $transection = Transection::where('status', true)->where('purpose', 1)->latest()->get();

        return view('account.financial.creditbalance.table')->with(compact('transection'));
    }

}
