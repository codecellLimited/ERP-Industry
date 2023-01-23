@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Record</h1>
        <a href="{{ route('asset') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($asset))
                    <form action="{{ route('asset.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('asset.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($asset)
                        <input type="hidden" name="key" value="{{ $asset->id }}">
                        @endisset

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Asset Name</label>
                                    <input type="text" name="name" autofocus
                                        class="form-control @error('name') is-invalid @enderror"
                                        @if(isset($asset))
                                        value="{{ $asset->name }}"
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
                                    <label for="">Quantity</label>
                                    <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                                    @if(isset($asset))
                                    value="{{ $asset->quantity}}"
                                    @else value="{{old('quantity')}}"
                                    @endif>

                                    @error('quantity')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Quality</b></label>
                                    <select name="quality" id="" class="form-control @error('quality') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="Good" @if(isset($asset))@if($asset->quality=='Good'){{'selected'}}@endif @endif >Good</option>
                                        <option value="medium" @if(isset($asset))@if($asset->quality=='medium'){{'selected'}}@endif @endif >Medium</option>
                                        <option value="Bad" @if(isset($asset))@if($asset->quality=='Bad'){{'selected'}}@endif @endif >Bad</option>
                                         
                                    </select>

                                    @error('quality')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        


                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
   </div>


@endsection