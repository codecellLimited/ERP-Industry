@extends('layouts.app')

@section('page_title', 'purchase List')
   
@section('web-content')

<!-- page heading  -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0 text-gray-800 "> Purchase List</h1>
    <a href="{{route('purchase.create')}}" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        <span>Add new Record</span>
    </a>

</div>

<!-- page contain  -->
<div class="card shadow">
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover data-table" style="color:black;">
        @section('page_title', 'Material Purchase List')
            <thead>
                <tr>
                    <th>#</th>
                    <th>Company logo</th>
                    <th>Company Name</th>
                    <th>Supplier Name</th>
                    <th>Total Bill</th>
                    <th>Total Paid</th>
                    <th>Total Due</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($records as $key =>$item)
                <tr>
                    <th scope="row" >{{++$key}}</th>
                    <td><img src="{{ asset(\App\Models\supplier::find($item->supplierID)->image) }}" alt="" class="img-fluid m-auto d-block" width="70"></td>
                    <td>{{\App\Models\supplier::find($item->supplierID)->company}}</td>
                    
                    <td>{{Str::upper( \App\Models\supplier::find($item->supplierID)->name)}}</td>
                    <td>{{$item->total_price}}</td>
                    <td>{{$item->total_paid}}</td>
                    <td>{{$item->due}}</td>
                    <td>
                        @if ($item->status == 1)
                        <span class="badge bg-warning">Ordered</span>
                        @elseif($item->status == 2)
                        <span class="badge bg-success text-light">Received</span>
                        @elseif($item->status == 0)
                        <span class="badge bg-danger text-light">Rejected</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="dropdown-toggle btn btn-sm btn-info text-nowrap">
                                Action
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('purchase.view', $item->id) }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                            <span> Invoice</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('purchase.edit', $item->id) }}">
                                            <i class="nav-link-icon fa fa-pen"></i>
                                            <span> Edit</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript::" onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('purchase/delete/{{$item->id}}'); }">
                                            <i class="nav-link-icon fa fa-trash"></i>
                                            <span> Delete</span>
                                        </a>
                                    </li>

                                    @if($item->status !== 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript::"
                                            onclick="if(confirm('Are you sure? you are changing the status of this record')){ location.replace('{{route('purchase.status', [$item->id, 1])}}'); }"
                                        >
                                            <i class="nav-link-icon fa fa-handshake"></i>
                                            <span>Ordered</span>
                                        </a>
                                    </li>
                                    @endif
                                    
                                    @if($item->status !== 2)
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript::"
                                            onclick="if(confirm('Are you sure? you are changing the status of this record')){ location.replace('{{route('purchase.status', [$item->id, 2])}}'); }"
                                        >
                                            <i class="nav-link-icon fa fa-handshake"></i>
                                            <span>Received</span>
                                        </a>
                                    </li>
                                    @endif

                                    @if($item->status !== 0)
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript::"
                                            onclick="if(confirm('Are you sure? you are changing the status of this record')){ location.replace('{{route('purchase.status', [$item->id, 0])}}'); }"
                                            >
                                            <i class="nav-link-icon fa fa-ban"></i>
                                            <span>Rejected</span>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </td>
                    {{-- <td class="text-nowrap">
                        <a href="{{ route('purchase.edit', $item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-pen"></i>
                        </a>

                        <button class="btn btn-sm btn-primary"
                            onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('purchase/delete/{{$item->id}}'); }">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td> --}}
                </tr>
                @empty
                <div class="col-12 py-5 text-center">
                    <tr>
                        <td colspan="11" style="text-align: center;">No record found</td>
                    </tr>
                </div>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
