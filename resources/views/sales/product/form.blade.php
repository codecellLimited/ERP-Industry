@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Product</h1>
        <a href="{{ route('product') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row" style="color:black;">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($products))
                    <form action="{{ route('product.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($products)
                        <input type="hidden" name="key" value="{{ $products->id }}">
                        @endisset

                                    
                        <div class="form-group">
                            <div class="row">

                                <div class="col-md">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" autofocus
                                        class="form-control @error('name') is-invalid @enderror"
                                        @if(isset($products))
                                        value="{{ $products->name}}"
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
                                    <label for=""><b>Catagory</b></label>
                                    <select name="catagory_id" id="" class="form-control @error('catagory_id') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>

                                        @foreach(\App\Models\Catagory::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($products))
                                                {{($products->catagory_id == $item->id) ? 'selected' : ''}}
                                            @else{{(old('catagory_id')== $item->id) ? 'selected' : ''}}

                                            @endif> 
                                       
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('catagory_id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Brand</b></label>
                                    <select name="brand_id" id="" class="form-control @error('brand_id') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>

                                        @foreach(\App\Models\Brand::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($products))
                                                {{($products->brand_id == $item->id) ? 'selected' : ''}}
                                            @else{{(old('brand_id')== $item->id) ? 'selected' : ''}}

                                            @endif> 
                                       
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('brand_id')
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
                                    <label for="">Product Price</label>
                                    <input type="text" name="price" autofocus
                                        class="form-control @error('price') is-invalid @enderror"
                                        @if(isset($products))
                                        value="{{ $products->price}}"
                                        @else
                                        value="{{ old('price') }}"
                                        @endif>

                                    @error('price')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md">
                                    <label for=""><b>Unit</b></label>
                                    <select name="unit_id" id="" class="form-control @error('unit_id') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>

                                        @foreach(\App\Models\Unit::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($products))
                                                {{($products->unit_id == $item->id) ? 'selected' : ''}}
                                            @else{{(old('unit_id')== $item->id) ? 'selected' : ''}}

                                            @endif> 
                                       
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('unit_id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                <label for=""><b>Product Image</b></label>
                                <br>
                                @if(isset($products))
                                    <img src="{{asset($products->image)}}" alt=""weight="100px" height="100px">
                                @endif    
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                        
                                    @error('image')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                
                            </div>
                        </div>

                        <div class="form-group">
                            
                                
                            <div class="cal-md">
                                <label for=""><b>Description</b></label>
                                <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror">@if(isset($products)){{ $products->description}}@else {{ old('description') }} @endif </textarea>
                                @error('description')
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