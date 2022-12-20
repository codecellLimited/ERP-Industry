@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a new Material Purchase</h1>
        <a href="{{ route('purchase') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($purchase))
                    <form action="{{ route('purchase.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('purchase.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($purchase)
                        <input type="hidden" name="key" value="{{ $purchase->id }}">
                        @endisset
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Purchase Date</label>
                                    <input type="date" name="purchase_date" 
                                        class="form-control @error('purchase_date') is-invalid @enderror"
                                        @if(isset($purchase))
                                        value="{{ $purchase->purchase_date }}"
                                        @else
                                        value="{{ old('purchase_date') }}"
                                        @endif>

                                    @error('purchase_date')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for="">Supplier</label>
                                    <select name="supplierID" id="" class="form-control @error('supplierID') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\Supplier::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($purchase))
                                                {{($purchase->supplierID == $item->id) ? 'selected' : ''}}
                                            @else{{(old('supplierID')== $item->id) ? 'selected' : ''}}

                                            @endif> 
                                       
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    
                                        
                                    </select>

                                    @error('supplierID')
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
                                    <label for=""><b>Material Name</b></label>
                                    <select name="material_id" id="" class="form-control @error('material_id') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\materialForSupplier::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($materialForSupplier))
                                                {{($materialForSupplier->material_id == $item->id)? 'selected':''}}
                                            @else{{(old('material_id')?'selected':'')}}  
                                            @endif  >
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    
                                    </select>

                                    @error('material_id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for="">Quantity</label>
                                    <input type="text" name="quantity" 
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        @if(isset($purchase))
                                        value="{{ $purchase->quantity }}"
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
                                    <label for="">Unit</label>
                                    <select name="unit_id" id="" class="form-control @error('unit_id') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\Unit::get() as $item)
                                            <option value="{{ $item->id }}"
                                                @if(isset($purchase))
                                                    {{($purchase->unit_id == $item->id) ? 'selected' : ''}}
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
                                    <label for="">Unit Price</label>
                                    <input type="text" name="unit_price" 
                                        class="form-control @error('unit_price') is-invalid @enderror"
                                        @if(isset($purchase))
                                        value="{{ $purchase->unit_price }}"
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
                                    <label for="">Discount(%)</label>
                                    <input type="text" name="discount" 
                                        class="form-control @error('discount') is-invalid @enderror"
                                        @if(isset($purchase))
                                        value="{{ $purchase->discount }}"
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
                                    <label for="">Total Discount</label>
                                    <input type="test" name="total_discount" 
                                        class="form-control @error('total_discount') is-invalid @enderror"
                                        @if(isset($purchase))
                                        value="{{ $purchase->total_discount }}"
                                        @else
                                        value="{{ old('total_discount') }}"
                                        @endif>

                                    @error('total_discount')
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
                                    <label for="">Transport Cost</label>
                                    <input type="text" name="transport_cost" 
                                        class="form-control @error('transport_cost') is-invalid @enderror"
                                        @if(isset($purchase))
                                        value="{{ $purchase->transport_cost }}"
                                        @else
                                        value="{{ old('transport_cost') }}"
                                        @endif>

                                    @error('transport_cost')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md">
                                    <label for="">Grand Total</label>
                                    <input type="text" name="grand_total" 
                                        class="form-control @error('grand_total') is-invalid @enderror"
                                        @if(isset($purchase))
                                        value="{{ $purchase->grand_total }}"
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
                                    <label for="">Total Paid</label>
                                    <input type="text" name="total_paid" 
                                        class="form-control @error('total_paid') is-invalid @enderror"
                                        @if(isset($purchase))
                                        value="{{ $purchase->total_paid }}"
                                        @else
                                        value="{{ old('total_paid') }}"
                                        @endif>

                                    @error('total_paid')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md">
                                    <label for="">Total Due</label>
                                    <input type="text" name="total_due" 
                                        class="form-control @error('total_due') is-invalid @enderror"
                                        @if(isset($purchase))
                                        value="{{ $purchase->total_due }}"
                                        @else
                                        value="{{ old('total_due') }}"
                                        @endif>

                                    @error('total_due')
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
                                    <label for="">Payment Method</label>
                                    <select name="payment_method" id="" class="form-control @error('supplierID') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @if(isset($purchase)) @if($purchase->payment_method == 1) {{'selected'}} @endif @endif>Cash</option>
                                        <option value="2" @if(isset($purchase)) @if($purchase->payment_method == 2) {{'selected'}} @endif @endif>Check</option>
                                    
                                        
                                    </select>

                                    @error('payment_method')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Purchase Note</label>
                            <textarea type="text" name="purchase_note" class="form-control @error('purchase_note') is-invalid @enderror">@if(isset($purchase)){{ $purchase->purchase_note }}@else {{ old('purchase_note') }} @endif </textarea>

                            @error('purchase_note')
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