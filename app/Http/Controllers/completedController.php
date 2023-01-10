<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\order;

class completedController extends Controller
{
    /** --------------- Completed Order data table
     * =============================================*/
    public function show()
    {
        $companyId = auth()->user()->company_id;

        $records = order::where(['company_id'    => $companyId,])
                          ->where('status','>', 1)->latest()->get();

        return view('sales.completedOrder.table')->with(compact('records'));
    }




    /** --------------- delete order
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $order = order::destroy($key);

        return to_route('completed')->with('success', 'Record deleted successfully');
    }
    

}
