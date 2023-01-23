@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a New Brand</h1>
        <a href="{{ route('Brand') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($Brand))
                    <form action="{{ route('Brand.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('Brand.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($Brand)
                        <input type="hidden" name="key" value="{{ $Brand->id }}">
                        @endisset

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Brand Name</label>
                                    <input type="text" name="name" autofocus
                                        class="form-control @error('name') is-invalid @enderror"
                                        @if(isset($Brand))
                                        value="{{ $Brand->name }}"
                                        @else
                                        value="{{ old('name') }}"
                                        @endif>

                                    @error('name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for="">Brand Discription</label>
                                    <input type="text" name="description" autofocus
                                        class="form-control @error('description') is-invalid @enderror"
                                        @if(isset($Brand))
                                        value="{{ $Brand->description}}"
                                        @else
                                        value="{{ old('description') }}"
                                        @endif>

                                    @error('description')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                            </div>
                            
                        </div>

                            
                            
                        
                            <div class="form-group">
                                <div class="col-md-4">
                                <label for=""><b>Brand Image</b></label>
                                <br>
                                @if(isset($Brand))
                                    <img src="{{asset($Brand->image)}}" alt=""weight="100px" height="100px">
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