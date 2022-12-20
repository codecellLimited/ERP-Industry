@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <a href="{{route('product.create')}}" class="btn btn-primary shadow-sm">
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
                    <th>Catagory</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th>Description</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($products as $key =>$item)
                <tr>
                    <th scope="row" >{{++$key}}</th>
                    <td><img src="{{ asset($item->image) }}" alt="" class="img-fluid rounded-circle m-auto d-block" width="50"></td>
                    <td>{{$item->name}}</td>
                    <td>{{\App\Models\Catagory::find($item->catagory_id)->name}}</td>
                    <td>{{App\Models\Brand::find($item->brand_id)->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{\App\Models\Unit:: find($item->unit_id)->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                            <a href="{{ route('product.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('product/delete/{{$item->id}}'); }">
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