@extends('layouts.app')
   
@section('page_title', 'Material Purchase List')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Material Purchases</h1>
        <a href="{{ route('purchase.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create Material Purchase
        </a>
    </div>


    
<!-- page contain  -->
<div class="card shadow">
    <div class="card-body table-responsive">
    

        <table class="table table-striped table-hover data-table-print" style="color:black;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Supplier Name</th>
                    <th>Quantity</th>
                    <th>Grand Total</th>
                    <th>Total Paid</th>
                    <th>Total Due</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($purchase as $key =>$item)
                <tr>
                    <th scope="row" >{{++$key}}</th>
                    <td><img src="{{ asset(\App\Models\materialForSupplier::find($item->material_id)->image) }}" alt="" class="img-fluid rounded-circle m-auto d-block" width="50"></td>
                    <td>{{\App\Models\materialForSupplier::find($item->material_id)->name}}</td>
                    <td>{{ Str::upper(\App\Models\supplier::find($item->supplierID)->name) }}</td>
                    <td>{{$item->quantity}} {{\App\Models\Unit::find($item->unit_id)->name}}</td>
                    <td>{{$item->grand_total}}</td>
                    <td>{{$item->total_paid	}}</td>
                    <td>{{$item->total_due}}</td>
                    
                    <td class="text-nowrap">
                            <a href="{{ route('purchase.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('purchase/delete/{{$item->id}}'); }">
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
        $(document).ready(function() {
            $('.data-table-print').DataTable( {
                dom: 'Bfrtip',
                ordering: false,
                buttons: [
                    {
                        extend: 'print',
                        exportOptions: {
                            stripHtml : false,
                            columns: [1, 2, 3, 4, 5, 6, 7] 
                            //specify which column you want to print
    
                        }
                    },
                    'excel', 'pdf',
                ]
            } );
        } );
    </script>
@endpush