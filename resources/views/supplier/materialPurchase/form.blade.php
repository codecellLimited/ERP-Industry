@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            @if (isset($record))
                Update record
            @else
                New purchase
            @endif
        </h1>
        <a href="{{ route('purchase') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body text-dark">
                    @if (isset($record))
                    <form action="{{ route('purchase.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('purchase.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($record)
                        <input type="hidden" name="key" value="{{ $record->id }}">
                        @endisset
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Purchase Date*</label>
                                    <input type="date" name="purchase_date" 
                                        class="form-control @error('purchase_date') is-invalid @enderror"
                                        @if(isset($record))
                                        value="{{ date('Y-m-d', strtotime($record->purchase_date)) }}"
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
                                    <label for="">Purchase Receive Date</label>
                                    <input type="date" name="purchase_receive_date" 
                                        class="form-control @error('purchase_receive_date') is-invalid @enderror"
                                        @if(isset($record))
                                        value="{{ date('Y-m-d', strtotime($record->purchase_receive_date)) }}"
                                        @else
                                        value="{{ old('purchase_receive_date') }}"
                                        @endif>

                                    @error('purchase_receive_date')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for="">Suppliers*</label>
                                    <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach ($supplier as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($record)) {{ ($item->id == $record->supplier_id) ? 'selected' : '' }} @endif>
                                            {{ $item->company }}</option>
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


                        <div class="form-group" id="product_item">
                            @if (isset($record))
                                @foreach (json_decode($record->data) as $key => $records)
                                <div class="row" id="material-row-{{$key}}">
                                    
                                    <div class="col-md">
                                        <label for="">Product name*</label>
                                        <select name="name[]" class="form-control @error('name') is-invalid @enderror" required>
                                            <option value="" selected disabled>Select One</option>
                                            @foreach (\App\Models\Material::get() as $item)
                                            <option value="{{ $item->id }}"
                                                @if(isset($records)) {{ ($item->id == $records->name) ? 'selected' : '' }} @endif>
                                                {{ $item->name }}</option>
                                            @endforeach
                                            
                                        </select>

                                        @error('name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                    

                                    <div class="col-md">
                                        <label for=""><b>Quantity*</b></label>
                                        <input type="text" name="quantity[]" id="quantity-{{$key}}"
                                            class="quantity form-control"
                                            onchange="calculator('{{$key}}')" value="{{ $records->quantity }}">
                                    </div>

                                    <div class="col-md">
                                    <label for="">Unit*</label>
                                    <select name="unit[]" id="" class="form-control @error('unit_id') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\Unit::get() as $item)
                                            <option value="{{ $item->id }}"
                                                @if(isset($records))
                                                    {{($records->unit == $item->id) ? 'selected' : ''}}
                                                @else{{(old('unit')== $item->id) ? 'selected' : ''}}

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
                                        <label for=""><b>Unit Price*</b></label>

                                        <input type="text" name="unit_price[]" id="unit_price-{{$key}}" 
                                            class="unit_price form-control" value="{{ $records->unit_price }}"
                                            onchange="calculator('{{$key}}')">
                                    </div>

                                    <div class="col-md">
                                        <label for=""><b>Discount(%)*</b></label>
                                        <input type="text" name="discount[]" id="discount-{{$key}}"
                                            class="discount form-control" value="{{ $records->discount }}"
                                            onkeyup="calculator('{{$key}}')">
                                    </div>

                                    <div class="col-md">
                                        <label><b>Sub Total</b></label>
                                        <input type="text" name="sub_total[]" class="form-control" readonly
                                            id="single-total-{{$key}}" value="{{ $records->sub_total }}">
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
                                    <label for="">Product Name*</label>
                                    <select name="name[]" id="productKey-0" class="form-control @error('name') is-invalid @enderror" required onchange="loadProductUnit('0')">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\Material::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($record))
                                                {{($record->name == $item->id)? 'selected':''}}
                                            @else{{(old('name')?'selected':'')}}  
                                            @endif  >
                                        {{$item->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            

                                <div class="col-md">
                                    <label for=""><b>Quantity*</b></label>
                                    <input type="text" name="quantity[]" id="quantity-0"
                                        class="quantity form-control"
                                        onchange="calculator('0')">
                                </div>


                                <div class="col-md" id="loadUnitFromAjax-0">
                                    <label for="">Unit*</label>
                                    <select name="unit[]" id="productUnit-0" class="form-control @error('unit_id') is-invalid @enderror" >
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\Unit::get() as $item)
                                            <option value="{{ $item->id }}"
                                                @if(isset($record))
                                                    {{($record->unit_id == $item->id) ? 'selected' : ''}}
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
                                    <label for=""><b>Unit Price*</b></label>

                                    <input type="text" name="unit_price[]" id="unit_price-0" 
                                        class="unit_price form-control"
                                        onchange="calculator('0')">
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Discount(%)*</b></label>
                                    <input type="text" name="discount[]" id="discount-0"
                                        class="discount form-control"
                                        onkeyup="calculator('0')">
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
                                    <label for=""><b>Transport Cost*</b></label>
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

                                <div class="col-md">
                                    <label for=""><b>Total Paid*</b></label>
                                    <input type="text" name="total_paid" id="total_paid"
                                        class="form-control @error('total_paid') is-invalid @enderror"
                                        onkeyup="totalCount()"
                                        @if(isset($record))
                                        value="{{ $record->total_paid }}"
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
                                    <label for=""><b>Due</b></label>
                                    <input type="text" name="due" id="due" readonly
                                        class="form-control @error('due') is-invalid @enderror"
                                        @if(isset($record))
                                        value="{{ $record->due }}"
                                        @else
                                        value="{{ old('due') }}"
                                        @endif>

                                    @error('due')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md">
                                <label for=""><b>Payment Method*</b></label>
                                <select name="payment_method" class="form-control @error('supplierID') is-invalid @enderror" required>
                                    <option value="" selected disabled>Select One</option>
                                    <option value="1" 
                                        @if(isset($record)) {{ ($record->payment_method == "1") ? 'selected' : '' }} @endif >
                                        Bank Payment
                                    </option>
                                    <option value="2" 
                                        @if(isset($record)) {{ ($record->payment_method == "2") ? 'selected' : '' }} @endif>Cash Payment</option>
                                    <option value="3" 
                                        @if(isset($record)) {{ ($record->payment_method == "3") ? 'selected' : '' }} @endif>Online Transaction</option>
                                </select>

                                @error('payment_method')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label for=""><b>Choose Image</b></label>
                                @if(isset($record))
                                <br>  <img src="{{ asset($record->image) }}" alt="image" width="200" class="img-fluid">
                                @endif
                                <input type="file" name="image" 
                                    class="form-control @error('image') is-invalid @enderror">

                                @error('image')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for=""><b>Purchase note*</b></label>
                            <textarea type="text" name="note" class="form-control @error('note') is-invalid @enderror"
                            >@if(isset($record)){{ $record->note }}@else{{ old('note')}}@endif</textarea>

                            @error('note')
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

@push('js')

    <script>

        const loadProductUnit = (index) => {
            const key = $("#productKey-"+index).val();
            // console.log(key);
            $.ajax({
                url: '{{route("material.unit")}}',
                type: 'GET',
                data:{
                    key: key
                },
                success: (res) => {
                    // console.log(res);
                    $("#loadUnitFromAjax-"+index).html(res);
                },
                error: (err) => {
                    console.log(err);
                }
            })

            $.ajax({
                url: '{{route("material.price")}}',
                type: 'GET',
                data:{
                    key: key
                },
                success: (res) => {
                    console.log(res);
                    $("#unit_price-"+index).val(res);
                },
                error: (err) => {
                    console.log(err);
                }
            })
        }

        @if (isset($record))
        let x = {{ count(json_decode($record->data)) - 1 }};
        @else
        let x = 0;
        @endif
        $("#add_product_item").click(function(){
            x++;
            var html = '<div class="row" id="material-row-'+ x +'">\
                                <div class="col-md-3">\
                                    <label for="">Material Name*</label>\
                                    <select name="name[]" id="productKey-'+x+'" class="form-control @error('name') is-invalid @enderror" required onchange="loadProductUnit('+x+')">\
                                        <option value="" selected disabled>Select One</option>\
                                        @foreach(\App\Models\Material::get() as $item)\
                                        <option value="{{ $item->id }}"\
                                            @if(isset($record))\
                                                {{($record->name == $item->id)? 'selected':''}}\
                                            @else{{(old('name')?'selected':'')}}  \
                                            @endif  >\
                                        {{$item->name}}</option>\
                                        @endforeach\
                                    </select>\
                                    @error('name')\
                                        <span class="invalid-feedback">\
                                            <strong>{{ $message }}</strong>\
                                        </span>\
                                    @enderror\
                                </div>\
                                <div class="col-md">\
                                <label for=""><b>Quantity</b></label>\
                                <input type="text" name="quantity[]" id="quantity-'+x+'"\
                                    class="form-control"\
                                    onchange="calculator('+ x +')">\
                            </div>\
                            <div class="col-md" id="loadUnitFromAjax-'+x+'">\
                                    <label for="">Unit*</label>\
                                    <select name="unit[]" id="" class="form-control @error('unit_id') is-invalid @enderror" required>\
                                        <option value="" selected disabled>Select One</option>\
                                        @foreach(\App\Models\Unit::get() as $item)\
                                            <option value="{{ $item->id }}"\
                                                @if(isset($record))\
                                                    {{($record->unit_id == $item->id) ? 'selected' : ''}}\
                                                @else{{(old('unit_id')== $item->id) ? 'selected' : ''}}\
                                                @endif> \
                                            {{$item->name}}</option>\
                                        @endforeach\
                                    </select>\
                                    @error('unit_id')\
                                        <span class="invalid-feedback">\
                                            <strong>{{ $message }}</strong>\
                                        </span>\
                                    @enderror\
                                </div>\
                            <div class="col-md">\
                                <label for=""><b>Unit Price</b></label>\
                                <input type="text" name="unit_price[]" id="unit_price-'+x+'"\
                                    class="form-control"\
                                    onchange="calculator('+x+')">\
                            </div>\
                            <div class="col-md">\
                                <label for=""><b>Discount(%)</b></label>\
                                <input type="text" name="discount[]" id="discount-'+x+'"\
                                    class="form-control"\
                                    onkeyup="calculator('+x+')"\>\
                            </div>\
                            <div class="col-md">\
                                <label><b>Sub Total</b></label>\
                                <input type="text" name="sub_total[]" class="form-control" id="single-total-'+x+'">\
                            </div>\
                            <div class="col-md p-2 ">\
                                <div class="btn btn-danger mt-4" id="remove_product_item" onclick="deleteRow('+x+')">\
                                    <i class="fas fa-times"></i>\
                                </div>\
                            </div>\
                        </div>';

            
            $("#product_item").append(html);
        })


        var deleteRow = (rowId) => {

            $("#product_item #material-row-"+rowId+"").remove();
            x--;
            totalCount();
        }


        var calculator = (key) => {

            let quantity = Number($('#quantity-'+key).val());
            let unit_price = Number($('#unit_price-'+key).val());
            let discount = Number($('#discount-'+key).val());

            // alert(key);

            // console.log(quantity, unit_price, discount);

            if(quantity != '' && unit_price != '')
            {
                // get total unit price
                let total_unit_price = quantity * unit_price;
                let singleTotal = total_unit_price - ((total_unit_price * discount) / 100);

                // show value
                $("#single-total-"+key).val(singleTotal.toFixed(2));

                totalCount();
                
            }
        }


        let totalCount = () => {

            let transportCost   = Number($("#transport_cost").val());
            let totalPaid       = Number($("#total_paid").val());
            let totalBill = 0;
            // alert(x);
            for(i=0; i<=x; i++)
            {
                totalBill += Number($("#single-total-"+i).val());
            }

            totalBill = totalBill + transportCost;
            let due = totalBill - totalPaid;

            $("#total_bill").val(totalBill.toFixed(2));
            $("#due").val(due.toFixed(2));

        }
    </script>
@endpush