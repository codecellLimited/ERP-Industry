@extends('layouts.app')

@section('page_title', 'Total Production')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Total Production </h1>
        
    </div>

    

   <div class="row" style="color:black;">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">

                    <div class="form-group">
                        <form action="{{route('search')}}" method="POST" id="orderIdForm">
                            @csrf
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md">
                                        <label for=""><b>Start Date</b></label>
                                        <input type="date" name="startdate" 
                                            class="form-control @error('startdate') is-invalid @enderror">

                                        @error('startdate')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                
                                    </div>
                                    <div class="col-md float">
                                        <label for=""><b>End Date</b></label>
                                        <input type="date" name="enddate" 
                                            class="form-control @error('enddate') is-invalid @enderror">

                                        @error('enddate')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                
                                    </div>

                                    <div class="col">
                                        <br>
                                        <button class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
   </div>

        <br><br><br>


    
    

    @if(isset($datebetween))
    <div class="row">
            @forelse ($datebetween as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body" style="color:black;">
                        <div class="my-3 text-center">
                            <img src="{{ asset($item->image) }}" alt="" class="img-fluid  m-auto d-block" style="width: 150px; height:100px;">
                            <br>
                            <h6><b>Product Name: </b>{{$item->name}}</h6>

                            <h6><b>Total Production: </b>{{\App\Models\ProductionPerDay:: where('product_id', $item->id)
                                                                                       -> whereBetween('production_date', [$startdate, $enddate])
                                                                                        ->sum('production')}}</h6>
                            <button class="btn btn-sm btn-primary disabled"
                            onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('totalProduction/delete/{{$item->id}}'); }">
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
    

    @endif
    @if(isset($productId))
        <div class="row">
            @forelse ($productId as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body" style="color:black;">
                        <div class="my-3 text-center">
                            <img src="{{ asset($item->image) }}" alt="" class="img-fluid  m-auto d-block" style="width: 150px; height:100px;">
                            <br>
                            <h6><b>Product Name: </b>{{\App\Models\Product::find($item->id)->name}}</h6>

                            <h6><b>Total Production: </b>{{\App\Models\ProductionPerDay:: where('product_id', $item->id)->sum('production')}}</h6>
                            <button class="btn btn-sm btn-primary disabled" Type="button"
                            onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('totalProduction/delete/{{$item->id}}'); }">
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
    @endif

@endsection