@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a new supplier</h1>
        <a href="{{ route('suppliers') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($supplier))
                    <form action="{{ route('suppliers.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('suppliers.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($supplier)
                        <input type="hidden" name="key" value="{{ $supplier->id }}">
                        @endisset

                        <div class="form-group">
                            <label for="">Supplier Name</label>
                            <input type="text" name="name" autofocus
                                class="form-control @error('name') is-invalid @enderror"
                                @if(isset($supplier))
                                value="{{ $supplier->name }}"
                                @else
                                value="{{ old('name') }}"
                                @endif>

                            @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Supplier Email</label>
                                    <input type="email" name="email" 
                                        class="form-control @error('email') is-invalid @enderror"
                                        @if(isset($supplier))
                                        value="{{ $supplier->email }}"
                                        @else
                                        value="{{ old('email') }}"
                                        @endif>

                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for="">Supplier Phone</label>
                                    <input type="tel" name="phone" 
                                        class="form-control @error('phone') is-invalid @enderror"
                                        @if(isset($supplier))
                                        value="{{ $supplier->phone }}"
                                        @else
                                        value="{{ old('phone') }}"
                                        @endif>

                                    @error('phone')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Company Name</label>
                                    <input type="text" name="company" 
                                        class="form-control @error('company') is-invalid @enderror"
                                        @if(isset($supplier))
                                        value="{{ $supplier->company }}"
                                        @else
                                        value="{{ old('company') }}"
                                        @endif>

                                    @error('company')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for="">Image</label>
                                        
                                    @if(isset($supplier))
                                    <br><img src="{{ asset($supplier->image) }}" alt="" class="img-fluid" width="150">
                                    @endif
                                    <input type="file" name="image" 
                                        class="form-control @error('phone') is-invalid @enderror">

                                    @error('image')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea type="text" name="address"
                                class="form-control @error('address') is-invalid @enderror"
                            > @if(isset($supplier)) {{ $supplier->address }} @else {{ old('address') }} @endif </textarea>

                            @error('address')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
   </div>


@endsection