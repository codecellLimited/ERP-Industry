@extends('layouts.app')

@section('page_title', 'Sanction list')
   
@section('web-content')

<!-- page heading  -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0 text-gray-800 "> Sanction List</h1>
    <a href="{{route('sanction.create')}}" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        <span>Add new Record</span>
    </a>

</div>

<!-- page contain  -->
<div class="card shadow">
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover data-table" style="color:black;">
        @section('page_title', 'Sanction list from sales')
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sanction Date</th>
                    <th>Purpose</th>
                    <th>Amount</th>
                    <th>Remark</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>

            
            <tbody>
                @forelse($sanction as $key =>$item)
                <tr>
                    <th scope="row" >{{++$key}}</th>
                    <th>{{$item->sanction_date}}</th>
                    <td>{{$item->purpose}}</td>
                    <td>{{$item->amount}}</td>
                    <td>{{$item->sanction_note}}</td>
                    <td>
                        @if($item->status == 1)
                        <span class="badge bg-warning">Stand by</span>
                        @elseif($item->status == 2)
                        <span class="badge bg-success text-light">Send</span>
                        @elseif($item->status == 3)
                        <span class="badge bg-primary text-light">Accepted</span>
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
                                        <a class="nav-link" href="{{ route('sanction.edit', $item->id) }}">
                                            <i class="nav-link-icon fa fa-pen"></i>
                                            <span> Edit</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript::" onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('sanction/delete/{{$item->id}}'); }">
                                            <i class="nav-link-icon fa fa-trash"></i>
                                            <span> Delete</span>
                                        </a>
                                    </li>

                                    @if($item->status !== 1 && $item-> status != 3 && $item-> status != 0)
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript::"
                                            onclick="if(confirm('Are you sure? you are changing the status of this record')){ location.replace('{{route('sanction.status', [$item->id, 1])}}'); }"
                                        >
                                            <i class="nav-link-icon fa fa-handshake"></i>
                                            <span>Stand by</span>
                                        </a>
                                    </li>
                                    @endif
                                    
                                    @if($item->status !== 2 && $item-> status != 3)
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript::"
                                            onclick="if(confirm('Are you sure? you are changing the status of this record')){ location.replace('{{route('sanction.status', [$item->id, 2])}}'); }"
                                        >
                                            <i class="nav-link-icon fa fa-handshake"></i>
                                            <span>Send</span>
                                        </a>
                                    </li>
                                    @endif

                                    
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <div class="col-12 py-6 text-center">
                    <tr>
                        <td colspan="6" style="text-align: center;">No record found</td>
                    </tr>
                </div>
                @endforelse
            </tbody>
        </table>

    </div>

</div>

@endsection