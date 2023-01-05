@extends('layouts.app')

@section('web-content')
@section('page_title', 'profile')
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Party Profile</h1>
        <a href="{{ route('order') }}" class="btn btn-primary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

<!-- profile -->
    <div class="modal-content">

        <div class="modal-body" style="color:black;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <h4><b>Order No: </b> {{$records->id}}</h4>
                        <h4><b> Party Name :</b> {{$party->name}}</h4>
                        <h4><b> Party Phone:</b> {{$party->phone}}</h4>
                        <h4><b> Party Email:</b> {{$party->email}}</h4>
                        <h4><b> Company Name:</b> {{$party->company}}</h4>
                    </div>
                <div class="col-md-4 ml-auto">
                    <img src="{{asset($party->image)}}" alt="" sizes="width:60px;height:60px" class="img-fluid">
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover data-table" style="color:black;">
                    
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Discount(%)</th>
                                <th>Total</th>
                                <th>Total Paid</th>
                                <th>Due</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php $abc = json_decode($records->data);?>
                                    <table>
                                    @foreach($abc as $row)
                                    <tr>
                                        <td>
                                            {{\App\Models\product::find($row->name)->name}}
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
                                <td>{{$records->total_price}}</td>
                                <td>{{$records->total_paid}}</td>
                                <td>{{$records->due}}</td>
                                
                            </tr>
                            
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
  


@endsection