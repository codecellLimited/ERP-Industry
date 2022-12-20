@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            @if (isset($record))
                Update record
            @else
                Add a new record
            @endif
        </h1>
        <a href="{{ route('requisition.list') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

               <div class="card-body text-dark">
                    @if (isset($record))
                    <form action="{{ route('requisition.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('requisition.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($record)
                        <input type="hidden" name="key" value="{{ $record->id }}">
                        @endisset
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label><b>requisition Date</b></label>

                                    <input type="date" name="requisition_date" 
                                        class="form-control @error('requisition_date') is-invalid @enderror"
                                        @if(isset($record))
                                        value="{{ date('Y-m-d', strtotime($record->requisition_date)) }}"
                                        @else
                                        value="{{ old('requisition_date') }}"
                                        @endif>

                                    @error('requisition_date')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>


                        <div class="form-group" id="product_item">
                            @if (isset($record))
                                @foreach (json_decode($record->data) as $key => $item)
                                <div class="row" id="material-row-{{$key}}">
                                    <div class="col-md-3">
                                        <label for=""><b>Material Name</b></label>
                                        <input type="text" name="name[]" 
                                            class="form-control" value="{{ $item->material_name }}">
                                    </div>

                                    <div class="col-md">
                                        <label for=""><b>Quantity</b></label>
                                        <input type="text" name="quantity[]" id="quantity-{{$key}}"
                                            class="quantity form-control"
                                            onchange="calculator('{{$key}}')" value="{{ $item->quantity }}">
                                    </div>

                                    <div class="col-md">
                                        <label for=""><b>Unit</b></label>
                                        <input type="text" name="unit[]" id="unit"
                                            class="unit form-control" value="{{ $item->unit }}">
                                    </div>

                                    <div class="col-md">
                                        <label for=""><b>Unit Price</b></label>

                                        <input type="text" name="unit_price[]" id="unit_price-{{$key}}" 
                                            class="unit_price form-control" value="{{ $item->unit_price }}"
                                            onchange="calculator('{{$key}}')">
                                    </div>

                                    

                                    <div class="col-md">
                                        <label><b>Sub Total</b></label>
                                        <input type="text" name="sub_total[]" class="form-control" readonly
                                            id="single-total-{{$key}}" value="{{ $item->sub_total }}">
                                    </div>

                                    @if ($key == 0)
                                    <div class="col-md p-2 ">
                                        <div class="btn btn-primary mt-4" id="add_product_item"> <i class="fas fa-plus"></i> </div>
                                    </div>
                                    @else
                                    <div class="col-md p-2 ">
                                        <div class="btn btn-danger mt-4" id="remove_product_item" onclick="deleteRow('{{$key}}')">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                    @endif
                                    
                                </div>
                                @endforeach
                            @else
                            <div class="row" id="material-row-0">
                                <div class="col-md-3">
                                    <label for=""><b>Product Name</b></label>
                                    <input type="text" name="name[]" 
                                        class="form-control">
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Quantity</b></label>
                                    <input type="text" name="quantity[]" id="quantity-0"
                                        class="quantity form-control"
                                        onchange="calculator('0')">
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Unit</b></label>
                                    <input type="text" name="unit[]" id="unit"
                                        class="unit form-control">
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Unit Price</b></label>

                                    <input type="text" name="unit_price[]" id="unit_price-0" 
                                        class="unit_price form-control"
                                        onchange="calculator('0')">
                                </div>

                                

                                <div class="col-md">
                                    <label><b>Sub Total</b></label>
                                    <input type="text" name="sub_total[]" class="form-control" id="single-total-0" readonly>
                                </div>

                                <div class="col-md p-2 ">
                                    <div class="btn btn-primary mt-4" id="add_product_item"> <i class="fas fa-plus"></i> </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for=""><b>Transport Cost</b></label>
                                    <input type="text" name="transport_cost" id="transport_cost"
                                        class="form-control @error('transport_cost') is-invalid @enderror"
                                        onkeyup="totalCount()"
                                        @if(isset($record))
                                        value="{{ $record->transport_cost }}"
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
                                    <label for=""><b>Total Bill</b></label>
                                    <input type="text" name="total_price" id="total_bill" readonly
                                        class="form-control @error('total_price') is-invalid @enderror"
                                        @if(isset($record))
                                        value="{{ $record->total_price }}"
                                        @else
                                        value="{{ old('total_price') }}"
                                        @endif>

                                    @error('total_price')
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

@push('js')
    
    <script>

        @if (isset($record))
        let x = {{ count(json_decode($record->data)) - 1 }};
        @else
        let x = 0;
        @endif

    </script>

    <script src="{{ asset('js/custom/calculation.js') }}"></script>
@endpush