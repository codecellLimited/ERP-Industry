@extends('layouts.app')
@section('web-content')

<!-- page heading  -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0 text-gray-800 ">Delivered Order List</h1>
</div>

<!-- page contain  -->
<div class="card shadow">
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover" style="color:black;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order Image</th>
                    <th>Order Name</th>
                    <th>Party Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Bill</th>
                    <th>Total Paid</th>
                    <th>Total Due</th>
                </tr>
            </thead>
            <tbody>
                @forelse($completed as $key =>$item)
                <tr>
                    <th scope="row" >{{++$key}}</th>
                    <td><img src="{{ asset($item->image) }}" alt="" class="img-fluid rounded-circle m-auto d-block" width="50"></td>
                    <td>{{\App\Models\Product::find($item->product_id)->name}}</td>
                    <td>{{Str::upper( \App\Models\party::find($item->party_id)->name)}}</td>
                    <td>{{$item->quantity}} {{\App\Models\Unit::find($item->unit_id)->name}}</td>
                    <td>{{$item->unit_price}}</td>
                    <td>{{$item->grand_total}}</td>
                    <td>{{$item->total_paid}}</td>
                    <td>{{$item->total_due}}</td>
                </tr>
                @empty
                <div class="col-12 py-9 text-center">
                    <tr>
                        <td colspan="9" style="text-align: center;">No record found</td>
                    </tr>
                </div>
                @endforelse
            </tbody>
        </table>

    </div>

</div>

@endsection
