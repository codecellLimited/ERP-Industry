<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Transection;
use App\Models\Supplier;
use App\Models\Party;
use App\Models\Order;
use App\Models\Purchase;

class SupplierPaymentController extends Controller
{
    /** --------------- supplierpayment data table
     * =============================================*/
    public function show()
    { 
        $transection = Transection::where('status', true)->where('purpose', 2)->latest()->get();


        return view('account.bankcash.supplier_payment.table')->with(compact('transection'));
    }
    

    /** --------------- invoice 
     * =============================================*/
    public function view(Request $request){
        $key = $request->key;

        $companyId = auth()->user()->company_id;
        $record = Transection::find($key);
        $suppliers = Supplier::where('company_id', $companyId)->get();
        $order = Order::find($record->order_id);
        $purchase = Purchase::find($record->order_id);
        
        $supplier = Supplier:: find($record->supplier_id);
        $party = Party:: find($record->party_id);

        return view('account.bankcash.supplier_payment.invoice')->with(compact('supplier','suppliers','record','purchase','order','party'));
    }

}
