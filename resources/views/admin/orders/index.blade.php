@extends("layouts.app")

@section('content')

    <!-- Main content -->
    <section class="content my-5 ">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">

               <!-- col -->
                <div class="col-12 ">
                    <a href="{{ route('admin.order.list') }}" class="btn btn-link mr-5"> <i class="bi bi-arrow-left"></i> Back</a>
                    {{-- <a href="{{ route('admin.product.create') }}" class="btn btn-link"> <i class="bi bi-plus"></i> Add Products</a> --}}
                    
                    <div class="card shadow">
                        <div class="card-header">
                            <h5>Orders</h5>
                        </div>
                        <div class="card-body table-responsive">
                            
                            <table id="example1" class="text-nowrap w-100 table-hover table-stripped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>In-Stock</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td>{{ __(++$key) }}</td>
                                            <td>
                                                @if ($item->Image->count() > 0)
                                                    <img src="{{ asset($item->Image->first()->file_path) }}" alt="{{ $item->name }}" width="100" class="img-fluid">
                                                @else
                                                No image uploaded        
                                                @endif
                                                                                        
                                            </td>
                                            <td>{{ __($item->category->category_name) }}</td>
                                            <td>{{ __($item->product_name) }}</td>
                                            <td>{{ __($item->price) }}</td>
                                            <td>{{ __($item->quantity) }}</td>
                                            <td>
                                                <a title="{{ ($item->in_stock) ? 'In stock' : 'Out of stock' }}" href="javascript::" class="btn {{ ($item->in_stock) ? 'btn-success' : 'btn-secondary' }}"
                                                    onclick="if(confirm('Are your sure? Do you want to change this?')){ location.replace('{{ route('admin.product.stock', $item->id) }}') }">
                                                    <i class="bi {{ ($item->in_stock) ? 'bi-bag-check' : 'bi-bag-x' }}"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a title="{{ ($item->status) ? 'Active' : 'Inactive' }}" href="javascript::" class="btn {{ ($item->status) ? 'btn-success' : 'btn-secondary' }}"
                                                    onclick="if(confirm('Are your sure? Do you want to change status?')){ location.replace('{{ route('admin.product.status', $item->id) }}') }">
                                                    <i class="bi {{ ($item->status) ? 'bi-check2-circle' : 'bi-x-circle' }}"></i>
                                                </a>
                                            </td>
                                            <td>{{ date("d-M-Y H:i:s", strtotime($item->created_at)) }}</td>
                                            <td>
                                                <a title="Update" href="{{route('admin.product.edit', $item->id)}}" class="btn btn-success">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                                <a title="Delete" href="javascript::"
                                                    onclick="if(confirm('Are your sure? Do you want to delete this?')){ location.replace('{{ route('admin.product.delete', $item->id) }}') }"
                                                    class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               <!-- col -->


            </div><!-- Row -->
        </div>
    </div>

@endsection