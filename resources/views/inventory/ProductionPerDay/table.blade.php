@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Production Per Days</h1>
        <a href="{{route('ProductionPerDay.create')}}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add New Record
        </a>
    </div>

<div class="card shadow">
    <div class="card-body">
        <table class="table table-striped table-hover" style="color:black;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Party Name</th>
                    <th>No Of Production</th>
                    <th>Production date</th>
                    <th>Remark</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($ProductionPerDays as $key =>$item)
                <tr>
                    <th scope="row" >{{++$key}}</th>
                    <td> <img src="{{asset(\App\Models\Product::find($item->product_id)->image)}}" alt="" class="img-fluid rounded-circle m-auto d-block" width="50"></td>
                    <td>{{\App\Models\Product::find($item->product_id)->name}}</td>
                    <td>{{\App\Models\party::find($item->party_id)->name}}</td>
                    <td>{{$item->production}}</td>
                    <td>{{$item->production_date}}</td>
                    <td>{{$item->remark}}</td>
                    <td class="text-nowrap">
                            <a href="{{ route('ProductionPerDay.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('/ProductionPerDay/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button>
                    </td>
                </tr>
                @empty
                <div class="col-12 py-5 text-center">
                    <tr>
                        <td colspan='9' style="text-align: center;">No Record Found</td>
                    </tr> 
                </div>
                @endforelse
            </tbody>
        </table>

    </div>

</div>



@endsection