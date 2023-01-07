@extends('layouts.app')

@section('web-content')
@section('page_title', 'profile')
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Party Profile</h1>
        <a href="{{ route('party') }}" class="btn btn-primary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

<!-- profile -->
    <div class="modal-content">

        <div class="modal-body" style="color:black;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <h4><b> Party Name :</b> {{$parties->name}}</h4>
                        <h4><b> Party Phone:</b> {{$parties->phone}}</h4>
                        <h4><b> Party Email:</b> {{$parties->email}}</h4>
                        <h4><b> Company Name:</b> {{$parties->company}}</h4>
                    </div>
                <div class="col-md-4 ml-auto">
                    <img src="{{asset($parties->image)}}" alt="" sizes="width:60px;height:60px" class="img-fluid">
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover data-table" style="color:black;">
                    
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order NO</th>
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