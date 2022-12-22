<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\ProductionPerDay;
use App\Models\order;

class ProductionPerPartyController extends Controller
{
    /** --------------- ProductionPerParty data table
     * =============================================*/
    public function show()
    {
       $orderid = order::where('status', true)->latest()->get();
        
        return view('inventory.ProductionPerParty.table')->with(compact('orderid'));
    }



}
