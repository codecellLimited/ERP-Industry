@extends('layouts.app')

@section('web-content')
@section('page_title', 'profile')
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Supplier Profile</h1>
        <a href="{{ route('suppliers') }}" class="btn btn-primary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

<!-- profile -->
    <div class="modal-content">

        <div class="modal-body" style="color:black;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <h4><b> Supplier Name :</b> {{$Suppliers->name}}</h4>
                        <h4><b> Supplier Phone:</b> {{$Suppliers->phone}}</h4>
                        <h4><b> Supplier Email:</b> {{$Suppliers->email}}</h4>
                        <h4><b> Company Name:</b> {{$Suppliers->company}}</h4>
                    </div>
                <div class="col-md-4 ml-auto">
                    <img src="{{asset($Suppliers->image)}}" alt="" sizes="width:60px;height:60px" class="img-fluid">
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover data-table" style="color:black;">
                    
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Purchase NO</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Discount(%)</th>
                                <th>Sub Total</th>
                                <th>Transport Cost</th>
                                <th>Total</th>
                                <th>Total Paid</th>
                                <th>Due</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($records as $key =>$item)
                            <tr>
                                <th scope="row" >{{++$key}}</th>
                                <td>{{$item->id}}</td>
                                <td>
                                    <?php $abc = json_decode($item->data);?>
                                    <table>
                                    @foreach($abc as $row)
                                    <tr>
                                        <td>
                                            {{\App\Models\materialForSupplier::find($row->product_id)->name}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </table>
                                </td>
                                <td>
                                    
                                    <table>
                                        @foreach($abc as $row)
                                        <tr>
                                            <td>{{$row->quantity}} {{\App\Models\unit::find($row->unit)->name}} </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>
                                    
                                    <table>
                                        @foreach($abc as $row)
                                        <tr>
                                            <td>{{$row->unit_price}} </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>
                                    
                                    <table>
                                        @foreach($abc as $row)
                                        <tr>
                                            <td>{{$row->discount}} </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>
                                    
                                    <table>
                                        @foreach($abc as $row)
                                        <tr>
                                            <td>{{$row->sub_total}} </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>{{$item->transport_cost}}</td>
                                <td>{{$item->total_price}}</td>
                                <td>{{$item->total_paid}}</td>
                                <td>{{$item->due}}</td>
                                
                            </tr>
                            @empty
                            <div class="col-12 py-5 text-center">
                                <tr>
                                    <td colspan='9'>No Record Found</td>
                                </tr>
                            </div>
                            @endforelse
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
  


@endsection