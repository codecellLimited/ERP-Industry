@extends('layouts.app')

@section('web-content')
@section('page_title', 'profile')
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Party Profile</h1>
        <button class="btn btn-sm btn-outline-primary" onclick="printDiv('printDiv')">
            <i class="fa fa-print"></i>
            Print
        </button>
        <a href="{{ route('order') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

<!-- profile -->
    <div class="modal-content">

        <div class="modal-body py-5" style="color:black;" id="printDiv">
            <div class="container-fluid">
                <div class="row mb-5">
                    <div class="col-md-8">
                        <h4><b>Order No: </b> {{date('d-m-Y H:i:s A')}}</h4>
                        <h4><b>Order No: </b> {{$record->id}}</h4>
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
                    <table class="table table-striped table-hover" style="color:black;">
                    
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Discount(%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $abc = json_decode($record->data);?>

                            @foreach($abc as $row)
                            <tr>
                                <td>{{\App\Models\product::find($row->name)->name}}</td>
                                <td>{{$row->quantity}} {{\App\Models\unit::find($row->unit)->name}} </td>
                                <td>{{$row->unit_price}} </td>
                                <td>{{$row->discount}} </td>
                            </tr>
                            @endforeach
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td><b>Total Price :</b></td>
                                <td>{{$record->total_price}}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td><b>Total Paid :</b></td>
                                <td>{{$record->total_paid}}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td><b>Total Due :</b></td>
                                <td>{{$record->due}}</td>
                            </tr>
                        </tbody>
                    </table>

                    
                </div>

            </div>

        </div>
    </div>
@endsection

@push('js')
     <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endpush