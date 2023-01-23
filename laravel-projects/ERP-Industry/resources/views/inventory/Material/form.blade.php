@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Material</h1>
        <a href="{{ route('Material') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row" style="color:black;">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($Material))
                    <form action="{{ route('Material.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('Material.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($Material)
                        <input type="hidden" name="key" value="{{ $Material->id }}">
                        @endisset

                            

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md">
                                    <label for=""><b>Material Name</b></label>
                                    <input type="text" name="name" 
                                        class="form-control @error('name') is-invalid @enderror"
                                        
                                        @if(isset($Material))
                                        value="{{ $Material->name}}"
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
                                    <label for=""><b>Quantity</b></label>
                                    <input type="text" name="quantity" 
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        @if(isset($Material))
                                        value="{{ $Material->quantity}}"
                                        @else
                                        value="{{ old('quantity') }}"
                                        @endif>

                                    @error('quantity')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <label for=""><b>Unit</b></label>
                                    <select name="unit" id="" class="form-control @error('unit') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        
                                        @php
                                            $unit=['PCS','Box','Ton','KG','Litter'];
                                        @endphp    

                                        @foreach($unit as $key=>$status)
                                            <option value="{{$status}}"
                                                @if(isset($Material))
                                                {{($Material->unit==$status)?'selected':''}}
                                                @else{{(old('unit')== $status)? 'selected':''}}

                                                @endif> {{$status}}</option>
                                        @endforeach
                                    </select>

                                    @error('unit')
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
                                    <label for=""><b>Quality</b></label>
                                    <select name="quality" id="" class="form-control @error('quality') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        
                                        @php
                                            $quality=['A','B','C','D','E'];
                                        @endphp    

                                        @foreach($quality as $key=>$status)
                                            <option value="{{$status}}"
                                                @if(isset($Material))
                                                {{($Material->quality==$status)?'selected':''}}
                                                @else{{(old('quality')== $status)? 'selected':''}}

                                                @endif> {{$status}}</option>
                                        @endforeach

                                        
                                    </select>


                                    @error('quality')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md">
                                    <label for=""><b>Supplier Name</b></label>
                                    <select name="supplier_id" id="" class="form-control @error('supplier_id') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>

                                        @foreach(\App\Models\Supplier::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($Material))
                                                {{($Material->supplier_id == $item->id) ? 'selected' : ''}}
                                            @else{{(old('quality')== $item->id) ? 'selected' : ''}}

                                            @endif> 
                                       
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('supplier_id')
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