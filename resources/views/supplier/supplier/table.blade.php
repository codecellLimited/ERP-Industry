@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Suppliers</h1>
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create Supplier
        </a>
    </div>


   <div class="row" >
        @forelse ($suppliers as $item)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="my-3 text-center" style="color:black;">
                        <img src="{{ asset($item->image) }}" alt="" class="img-fluid rounded-circle m-auto d-block" style="width:100px; height:100px;">
                        <br>
                        <h6><b> {{Str::upper( $item->name)}}</b></h6>
                        <h6>{{ $item->company }}</h5>
                        <h6>{{ $item->phone }}</h6>

                        <a href="{{ route('suppliers.edit', $item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-pen"></i>
                        </a>

                        <button class="btn btn-sm btn-primary"
                        onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('suppliers/delete/{{$item->id}}'); }">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 py-5 text-center">
            <h4 class="text-muted"><b>No Supplier Yet</b></h4>
        </div>
        @endforelse
   </div>


@endsection