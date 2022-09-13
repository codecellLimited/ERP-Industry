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
                            <span class="h5">Create Testimonial</span>
                            @else
                            <span>Update Testimonial</span>
                            @endif                            
                        </div>

                        <div class="card-body">


                            @if (isset($row))
                            <form action="{{ route('admin.testimonial.update') }}" method="post" enctype="multipart/form-data">
                            @else
                            <form action="{{ route('admin.testimonial.store') }}" method="post" enctype="multipart/form-data">
                            @endif
                                @csrf

                                @isset($row)
                                <input type="hidden" name="key" value="{{ __($row->id) }}">
                                @endisset                                

                               
                                <!-- Image -->
                                <div class="form-group mb-3">
                                    <label for="">User Image</label><br>
                                    
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
                                    <label for="">Username</label>
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
                                    <input type="text" name="position" class="form-control @error('position') border-danger @enderror" 
                                    @if (isset($row))
                                        value="{{ __($row->position) }}"
                                    @else
                                        value="{{ old('position') }}"
                                    @endif>

                                    
                                    @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                

                                <!--  Comment  -->
                                <div class="form-group mb-3">
                                    <label for="">Comment (In English)</label>
                                    <textarea name="content" class="form-control" rows="5" id="content">@if(isset($row)) {!! $row->content !!} @else {!! old('content') !!} @endif</textarea>
                                
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--  Comment  -->
                                <div class="form-group mb-3">
                                    <label for="">Comment (In Bangla)</label>
                                    <textarea name="content_in_bangla" class="form-control" rows="5" id="content">@if(isset($row)) {!! $row->content_in_bangla !!} @else {!! old('content_in_bangla') !!} @endif</textarea>
                                
                                    @error('content_in_bangla')
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
