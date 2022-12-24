@extends('layouts.app')

@section('page_title', 'Party Receive')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Party Receive List</h1>
        <a href="{{ route('partyreceive.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add new Party Receive
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body  table-responsive">
            <table class="table table-striped table-hover data-table" style="color:black;">
            @section('page_title', 'Party Receive list')
                <thead>
                    <tr style="color:black;">
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Party Name</th>
                        <th scope="col">Payment received Method</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Account No</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($partyreceive as $key => $item)
                    <tr style="color:black;">
                        <th scope="row" >{{++$key}}</th>
                        <td>{{ date("d-m-Y", strtotime($item->date)) }}</td>
                        <td>{{Str::upper( \App\Models\party::find($item->party)->name)}}</td>
                       
                        <td>@if($item->method == 1) {{'Hand Cash'}} @else {{'Bank Payment'}}  @endif</td>
                        <td>{{$item->amount}}</td>
                        <td>{{ \App\Models\bankadd::find($item->account)->account_number ?? "Hand Cash"}}</td>
                        <td>{{$item->remark}}</td>
                        <td class="text-nowrap">
                             <a href="{{ route('partyreceive.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('partyreceive/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button> 
                        </td>
                        
                    </tr>
                    @empty
                    <div class="col-12 py-5 text-center">
                        <h4 class="text-muted"><b>No partyreceive List</b></h4>
                    </div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>







@endsection()