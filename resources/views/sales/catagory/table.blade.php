@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">catagorys</h1>
        <a href="{{ route('catagory.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create New Record
        </a>
    </div>

    <div class="row">
        <div class="col-md-6">
        <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover" style="color:black;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Catagory Code</th>
                        <th scope="col">Catagory</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($catagorys as $key => $item)
                    <tr>
                        <th scope="row" >{{++$key}}</th>
                        <td>CA{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <a href="{{ route('catagory.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('catagory/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                        
                    </tr>
                    @empty
                    <div class="col-12 py-5 text-center">
                        <tr>
                            <td colspan='3' style="text-align: center;">No Record Found</td>
                        </tr>
                    </div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>

        </div>
    </div>









@endsection()