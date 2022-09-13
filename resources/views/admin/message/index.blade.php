@extends("layouts.admin.app")

@section('content')

    <!-- Main content -->
    <section class="content my-5 ">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">

               <!-- col -->
                <div class="col-12 ">
                    <a href="{{ route('admin.message.list') }}" class="btn btn-link mr-5"> <i class="bi bi-arrow-left"></i> Back</a>
                    {{-- <a href="{{ route('admin.product.create') }}" class="btn btn-link"> <i class="bi bi-plus"></i> Add Products</a> --}}
                    
                    <div class="card shadow">
                        <div class="card-header">
                            <h5>Message from Customer</h5>
                        </div>
                        <div class="card-body table-responsive">
                            
                            <table id="example1" class="w-100 table-hover table-stripped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Location</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td>{{ __(++$key) }}</td>
                                            <td class="text-nowrap">{{ __($item->name) }}</td>
                                            <td>{{ __($item->email) }}</td>
                                            <td>{{ __($item->phone) }}</td>                                            
                                            <td>{{ __($item->location) }}</td>                                            
                                            <td class="text-nowrap">{{ __($item->subject) }}</td>
                                            <td class="p-3">{{ __($item->message) }}</td>
                                            <td class="text-nowrap">{{ date("d-M-Y H:i:s", strtotime($item->created_at)) }}</td>
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