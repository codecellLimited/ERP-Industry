@extends("layouts.admin.app")

@section('page_name', 'Testimonial')

@section('content')

    <!-- Main content -->
    <section class="content my-5 ">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">

               <!-- col -->
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <a href="{{ url()->previous() }}" class="btn btn-link mr-5"> <i class="bi bi-arrow-left"></i> Back</a>

                    <div class="card shadow">
                        <div class="card-header">
                            @if(!isset($row))
                            <span class="h5">Add Team Member</span>
                            @else
                            <span>Update Testimonial</span>
                            @endif                            
                        </div>

                        <div class="card-body">


                            @if (isset($row))
                            <form action="{{ route('admin.team.update') }}" method="post" enctype="multipart/form-data">
                            @else
                            <form action="{{ route('admin.team.store') }}" method="post" enctype="multipart/form-data">
                            @endif
                                @csrf

                                @isset($row)
                                <input type="hidden" name="key" value="{{ __($row->id) }}">
                                @endisset                                

                               
                                <!-- Image -->
                                <div class="form-group mb-3">
                                    <label for="">Profile Image</label><br>
                                    
                                    @if (isset($row))
                                        <img src="{{ asset($row->image) }}" alt="{{ $row->title }}" width="100" class="img-fluid">
                                    @endif

                                    <input type="file" name="image" class="form-control @error('image') border-danger @enderror" @if(!isset($row)) required @endif>

                                    
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--  User Name  -->
                                <div class="form-group mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') border-danger @enderror" 
                                    @if (isset($row))
                                        value="{{ __($row->name) }}"
                                    @else
                                        value="{{ old('name') }}"
                                    @endif>

                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!--  Designation  -->
                                <div class="form-group mb-3">
                                    <label for="">Designation</label>
                                    <input type="text" name="designation" class="form-control @error('designation') border-danger @enderror" 
                                    @if (isset($row))
                                        value="{{ __($row->designation) }}"
                                    @else
                                        value="{{ old('designation') }}"
                                    @endif>

                                    
                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--  facebook  -->
                                <div class="form-group mb-3">
                                    <label for="">Facebook</label>
                                    <input type="text" name="facebook" class="form-control @error('facebook') border-danger @enderror" 
                                    placeholder="https://www.facebook.com/username"
                                    @if (isset($row))
                                        value="{{ __($row->facebook) }}"
                                    @else
                                        value="{{ old('facebook') }}"
                                    @endif>

                                    
                                    @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!--  twitter  -->
                                <div class="form-group mb-3">
                                    <label for="">Twitter</label>
                                    <input type="text" name="twitter" class="form-control @error('twitter') border-danger @enderror" 
                                    placeholder="https://www.twitter.com/username"
                                    @if (isset($row))
                                        value="{{ __($row->twitter) }}"
                                    @else
                                        value="{{ old('twitter') }}"
                                    @endif>

                                    
                                    @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!--  facebook  -->
                                <div class="form-group mb-3">
                                    <label for="">Linkedin</label>
                                    <input type="text" name="linkedin" class="form-control @error('linkedin') border-danger @enderror" 
                                    placeholder="https://www.linkedin.com/in/username"
                                    @if (isset($row))
                                        value="{{ __($row->linkedin) }}"
                                    @else
                                        value="{{ old('linkedin') }}"
                                    @endif>

                                    
                                    @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--  facebook  -->
                                <div class="form-group mb-3">
                                    <label for="">Instagram</label>
                                    <input type="text" name="instagram" class="form-control @error('instagram') border-danger @enderror" 
                                    placeholder="https://www.instagram.com/username"
                                    @if (isset($row))
                                        value="{{ __($row->instagram) }}"
                                    @else
                                        value="{{ old('instagram') }}"
                                    @endif>

                                    
                                    @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                

                                                  



                                @if (isset($row))
                                <button class="btn btn-primary" type="submit">Update</button>
                                @else
                                <button class="btn btn-primary" type="submit">Create</button>
                                @endif
                            </form>

                        </div>
                    </div>

                </div>
               <!-- col -->


            </div>
            <!-- //. Row -->
        </div>
    </section>

@endsection
