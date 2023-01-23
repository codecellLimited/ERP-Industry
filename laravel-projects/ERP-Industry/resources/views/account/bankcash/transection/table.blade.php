@extends('layouts.app')

@section('page_title', 'transections')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">transections List</h1>
        <a href="{{ route('transection.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add new transection
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body  table-responsive">
            <table class="table table-striped table-hover data-table" style="color:black;">
            @section('page_title', 'transection list')
                <thead>
                    <tr style="color:black;">
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Transection Purpose</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Account No</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transection as $key => $item)
                    <tr style="color:black;">
                        <th scope="row" >{{++$key}}</th>
                        <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                        <td> @if($item->purpose == 1) Party Receive
                            @elseif($item->purpose == 2) Supplier Payment
                            @else
                            @endif
                        </td>
                        <td>@if( $item->payment_method == 1) Hand Cash
                            @elseif( $item->payment_method == 2) Bank Transiction 
                            @else 
                            @endif
                        </td>
                        <td>{{ \App\Models\Bankadd::find($item->account)->account_number ?? "Hand Cash"}}</td>
                        <td>{{$item->amount}}</td>
                        <td>{{$item->remark}}</td>
                        <td class="text-nowrap">
                             <a href="{{ route('transection.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('transection/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button> 
                        </td>
                        
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