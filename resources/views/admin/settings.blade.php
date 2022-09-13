@extends("layouts.admin.app")

@section('content')

    <!-- Main content -->
    <section class="content my-5">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">
                <!-- col -->
                <div class="text-nowrap mb-4 col-lg-6 col-md-8 col-sm-10">

                    <div class="text-center my-3">
                        <h4>Settings</h4>
                    </div>

                    <div class="card shadow">
                        <div class="card-body">

                            <form action="{{ route('admin.app.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="border-bottom border-secondary mb-3">
                                    <h6>App Details</h6>
                                </div>

                                <div class="form-group mb-3">                                
                                    <div class="row">
                                        <div class="col-3">
                                            @if (is_null(AppProperties()->app_logo))
                                            <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="Profile Image" class="img-fluid rounded-circle shadow" width="100">
                                            @else
                                            <img src="{{ asset(AppProperties()->app_logo) }}" alt="Profile Image" class="img-fluid rounded-circle shadow" width="100"> 
                                            @endif
                                            
                                        </div>
                                        <div class="col">
                                            <label for="">App Logo</label>
                                            <input type="file" name="app_logo" class="form-control @error('appLogo') is-invalid  @enderror">

                                            @error('appLogo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>


                                <div class="form-group mb-3">
                                    <label for="">App Name</label>
                                    <input type="text" name="app_name" class="form-control @error('appName') is-invalid  @enderror" value="{{ AppProperties()->app_name }}" required>
                                
                                    @error('appName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">App Url</label>
                                    <input type="text" name="app_url" class="form-control @error('appUrl') is-invalid  @enderror" value="{{ AppProperties()->app_url }}" required>
                                
                                    @error('appUrl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="border-bottom border-secondary mt-5 mb-3">
                                    <h6>Contact Details</h6>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="">Contact Number</label>
                                    <input type="text" name="contact_number" class="form-control @error('contact_number') border-danger  @enderror" 
                                    value="{{ AppProperties()->contact_number }}" required>
                                
                                    @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label for="">Contact Email</label>
                                    <input type="email" name="contact_email" class="form-control @error('contact_email') border-danger  @enderror" 
                                    value="{{ AppProperties()->contact_email }}" required>
                                
                                    @error('contact_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label for="">Location</label>
                                    <input type="text" name="location" class="form-control @error('location') border-danger  @enderror" 
                                    value="{{ AppProperties()->location }}" required>
                                
                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!--

                                <div class="border-bottom border-secondary mt-5 mb-3">
                                    <h6>SMTP Details</h6>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Mail Host</label>
                                    <input type="text" name="mail_host" class="form-control @error('mail_host') is-invalid  @enderror" value="{{ AppProperties()->mail_host }}" required>
                                
                                    @error('mail_host')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label for="">Mail Port</label>
                                    <input type="text" name="mail_port" class="form-control @error('mail_port') is-invalid  @enderror" value="{{ AppProperties()->mail_port }}" required>
                                
                                    @error('mail_port')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label for="">Mail Username</label>
                                    <input type="text" name="mail_username" class="form-control @error('mail_username') is-invalid  @enderror" value="{{ AppProperties()->mail_username }}" required>
                                
                                    @error('mail_username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label for="">Mail Password</label>
                                    <input type="text" name="mail_password" class="form-control @error('mail_password') is-invalid  @enderror" value="{{ AppProperties()->mail_password }}" required>
                                
                                    @error('mail_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Mail Encryption</label>
                                    <input type="text" name="mail_encryption" class="form-control @error('mail_encryption') is-invalid  @enderror" value="{{ AppProperties()->mail_encryption }}" required>
                                
                                    @error('mail_encryption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label for="">Mail From Address</label>
                                    <input type="text" name="mail_from_address" class="form-control @error('mail_from_address') is-invalid  @enderror" value="{{ AppProperties()->mail_from_address }}" required>
                                
                                    @error('mail_from_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            -->

                                <button class="btn btn-primary mt-3">Save</button>
                            </form>
                            
                        </div>
                    </div>

                </div>

            </div><!-- Row -->
        </div>
    </div>

@endsection