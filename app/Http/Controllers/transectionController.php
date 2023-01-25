<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Transection;
use App\Models\Order;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Party;

class TransectionController extends Controller
{
    /** --------------- transection data table
     * =============================================*/
    public function showBankTransection()
    { 
        $transection = Transection::where('status', true)->where('payment_method', 2)->latest()->get();

        return view('account.bankcash.bank_transection.table')->with(compact('transection'));
    }

    public function show()
    { 
        $transection = Transection::where('status', true)->latest()->get();

        return view('account.bankcash.transection.table')->with(compact('transection'));
    }


    /** --------------- transection data table
     * =============================================*/
    public function create()
    {
        return view('account.bankcash.transection.form');
    }



    /** --------------- Store transection
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
           
            'date'  => 'required',
            'amount'  => 'required|integer',
            'purpose'  => 'required',
            'payment_method' => 'required'

           
        ]);

        $data = $request->all();
        $transection = Transection::create($data);

        if($request->purpose == 1){
            $oldData =  order::find($request->order_id);
            $currentDue= $oldData->due - $request->amount;
            $oldData->due = $currentDue;
           $oldData ->save();
        }
        else{
                
            $oldData =  purchase::find($request->order_id);
            $currentDue= $oldData->due - $request->amount;
            $oldData->due = $currentDue;
           $oldData ->save();
        }
        
        
        return to_route('transection')->with('success', 'Record created successfully');
    }

    /** --------------- transection data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $transection = Transection::find($key);

        return view('account.bankcash.transection.form')->with(compact('transection'));
    }

    /** --------------- Update transection
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
           
            'date'  => 'required',
            'amount'  => 'required|integer',
            'purpose'  => 'required',
            'payment_method' => 'required'

           
        ]);
        
        $data = $request->all();
        $transection = Transection::find($key)->update($data);

        return to_route('transection')->with('success', 'Record updated successfully');
    }



    /** --------------- Update transection
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $transection = Transection::destroy($key);

        return to_route('transection')->with('success', 'Record deleted successfully');
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

        return view('account.bankcash.transection.invoice')->with(compact('supplier','suppliers','record','purchase','order','party'));
    }

}
