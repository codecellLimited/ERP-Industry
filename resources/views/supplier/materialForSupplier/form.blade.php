@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Record</h1>
        <a href="{{ route('materialForSupplier') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($materialForSupplier))
                    <form action="{{ route('materialForSupplier.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('materialForSupplier.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($materialForSupplier)
                        <input type="hidden" name="key" value="{{ $materialForSupplier->id }}">
                        @endisset

                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="">Material Name*</label>
                                <input type="text" name="name" autofocus
                                    class="form-control @error('name') is-invalid @enderror"
                                    @if(isset($materialForSupplier))
                                    value="{{ $materialForSupplier->name }}"
                                    @else
                                    value="{{ old('name') }}"
                                    @endif>

                                @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                    <label for=""><b>Material Image*</b></label>
                                    @if(isset($materialForSupplier))
                                        <img src="{{asset($materialForSupplier->image)}}" alt="" width="100px" height="100px">
                                    @endif
                                    <input type="file" name="image" 
                                        class="form-control @error('image') is-invalid @enderror">

                                    @error('image')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            
                        </div>



                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
   </div>


@endsection