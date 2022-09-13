@extends("layouts.admin.app")

@section('page_name', 'Category')

@section('content')

    <!-- Main content -->
    <section class="content my-5 pt-3">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">

               <!-- col -->
                <div class="col-md-10">
                    <a href="{{ url()->previous() }}" class="btn btn-link mr-5"> <i class="bi bi-arrow-left"></i> Back</a>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-link"> <i class="bi bi-plus"></i> Create Category</a>

                    <div class="card shadow">
                        <div class="card-header">
                            <h5>Categories</h5>
                        </div>
                        <div class="card-body table-responsive">

                            <table id="example1" class="text-nowrap w-100 table-hover table-stripped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td>{{ __(++$key) }}</td>
                                            <td>{{ __($item->category_name) }}</td>
                                            <td>
                                                <a title="{{ ($item->status) ? 'Active' : 'Inactive' }}" href="javascript::" class="btn {{ ($item->status) ? 'btn-success' : 'btn-secondary' }}"
                                                    onclick="if(confirm('Are your sure? Do you want to change status?')){ location.replace('{{ route('admin.category.status', $item->id) }}') }">
                                                    <i class="bi {{ ($item->status) ? 'bi-check2-circle' : 'bi-x-circle' }}"></i>
                                                </a>
                                            </td>
                                            <td>{{ date("d-M-Y H:i:s", strtotime($item->created_at)) }}</td>
                                            <td>
                                                <a title="Update" href="{{ route('admin.category.edit', [$item->id])}}" class="btn btn-success">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                                <a title="Delete" href="javascript::"
                                                    onclick="if(confirm('Are your sure? Do you want to delete?')){ location.replace('{{ route('admin.category.delete', $item->id) }}') }"
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