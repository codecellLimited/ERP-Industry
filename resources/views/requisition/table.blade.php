@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Requisition List</h1>
        <a href="{{ route('requisition.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add a new Requisition
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($requisition as $key => $item)
                    <tr>
                        <th scope="row" >{{++$key}}</th>
                        <!-- <td><img src="{{ asset($item->image) }}" alt="" class="img-fluid rounded-circle m-auto d-block" width="50"></td> -->
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->unit}}</td>
                        <td>{{$item->unit_price}}</td>
                        <td>{{$item->total}}</td>
                        <td>
                            <a href="{{ route('requisition.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('requisition/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                        
                    </tr>
                    @empty
                    <div class="col-12 py-5 text-center">
                        <h4 class="text-muted"><b>No employee Yet</b></h4>
                    </div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>







@endsection()