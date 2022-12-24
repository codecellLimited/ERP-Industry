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
        $completed = order::where('status', 2)->latest()->get();

        return view('sales.completedOrder.table')->with(compact('completed'));
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
