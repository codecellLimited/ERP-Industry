@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Debits List</h1>
        <a href="{{ route('debit.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add new debit Balance
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover" style="color:black;">
                <thead>
                    <tr style="color:black;">
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Credited from</th>
                        <th scope="col">Received By</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Account No</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($debit as $key => $item)
                    <tr style="color:black;">
                        <th scope="row" >{{++$key}}</th>
                        <td>{{$item->date}}</td>
                        <td>{{$item->credit_from}}</td>

                        <td>{{\App\Models\designation::find($item->received) -> name }}</td>
                        <td>{{$item->amount}}</td>
                        <td>{{ \App\Models\bankadd::find($item->id) -> account_number }}</td>
                        <td>{{$item->remark}}</td>
                        <td>
                             <a href="{{ route('debit.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('debit/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button> 
                        </td>
                        
                    </tr>
                    @empty
                    <div class="col-12 py-5 text-center">
                        <h4 class="text-muted"><b>No Debit list</b></h4>
                    </div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>







@endsection()