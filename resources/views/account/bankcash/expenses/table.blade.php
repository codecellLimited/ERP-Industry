@extends('layouts.app')

@section('page_title', 'Expenses')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Expenses List</h1>
        <a href="{{ route('expense.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add new expense
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body  table-responsive">
            <table class="table table-striped table-hover data-table" style="color:black;">
            @section('page_title', 'Expense list')
                <thead>
                    <tr style="color:black;">
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Expense Purpose</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Account No</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expense as $key => $item)
                    <tr style="color:black;">
                        <th scope="row" >{{++$key}}</th>
                        <td>{{$item->datee}}</td>
                        <td>{{$item->purpose}}</td>
                        <td>{{$item->payment_method}}</td>
                        <td>{{$item->amount}}</td>
                        <td>{{ \App\Models\bankadd::find($item->account)->account_number ?? "Hand Cash"}}</td>
                        <td>{{$item->remark}}</td>
                        <td class="text-nowrap">
                             <a href="{{ route('expense.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('expense/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button> 
                        </td>
                        
                    </tr>
                    @empty
                    <div class="col-12 py-5 text-center">
                        <h4 class="text-muted"><b>No expense List</b></h4>
                    </div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>







@endsection()