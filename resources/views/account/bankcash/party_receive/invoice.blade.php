@extends('layouts.app')

@section('web-content')
@section('page_title', 'invoice')
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Party Receive Invoice</h1>
        <button class="btn btn-sm btn-outline-primary" onclick="printDiv('printDiv')">
            <i class="fa fa-print"></i>
            Print
        </button>
        <a href="{{ route('partyreceive') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

<!-- profile -->
    <div class="modal-content">

        <div class="modal-body py-5" style="color:black;" id="printDiv">
        <br>
            <div class="container-fluid">
                <div class="row mb-5">
                    <div class="col-md-8">
                        <h4><b>Transection Date: </b> {{date('d-m-Y H:i:s A')}}</h4>
                        <h4><b>Transection No: </b> {{$record->id}}</h4>
                        
                        @if($record->purpose == 1)
                            <h4><b> Party Name :</b> {{$party->name}}</h4>
                            <h4><b> Party Phone:</b> {{$party->phone}}</h4>
                            <h4><b> Party Email:</b> {{$party->email}}</h4>
                            <h4><b> Company Name:</b> {{$party->company}}</h4>
                        
                        @else
                            <h4><b> Supplier Name :</b> {{$supplier->name}}</h4>
                            <h4><b> Supplier Phone:</b> {{$supplier->phone}}</h4>
                            <h4><b> Supplier Email:</b> {{$supplier->email}}</h4>
                            <h4><b> Company Name:</b> {{$supplier->company}}</h4>
                        
                        @endif

                    </div>
                <div class="col-md-4 ml-auto">
                    @if($record->purpose ==2)
                        <img src="{{asset($supplier->image)}}" alt="" style="width:200px;height:200px" class="img-fluid">
                    
                    @else
                        <img src="{{asset($party->image)}}" alt="" style="width:200px;height:200px" class="img-fluid">
                
                    
                    @endif
                    </div>
            </div>
            <div class="card shadow col-md-6">
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover" style="color:black;">
                    
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Total Price</th>
                                <th>Previous Due</th>
                                <th>Paid</th>
                                <th>Current Due</th>        
                            </tr>
                        </thead>
                        <tbody>
                            <?php $abc = json_decode($record->data);?>

                            <tr>
                                <td>{{$record->order_id}} </td>
                                @if($record->purpose == 1)
                                    <td>{{$order->total_price}}</td>
                                
                                @else
                                    <td>{{$purchase->total_price}}</td>

                                
                                @endif
                                <td>{{$record->due}} </td>
                                <td>{{$record->amount}} </td>
                                <td>{{$record->due - $record->amount}} </td>
                                
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