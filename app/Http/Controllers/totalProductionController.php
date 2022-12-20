<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\ProductionPerDay;
use App\Models\order;
use App\Models\Product;
use Carbon\Carbon;

class totalProductionController extends Controller
{
    /** --------------- Total Production data table
     * =============================================*/
    public function show()
    {
        $productId = Product::where('status', true)->latest()->get();
        
        return view('inventory.totalProduction.table')->with(compact('productId'));
    }

    public function fixedDate(Request $request)
    {
        $startdate= $request->startdate;
        $enddate= $request->enddate;

        $datebetween = Product::where('status', true)->latest()->get();

        return view('inventory.totalProduction.table')->with(compact('datebetween','startdate','enddate'));
    }

    



}
