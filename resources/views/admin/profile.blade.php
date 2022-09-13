@extends("layouts.admin.app")

@section('content')

    <!-- Main content -->
    <section class="content my-5 ">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">
                <!-- col -->
                <div class="text-nowrap mb-4 col-lg-6 col-md-8 col-sm-10">

                    <div class="card shadow">
                        <div class="card-header">
                            Profile
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">                                
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="{{ asset(auth()->guard('admin')->user()->image) }}" alt="Profile Image" class="img-fluid rounded-circle shadow" width="100">
                                        </div>
                                        <div class="col">
                                            <label for="">Profile Image</label>
                                            <input type="file" name="image" class="form-control  @error('image') is_invalid @enderror">
                                        
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    
                                </div>


                                <div class="form-group mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control  @error('name') is_invalid @enderror" value="{{ auth()->guard('admin')->user()->name }}" required>
                                
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is_invalid @enderror" value="{{ auth()->guard('admin')->user()->email }}" required>
                                
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button class="btn btn-primary">Save</button>
                            </form>
                            
                        </div>
                    </div>

                </div>

            </div><!-- Row -->
        </div>
    </div>

@endsection