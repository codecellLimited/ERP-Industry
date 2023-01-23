@extends('layouts.app')

@section('page_title', 'Credit Balance')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Credits List</h1>
        <a href="{{ route('credit.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add new Credit Balance
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover" style="color:black;">
                <thead>
                    <tr style="color:black;">
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">pay_via</th>
                        <th scope="col">Payment Method</th>
                        
                        <th scope="col">Amount</th>
                        <th scope="col">Account No</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($credit as $key => $item)
                    <tr style="color:black;">
                        <th scope="row" >{{++$key}}</th>
                        <td>{{$item->date}}</td>
                        <td>{{\App\Models\Designation::find($item->pay_via) -> name }}</td>
                        <td>{{$item->debit_by}}</td>
                        <td>{{$item->amount}}</td>
                        <td>{{ \App\Models\Bankadd::find($item->id)->account_number }}</td>
                        <td>{{$item->remark}}</td>
                        <td>
                             <a href="{{ route('credit.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('credit/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button> 
                        </td>
                        
                    </tr>
                    @empty
                    <div class="col-12 py-5 text-center">
                        <h4 class="text-muted"><b>No Credit List</b></h4>
                    </div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>







@endsection()