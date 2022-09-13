@extends("layouts.admin.app")

@section('content')

    <!-- Main content -->
    <section class="content my-5 ">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">

               <!-- col -->
                <div class="col-10 ">
                    {{-- <a href="{{ route('admin.service.list') }}" class="btn btn-link mr-5"> <i class="bi bi-arrow-left"></i> Back</a> --}}
                    
                    
                    <div class="card shadow">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5>Success Stories</h5>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ route('admin.service.create') }}" class="btn btn-outline-primary"> <i class="bi bi-plus"></i> Create Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            
                            <table id="example1" class="text-nowrap w-100 table-hover table-stripped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td>{{ __(++$key) }}</td>
                                            <td>
                                                @if ($item->image != null)
                                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" width="100" class="img-fluid">
                                                @else
                                                No image uploaded        
                                                @endif
                                                                                        
                                            </td>
                                            <td>{{ __($item->title) }}</td>
                                            
                                            <td>
                                                <a title="{{ ($item->status) ? 'Active' : 'Inactive' }}" href="javascript::" class="btn {{ ($item->status) ? 'btn-success' : 'btn-secondary' }}"
                                                    onclick="if(confirm('Are your sure? Do you want to change status?')){ location.replace('{{ route('admin.service.status', $item->id) }}') }">
                                                    <i class="bi {{ ($item->status) ? 'bi-check2-circle' : 'bi-x-circle' }}"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a title="Update" href="{{route('admin.service.edit', [$item->slug])}}" class="btn btn-success">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                                <a title="Delete" href="javascript::"
                                                    onclick="if(confirm('Are your sure? Do you want to delete this?')){ location.replace('{{ route('admin.service.delete', $item->id) }}') }"
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