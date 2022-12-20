@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Record</h1>
        <a href="{{ route('ProductionPerDay') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row" style="color:black;">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">

                    <div class="form-group">
                        <form action="{{route('inventory.find.Order')}}" method="POST" id="orderIdForm">
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
                                            placeholder="Order ID" autofocus
                                            @isset($order)
                                                value="{{ $order->id }}"
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




   @isset($orderid)
        
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow" style="color:black;">
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">
                            <img src="{{ asset($orderid->image) }}" alt="" class="img-fluid m-auto d-block" width="150">
                            <br>
                            <h6 class="mt-3">Order Name: <b>{{\App\Models\Product::find($orderid->product_id)->name}}</b></h6>
                            <h6>Party Name: <b>{{\App\Models\party::find($orderid->party_id)->name}}</b></h6>
                            <h6>Total Order: <b>@if(isset($record))
                                                   {{\App\Models\order::find($orderid->order_id)->quantity }}
                                                @else
                                                {{\App\Models\order::find($orderid->id)->quantity }}
                                                @endif </b></h6>
                            <h6>Total Production: <b>{{$totalProduction}}</b></h6>
                            <h6>Production Left: <b>{{$leftProduction}}</b></h6>
                        </div>

                        <div class="col-md-8">
                            @if (isset($record))
                            <form action="{{ route('ProductionPerDay.update') }}" method="post" enctype="multipart/form-data">
                            @else
                            <form action="{{ route('ProductionPerDay.store') }}" method="post" enctype="multipart/form-data">
                            @endif
                                @csrf
                                
                                <input type="hidden" name="orderid" value="{{ $orderid->id }}">
                                
                                <input type="hidden" name="image" value="{{ $orderid->image }}">
                                <input type="hidden" name="party_id" value="{{ $orderid->party_id }}">
                                @if(isset($record))
                                
                                @else
                                    <input type="hidden" name="order_id" value="{{ $orderid->id }}">
                                @endif
                                <div class="form-group">
                                <label for=""><b>Product Name</b></label>
                                <input type="hidden" name="product_id" value="{{ $orderid->product_id }}">
                                    <input type="text" name="product_name" 
                                        class="form-control @error('product_name') is-invalid @enderror"
                                        @if(isset($orderid))
                                        value="{{\App\Models\Product::find($orderid->product_id)->name}}"
                                        @else
                                        value="{{ old('product_name') }}"
                                        @endif>

                                    @error('product_name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                <label for=""><b>No Of Production <span class="text-danger"> *</span></b></label>
                                    <input type="text" name="production"
                                        class="form-control @error('production') is-invalid @enderror"
                                        @if(isset($orderid ))
                                        value="{{$orderid->production}}"
                                        @else
                                        value="{{ old('production') }}"
                                        @endif>
                                        

                                    @error('production')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Unit</b></label>
                                    <select name="unit_id" id="" class="form-control @error('unit_id') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>

                                        @foreach(\App\Models\Unit::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($orderid))
                                                {{($orderid->unit_id == $item->id) ? 'selected' : ''}}
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

                                <div class="form-group">
                                    <label for=""><b>Production Date</b></label>
                                    <input type="date" name="production_date" 
                                        class="form-control @error('production_date') is-invalid @enderror"
                                        @if(isset($orderid))
                                        value="{{ (empty($orderid->production_date) ? date('Y-m-d', strtotime(today())) : date('Y-m-d', strtotime($orderid->production_date))) }}"
                                        @else
                                        value="{{ old('production_date') }}"
                                        @endif>

                                    @error('production_date')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for=""><b>Remark/ Note</b> (Optional)</label>
                                    <textarea type="text" name="remark" class="form-control @error('remark') is-invalid @enderror">@if(isset($orderid)){{ $orderid->remark}}@else {{ old('remark') }}@endif</textarea>

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

