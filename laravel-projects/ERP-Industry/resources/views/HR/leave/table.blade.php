@extends('layouts.app')

@section('page_title', 'Employees on leave')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Leave Application List</h1>
        <a href="{{ route('leave.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add new Leave Application
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover data-table">
            @section('page_title', 'Employee List on Leave')
                <thead>
                    <tr style="color:black;">
                        <th scope="col">#</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Leave Type</th>
                        <th scope="col">Date From Leave</th>
                        <th scope="col">Next Joining Date</th>
                        <th scope="col">Total Days</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leave as $key => $item)
                    <tr style="color:black;">
                        <th scope="row" >{{++$key}}</th>
                        <td>{{ Str::upper($item->employee_id)}}</td>
                        <td>{{ Str::upper($item->name)}}</td>

                        <td>@if( $item->type == 1) Inform
                            @elseif( $item->type == 2) Application
                            @elseif( $item->type == 3) No Pay
                            @elseif( $item->type == 4) None
                            @else 
                            @endif</td>
                       
                        <td>{{ date("d-m-Y", strtotime($item->date_from)) }}</td>
                        <td>{{ date("d-m-Y", strtotime($item->date_to)) }}</td>
                        
                        <td>{{$item->total_days}}</td>
                        <td class="text-nowrap">
                             <a href="{{ route('leave.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('leave/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button> 
                        </td>
                        
                    </tr>
                    @empty
                    <div class="col-12 py-5 text-center">
                        <h4 class="text-muted"><b>No Leave Application in  List</b></h4>
                    </div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>







@endsection()