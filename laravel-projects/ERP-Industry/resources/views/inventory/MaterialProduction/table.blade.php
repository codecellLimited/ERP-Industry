@extends('layouts.app')

@section('page_title', 'Material For Production')
   
@section('web-content')

<!-- page heading  -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0 text-gray-800 "> Materials taken for Production</h1>
    <a href="{{route('MaterialProduction.create')}}" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        <span>Add new Record</span>
    </a>

</div>

<!-- page contain  -->
<div class="card shadow">
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover data-table" style="color:black;">
        @section('page_title', 'Material Taken for Production list')
            <thead>
                <tr>
                    <th>#</th>
                    <th>Material Name</th>
                    <th>Quantity</th>
                    <th>Quality</th>
                    <th>Receiver</th>
                    <th>Color Code</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($MaterialProductions as $key =>$item)
                <tr>
                    <th scope="row" >{{++$key}}</th>
                    <td>{{\App\Models\Material::find($item->material_id)->name}}</td>
                    <td>{{$item->quantity}} {{$item->unit}} </td>
                    <td>{{$item->quality}}</td>
                    <td>{{$item->receiver}}</td>
                    <td>{{$item->code}}</td>
                   
                    <td>
                            <a href="{{ route('MaterialProduction.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('/MaterialProduction/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button>
                    </td>
                </tr>
                @empty
                <div class="col-12 py-5 text-center">
                    <tr>
                        <td colspan='7' style="text-align:center;">No Record Found</td>
                    </tr>
                </div>
                @endforelse
            </tbody>
        </table>

    </div>

</div>

@endsection