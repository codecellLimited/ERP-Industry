@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a New designation</h1>
        <a href="{{ route('designation') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($designation))
                    <form action="{{ route('designation.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('designation.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($designation)
                        <input type="hidden" name="key" value="{{ $designation->id }}">
                        @endisset

                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="">Designation Title</label>
                                <input type="text" name="name" autofocus
                                    class="form-control @error('name') is-invalid @enderror"
                                    @if(isset($designation))
                                    value="{{ $designation->name }}"
                                    @else
                                    value="{{ old('name') }}"
                                    @endif>

                                @error('name')
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