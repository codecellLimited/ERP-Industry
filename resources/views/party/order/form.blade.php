@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a new Order</h1>
        <a href="{{ route('order') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body card-responsive">
                    @if (isset($order))
                    <form action="{{ route('order.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($order)
                        <input type="hidden" name="key" value="{{ $order->id }}">
                        @endisset
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Order Date</label>
                                    <input type="date" name="order_date" 
                                        class="form-control @error('order_date') is-invalid @enderror"
                                        @if(isset($order))
                                        value="{{ $order->order_date }}"
                                        @else
                                        value="{{ old('order_date') }}"
                                        @endif>

                                    @error('order_date')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for="">Order Delivery Date</label>
                                    <input type="date" name="order_delivery_date" 
                                        class="form-control @error('order_delivery_date') is-invalid @enderror"
                                        @if(isset($order))
                                        value="{{ $order->order_delivery_date }}"
                                        @else
                                        value="{{ old('order_delivery_date') }}"
                                        @endif>

                                    @error('order_delivery_date')
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
                                            @if(isset($order))
                                                {{($order->party_id == $item->id) ? 'selected' : ''}}
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

                        <div class="form-group">
                            <div class="row">
                            <div class="col-md">
                                    <label for=""><b>Order Title</b></label>
                                    <select name="product_id" id="" class="form-control @error('product_id') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>

                                        @foreach(\App\Models\Product::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($order))
                                                {{($order->product_id == $item->id) ? 'selected' : ''}}
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
                                    <label for="">Quantity</label>
                                    <input type="text" name="quantity" 
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        @if(isset($order))
                                        value="{{ $order->quantity }}"
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
                                            @if(isset($order))
                                                {{($order->unit_id == $item->id) ? 'selected' : ''}}
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
                                        @if(isset($order))
                                        value="{{ $order->unit_price }}"
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
                                        @if(isset($order))
                                        value="{{ $order->discount }}"
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
                                        @if(isset($order))
                                        value="{{ $order->total_discount }}"
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
                                        @if(isset($order))
                                        value="{{ $order->transport_cost }}"
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
                                        @if(isset($order))
                                        value="{{ $order->grand_total }}"
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
                                        @if(isset($order))
                                        value="{{ $order->total_paid }}"
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
                                        @if(isset($order))
                                        value="{{ $order->total_due }}"
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
                                        <option value="1" @if(isset($order)) @if($order->payment_method == 1){{'selected'}} @endif @endif)>Cash</option>
                                        <option value="2" @if(isset($order)) @if($order->payment_method == 2){{'selected'}} @endif @endif>check</option>
            
                                    </select>

                                    @error('payment_method')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md">
                                <label for=""><b>Product Image</b></label>
                                <br>
                                @if(isset($order))
                                    <img src="{{asset($order->image)}}" alt=""weight="100px" height="100px">
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
                            <label for="">Order Note</label>
                            <textarea type="text" name="order_note" class="form-control @error('order_note') is-invalid @enderror">@if(isset($order)){{ $order->order_note}}
                             @else {{ old('order_note') }}@endif</textarea>

                            @error('order_note')
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