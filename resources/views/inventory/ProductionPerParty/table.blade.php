@extends('layouts.app')

@section('page_title', 'Production Per Order')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Production Per Order</h1>
        
    </div>


        

   <div class="row">
        @forelse ($orderid as $item)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card shadow">
                <div class="card-body" style="color:black;">
                    <div class="my-3 text-center">
                        <img src="{{ asset($item->image) }}" alt="" class="img-fluid  m-auto d-block" style="width: 150px; height:100px;">
                        <br>
                        <h6><b>Order Name: </b>{{\App\Models\Product::find($item->product_id)->name}}</h6>
                        <h6><b>Party Name: </b>{{\App\Models\party::find($item->party_id)->name}}</h6>
                        <h6><b>Total Order: </b>{{$item->quantity }}</h6>
                            
                
                        <h6><b>Total Production: </b>{{\App\Models\ProductionPerDay:: where('order_id', $item->id)->sum('production')}}</h6>
                        
                        <h6><b>Production Left: </b>{{$item->quantity - \App\Models\ProductionPerDay:: where('order_id', $item->id)->sum('production')}}</h6>

                        <button class="btn btn-sm btn-primary"
                        onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('ProductionPerParty/delete/{{$item->id}}'); }">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 py-5 text-center">
            <h4 class="text-muted"><b>No Record Yet</b></h4>
        </div>
        @endforelse
   </div>


@endsection