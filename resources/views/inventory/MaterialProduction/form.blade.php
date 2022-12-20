@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Material Production</h1>
        <a href="{{ route('MaterialProduction') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row" style="color:black;">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">

                    <div class="form-group">
                        <form action="{{route('inventory.find.Material')}}" method="POST" id="materialIdForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-right-0"> 
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>

                                        <input type="text" name="key" 
                                            class="form-control border-left-0 @error('id') is-invalid @enderror"
                                            placeholder="Material ID" autofocus
                                            @isset($material)
                                                value="{{ $material->id }}"
                                            @endisset>
                                        
                                    </div>

                                    @error('id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
   </div>




   @isset($materialid)
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">
                            
                            <h6 class="mt-3">Material Name: <b>{{ $materialid->name }}</b></h6>
                            <h6>Quality: <b>{{ $materialid->quality }}</b></h6>
                            <h6>Quantity: <b>{{ $materialid->quantity }}</b></h6>
                        </div>

                        <div class="col-md-8">
                            <form action="{{ route('MaterialProduction.store') }}" method="post" enctype="multipart/form-data">
            
                                @csrf
                                <input type="hidden" name="MaterialPurchase_id" value="{{ $materialid->id }}">

                                <div class="form-group">
                                <label for=""><b>name</b></label>
                                    <input type="text" name="name" 
                                        class="form-control @error('name') is-invalid @enderror"
                                        @if(isset($materialid))
                                        value="{{ $materialid->name }}"
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
                                <label for=""><b>Quality</b></label>
                                    <input type="text" name="quality" 
                                        class="form-control @error('quality') is-invalid @enderror"
                                        @if(isset($materialid))
                                        value="{{ $materialid->quality}}"
                                        @else
                                        value="{{ old('quality') }}"
                                        @endif>

                                    @error('quality')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                <label for=""><b>Quantity</b></label>
                                    <input type="text" name="quantity" 
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        @if(isset($MaterialProduction))
                                        value="{{ $MaterialProduction->quantity}}"
                                        @else
                                        value="{{ old('quantity') }}"
                                        @endif>

                                    @error('quantity')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for=""><b>Unit</b></label>
                                    <select name="unit" id="" class="form-control @error('unit') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        
                                        @php
                                            $unit=['PCS','Box','Ton','KG','Litter'];
                                        @endphp    

                                        @foreach($unit as $key=>$status)
                                            <option value="{{$status}}"
                                                @if(isset($materialid))
                                                {{($materialid->unit==$status)?'selected':''}}
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

                                <div class="form-group">
                                    <label for=""><b>Color</b></label>
                                    <input type="text" name="code" 
                                        class="form-control @error('code') is-invalid @enderror"
                                        @if(isset($materialid))
                                        value="{{ $materialid->code}}"
                                        @else
                                        value="{{ old('code') }}"
                                        @endif>

                                    @error('code')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                <label for=""><b>Receiver</b><span class="text-denger">*</span></label>
                                    <input type="text" name="receiver" 
                                        class="form-control @error('receiver') is-invalid @enderror"
                                        @if(isset($MaterialProduction))
                                        value="{{ $MaterialProduction->receiver}}"
                                        @else
                                        value="{{ old('receiver') }}"
                                        @endif>

                                    @error('receiver')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for=""><b>Remark/ Note</b> (Optional)</label>
                                    <textarea type="text" name="remark" class="form-control @error('remark') is-invalid @enderror">@if(isset($materialid)){{ $materialid->remark}}@else {{ old('remark') }}@endif</textarea>

                                    @error('remark')
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
        </div>
    </div>
    @endisset


    
    @isset($Materialedit)
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">
                            
                            <h6 class="mt-3">Material Name: <b>{{ $Materialedit->name }}</b></h6>
                            <h6>Quality: <b>{{ $Materialedit->quality }}</b></h6>
                            <h6>Quantity: <b>{{ $Materialedit->quantity }}</b></h6>
                        </div>

                        <div class="col-md-8">
                            <form action="{{ route('Materialedit.update') }}" method="post" enctype="multipart/form-data">
            
                                @csrf
                                <input type="hidden" name="MaterialPurchase_id" value="{{ $Materialedit->id }}">

                                <div class="form-group">
                                <label for=""><b>name</b></label>
                                    <input type="text" name="name" 
                                        class="form-control @error('name') is-invalid @enderror"
                                        @if(isset($Materialedit))
                                        value="{{ $Materialedit->name }}"
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
                                <label for=""><b>Quality</b></label>
                                    <input type="text" name="quality" 
                                        class="form-control @error('quality') is-invalid @enderror"
                                        @if(isset($Materialedit))
                                        value="{{ $Materialedit->quality}}"
                                        @else
                                        value="{{ old('quality') }}"
                                        @endif>

                                    @error('quality')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                <label for=""><b>Quantity</b></label>
                                    <input type="text" name="quantity" 
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        @if(isset($Materialedit))
                                        value="{{ $Materialedit->quantity}}"
                                        @else
                                        value="{{ old('quantity') }}"
                                        @endif>

                                    @error('quantity')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for=""><b>Unit</b></label>
                                    <select name="unit" id="" class="form-control @error('unit') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        
                                        @php
                                            $unit=['PCS','Box','Ton','KG','Litter'];
                                        @endphp    

                                        @foreach($unit as $key=>$status)
                                            <option value="{{$status}}"
                                                @if(isset($Materialedit))
                                                {{($Materialedit->unit==$status)?'selected':''}}
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

                                <div class="form-group">
                                    <label for=""><b>Color</b></label>
                                    <input type="text" name="code" 
                                        class="form-control @error('code') is-invalid @enderror"
                                        @if(isset($Materialedit))
                                        value="{{ $Materialedit->code}}"
                                        @else
                                        value="{{ old('code') }}"
                                        @endif>

                                    @error('code')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                <label for=""><b>Receiver</b><span class="text-denger">*</span></label>
                                    <input type="text" name="receiver" 
                                        class="form-control @error('receiver') is-invalid @enderror"
                                        @if(isset($Materialedit))
                                        value="{{ $Materialedit->receiver}}"
                                        @else
                                        value="{{ old('receiver') }}"
                                        @endif>

                                    @error('receiver')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for=""><b>Remark/ Note</b> (Optional)</label>
                                    <textarea type="text" name="remark" class="form-control @error('remark') is-invalid @enderror">@if(isset($Materialedit)){{ $Materialedit->remark}}@else {{ old('remark') }}@endif</textarea>

                                    @error('remark')
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
        </div>
    </div>
    @endisset



@endsection