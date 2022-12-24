@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Loan Application List</h1>
        <a href="{{ route('loan.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add a New Loan Application
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover data-table" style="color:black;">
            @section('page_title', 'Employee Loan list')
                <thead>
                    <tr style="color:black;">
                        <th scope="col">#</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Loan Apply Date</th>
                        <th scope="col">Amount Of Loan</th>
                        <th scope="col">Purpose Note</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($loan as $key => $item)
                    <tr style="color:black;">
                        <th scope="row" >{{++$key}}</th>
                        <td>{{ $item->employee_id}}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ date("d-m-Y", strtotime($item->date)) }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{$item->note}}</td>
                        <td class="text-nowrap">
                             <a href="{{ route('loan.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('loan/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button> 
                        </td>
                        
                    </tr>
                    @empty
                    <div class="col-12 py-5 text-center">
                        <h4 class="text-muted"><b>No loan Application in  List</b></h4>
                    </div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>







@endsection()