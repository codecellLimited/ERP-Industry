@extends('layouts.app')
@section('web-content')

<!-- page heading  -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0 text-gray-800 "> Order List</h1>
    <a href="{{route('order.create')}}" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        <span>Add new Order</span>
    </a>

</div>

<!-- page contain  -->
<div class="card shadow">
    <div class="card-body card-responsive">
        <table class="table table-striped table-hover" style="color:black;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order Image</th>
                    <th>Order Name</th>
                    <th>Party Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Transport Cost</th>
                    <th>Total Discount</th>
                    <th>Total Bill</th>
                    <th>Total Paid</th>
                    <th>Total Due</th>
                    <th>Status</th>
                    
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($order as $key =>$item)
                <tr>
                    <th scope="row" >{{++$key}}</th>
                    <td><img src="{{ asset($item->image) }}" alt="" class="img-fluid rounded-circle m-auto d-block" width="50"></td>
                    <td>{{\App\Models\Product::find($item->product_id)->name}}</td>
                    <td>{{Str::upper( \App\Models\party::find($item->party_id)->name)}}</td>
                    <td>{{$item->quantity}} {{\App\Models\Unit::find($item->unit_id)->name}}</td>
                    <td>{{$item->unit_price}}</td>
                    <td>{{$item->transport_cost	}}</td>
                    <td>{{$item->total_discount}}</td>
                    <td>{{$item->grand_total}}</td>
                    <td>{{$item->total_paid}}</td>
                    <td>{{$item->total_due}}</td>
                    <td>
                        <input onchange="changeStatus('{{$item->id}}')" id="toggle-class-{{$item->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="On Production" data-off="Done" {{ $item->status ? 'checked' : '' }}>
                     </td>
                    <td class="text-nowrap">
                            <a href="{{ route('order.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('order/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button>
                    </td>
                </tr>
                @empty
                <div class="col-12 py-5 text-center">
                    <tr>
                        <td colspan="11" style="text-align: center;">No record found</td>
                    </tr>
                </div>
                @endforelse
            </tbody>
        </table>

    </div>

</div>

@endsection

@push('js')

<script>
    function changeStatus(oid){
        var status = $("#toggle-class-"+oid).prop('checked') == true ? 1 : 2;
        
        $.ajax({
            type: "GET",
            url: 'order/completed',
            data: {'status': status, 'oid': oid},
            success: function(data){
              console.log(data)
            },
            error: function(err){
                consol.log(err);
            }
        });
    }    
</script>



@endpush