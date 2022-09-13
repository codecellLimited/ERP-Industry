@extends("layouts.admin.app")

@section('content')

    <!-- Main content -->
    <section class="content my-5 pt-5">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row">
                <!-- col -->
                <div class="text-nowrap mb-4 col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <!-- card -->
                    <div class="card shadow">
                        <div class="card-body">
                            <a href="{{ route('admin.message.list') }}" class="text-dark">
                                <div class="row">
                                    <div class="col">
                                        <h2>{{ __(\App\Models\CustomerMessage::count()) }}</h2>
                                        <h5>Customer Messages</h5>
                                    </div>
                                    <div class="col text-right">
                                        <i class="bi bi-chat-right-text" style="font-size: 50px"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div><!-- card -->
                </div><!-- col -->     
                
                
                <!-- col -->
                <div class="text-nowrap mb-4 col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <!-- card -->
                    <div class="card shadow">
                        <div class="card-body">
                            <a href="{{ route('admin.blog.list') }}" class="text-dark">
                                <div class="row">
                                    <div class="col">
                                        <h2>{{ __(\App\Models\Blog::count()) }}</h2>
                                        <h5>Blogs</h5>
                                    </div>
                                    <div class="col text-right">
                                        <i class="bi bi-journal-text" style="font-size: 50px"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div><!-- card -->
                </div><!-- col --> 


                <!-- col -->
                <div class="text-nowrap mb-4 col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <!-- card -->
                    <div class="card shadow">
                        <div class="card-body">
                            <a href="{{ route('admin.service.list') }}" class="text-dark">
                                <div class="row">
                                    <div class="col">
                                        <h2>{{ __(\App\Models\Service::count()) }}</h2>
                                        <h5>Success Stories</h5>
                                    </div>
                                    <div class="col text-right">
                                        <i class="bi bi-clock-history" style="font-size: 50px"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div><!-- card -->
                </div><!-- col --> 

            </div><!-- Row -->
        </div>
    </div>

@endsection