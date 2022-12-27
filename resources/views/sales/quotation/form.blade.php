@extends('layouts.app')

@section('web-content')
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a new Record</h1>
        <a href="{{ route('quotation') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body card-responsive">
                    @if (isset($quotation))
                    <form action="{{ route('quotation.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('quotation.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($quotation)
                        <input type="hidden" name="key" value="{{ $quotation->id }}">
                        @endisset
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for=""><b> Quotation Date</b></label>
                                    <input type="date" name="quotation_date" 
                                        class="form-control @error('quotation_date') is-invalid @enderror"
                                        @if(isset($quotation))
                                        value="{{ date('Y-m-d', strtotime($quotation->quotation_date )) }}"
                                        @else
                                        value="{{ old('quotation_date') }}"
                                        @endif>

                                    @error('quotation_date')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                

                                <div class="col-md">
                                    <label for=""><b>Party</b></label>
                                    <select name="party_id" id="" class="form-control @error('party_id') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>

                                        @foreach(\App\Models\party::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($quotation))
                                                {{($quotation->party_id == $item->id) ? 'selected' : ''}}
                                            @else{{(old('party_id')== $item->id) ? 'selected' : ''}}

                                            @endif> 
                                       
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('party_id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group" >
                            <div class="row">
                                <div class="col-md">
                                    <label for=""><b>Product Name</b></label>
                                    <select name="product_id" id="" class="form-control @error('product_id') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>

                                        @foreach(\App\Models\Product::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($quotation))
                                                {{($quotation->product_id == $item->id) ? 'selected' : ''}}
                                            @else{{(old('product_id')== $item->id) ? 'selected' : ''}}

                                            @endif> 
                                       
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('product_id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b> Quantity</b></label>
                                    <input type="text" name="quantity" 
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        @if(isset($quotation))
                                        value="{{ $quotation->quantity }}"
                                        @else
                                        value="{{ old('quantity') }}"
                                        @endif>

                                    @error('quantity')
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
                                            @if(isset($quotation))
                                                {{($quotation->unit_id == $item->id) ? 'selected' : ''}}
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

                                <div class="col-md">
                                    <label for=""><b>Unit Price</b></label>
                                    <input type="text" name="unit_price" 
                                        class="form-control @error('unit_price') is-invalid @enderror"
                                        @if(isset($quotation))
                                        value="{{ $quotation->unit_price }}"
                                        @else
                                        value="{{ old('unit_price') }}"
                                        @endif>

                                    @error('unit_price')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Discount(%)</b></label>
                                    <input type="text" name="discount" 
                                        class="form-control @error('discount') is-invalid @enderror"
                                        @if(isset($quotation))
                                        value="{{ $quotation->discount }}"
                                        @else
                                        value="{{ old('discount') }}"
                                        @endif>

                                    @error('discount')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Total price</b></label>
                                    <input type="text" name="total" 
                                        class="form-control @error('total') is-invalid @enderror"
                                        @if(isset($quotation))
                                        value="{{ $quotation->total }}"
                                        @else
                                        value="{{ old('total') }}"
                                        @endif>

                                    @error('total')
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
                                    <label for=""><b>Total Discount</b></label>
                                    <input type="test" name="total_discount" 
                                        class="form-control @error('total_discount') is-invalid @enderror"
                                        @if(isset($quotation))
                                        value="{{ $quotation->total_discount }}"
                                        @else
                                        value="{{ old('total_discount') }}"
                                        @endif>

                                    @error('total_discount')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Order Tax(%)</b></label>
                                    <input type="test" name="tax" 
                                        class="form-control @error('tax') is-invalid @enderror"
                                        @if(isset($quotation))
                                        value="{{ $quotation->tax }}"
                                        @else
                                        value="{{ old('tax') }}"
                                        @endif>

                                    @error('tax')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Grand Total</b></label>
                                    <input type="text" name="grand_total" 
                                        class="form-control @error('grand_total') is-invalid @enderror"
                                        @if(isset($quotation))
                                        value="{{ $quotation->grand_total }}"
                                        @else
                                        value="{{ old('grand_total') }}"
                                        @endif>

                                    @error('grand_total')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Quotation Status</b></label>
                                    <select name="quotation_status" id="" class="form-control @error('quotation_status') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @if(isset($quotation))@if($quotation->quotation_status==1){{'selected'}}@endif @endif >Sending</option>
                                        <option value="2" @if(isset($quotation))@if($quotation->quotation_status==2){{'selected'}}@endif @endif >Panding</option>
                                    
                                    </select>

                                    @error('quotation_status')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for=""><b>Quotation Note</b></label>
                            <textarea type="text" name="quotation_note" class="form-control @error('quotation_note') is-invalid @enderror">@if(isset($quotation)){{ $quotation->quotation_note}}
                             @else {{ old('quotation_note') }}@endif</textarea>

                            @error('quotation_note')
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

