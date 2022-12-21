@extends('layouts.app')
@section('web-content')

<!-- page heading  -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0 text-gray-800 "> Materials</h1>
    <a href="{{route('Material.create')}}" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        <span>Add new Material</span>
    </a>

</div>

<!-- page contain  -->
<div class="card shadow">
    <div class="card-body">
        <table class="table table-striped table-hover" style="color:black;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Material Name</th>
                    <th>Material id</th>
                    <th>Quantity</th>
                    <th>Remaining Quantity</th>
                    <th>Quality</th>
                    <th>Supplier</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($Materials as $key =>$item)
                <tr>
                    <th scope="row" >{{++$key}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->quantity}} {{$item->unit}} </td>
                    <td>{{$item->quantity - \App\Models\MaterialProduction:: where('material_id', $item->id)->sum('quantity')}} {{$item->unit}}</td>
                    <td>{{$item->quality}}</td>
                    <td>{{\App\Models\Supplier:: find($item->supplier_id)-> name}}</td>
                    <td>
                            <a href="{{ route('Material.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('Material/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button>
                    </td>
                </tr>
                @empty
                <div class="col-12 py-5 text-center">
                    <tr>
                        <td colspan='12'>No Record Found</td>
                    </tr>
                    <h4 class=" text-muted"><b>No record found</b></h4>
                </div>
                @endforelse
            </tbody>
        </table>

    </div>

</div>

@endsection