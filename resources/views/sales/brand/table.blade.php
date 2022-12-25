@extends('layouts.app')

@section('page_title', 'Brand List')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Brands</h1>
        <a href="{{route('Brand.create')}}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Record
        </a>
    </div>

<div class="card shadow col-md-6">
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover" style="color:black;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Brand Name</th>
                    <th>Brand Description</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($Brand as $key =>$item)
                <tr>
                    <th scope="row" >{{++$key}}</th>
                    <td><img src="{{ asset($item->image) }}" alt="" class="img-fluid rounded-circle m-auto d-block" width="50"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td class="text-nowrap">
                            <a href="{{ route('Brand.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('Brand/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button>
                    </td>
                </tr>
                @empty
                <div class="col-12 py-5 text-center">
                    <tr>
                        <td colspan='5' style="text-align: center;">No Record Found</td>
                    </tr> 
                </div>
                @endforelse
            </tbody>
        </table>

    </div>

</div>



@endsection