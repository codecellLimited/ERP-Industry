@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Party Profile</h1>
        <a href="{{ route('party.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create Party
        </a>
    </div>


   <div class="row">
        @forelse ($parties as $item)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body" style="color:black;">
                    <div class="my-3 text-center">
                        <img src="{{ asset($item->image) }}" alt="" class="img-fluid rounded-circle m-auto d-block" style="width:100px; height:100px;">
                        <br>
                        <h5><b>{{ $item->company }}</b></h5>
                        <h6>{{ $item->email }}</h6>
                        <h6>{{ $item->phone }}</h6>

                        <a href="{{ route('party.edit', $item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-pen"></i>
                        </a>

                        <button class="btn btn-sm btn-primary"
                        onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('party/delete/{{$item->id}}'); }">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            <br>
        </div>
        @empty
        <div class="col-12 py-5 text-center">
            <h4 class="text-muted"><b>No Party Yet</b></h4>
        </div>
        @endforelse
   </div>


@endsection