<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class CompletedController extends Controller
{
    /** --------------- Completed Order data table
     * =============================================*/
    public function show()
    {
        $companyId = auth()->user()->company_id;

        $records = Order::where(['company_id'    => $companyId,])
                          ->where('status','>', 1)->latest()->get();

        return view('sales.completedOrder.table')->with(compact('records'));
    }




    /** --------------- delete order
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $order = Order::destroy($key);

        return to_route('completed')->with('success', 'Record deleted successfully');
    }
    

}
