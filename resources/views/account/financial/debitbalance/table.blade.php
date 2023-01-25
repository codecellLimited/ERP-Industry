@extends('layouts.app')

@section('page_title', 'transections')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Debit Balance History</h1>
        
    </div>

    <div class="card shadow">
        <div class="card-body  table-responsive">
            <table class="table table-striped table-hover data-table" style="color:black;">
            @section('page_title', 'transection list')
                <thead>
                    <tr style="color:black;">
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Order Number</th>
                        <th scope="col">Supplier Name</th>
                        <th scope="col">Account No</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Remark</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transection as $key => $item)
                    <tr style="color:black;">
                        <th scope="row" >{{++$key}}</th>
                        <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                        
                        <td>{{$item->order_id}}</td>
                        <td>{{\App\Models\Supplier::find($item->supplier_id)?->name}}</td>
                        <td>{{ \App\Models\Bankadd::find($item->account)->account_number ?? $item->bearer }}</td>
                        <td>{{$item->amount}}</td>
                        
                        <td>{{$item->remark}}</td>
                        
                        
                    </tr>
                    @empty
                    <div class="col-12 py-5 text-center">
                        <tr>
                            <td colspan="8" style="text-align: center;">No record found</td>
                        </tr>
                    </div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>







@endsection()