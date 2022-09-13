@extends("layouts.admin.app")

@section('page_name', 'Create Product')

@section('content')
    @push('css')
        <!--  Dropzone Css  -->
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    @endpush

    <!-- Main content -->
    <section class="content my-5 min-vh-100">
        <div class="container-fluid">

            <!-- Row -->
            <div class="row justify-content-center">

               <!-- col -->
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <a href="{{ url()->previous() }}" class="btn btn-link mr-5"> <i class="bi bi-arrow-left"></i> Back</a>

                    <div class="card card-primary shadow">
                        <div class="card-header">
                            Upload Slider Image    
                        </div>

                        <div class="card-body">

                            @if (isset($row))
                            <form action="{{ route('admin.slider.update') }}" method="POST" enctype="multipart/form-data">
                            @else
                            <form action="{{ route('admin.slider.file.upload') }}" method="POST" enctype="multipart/form-data">
                            @endif

                                @csrf

                                @isset($row)
                                    <input type="hidden" name="key" value="{{ $row->id }}">
                                    <img src="{{ asset($row->image_path) }}" class="img-fluid" width="200">
                                @endisset
                            
                            
                                <!-- Dropzone -->
                                <div class="form-group pb-3">
                                    <label for="">Slider Image</label>
                                    <input type="file" name="image" class="form-control @error('image') border-danger @enderror">
                                    
                                    @error('image')
                                        <span class="invalid-feedback">
                                            <strong> {{$message}} </strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Slide Title -->
                                <div class="form-group mb-3">
                                    <label for="">Slider Title</label>
                                    <input type="text" name="title" class="form-control @error('title') border-danger @enderror" placeholder="Title here..." required
                                    @if (isset($row))
                                        value='{{ $row->title }}'
                                    @else
                                        value='{{ old('title') }}'
                                    @endif
                                    >                                
                                    
                                    @error('title')
                                    <span class="invalid-feedback">
                                        <strong> {{$message}} </strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Slide Title -->
                                <div class="form-group mb-3">
                                    <label for="">Slider Title (In Bangla)</label>
                                    <input type="text" name="title_in_bangla" class="form-control @error('title_in_bangla') border-danger @enderror" placeholder="Title here in bangla..." required
                                    @if (isset($row))
                                        value='{{ $row->title_in_bangla }}'
                                    @else
                                        value='{{ old('title_in_bangla') }}'
                                    @endif
                                    >                                
                                    
                                    @error('title_in_bangla')
                                    <span class="invalid-feedback">
                                        <strong> {{$message}} </strong>
                                    </span>
                                    @enderror
                                </div>


                                <button class="btn btn-primary">Save</button>

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


@push('js')
    
    <!--  Dropzone  -->
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    
    <script>
        var DropZoneUpload = new Dropzone("#fileUpload", {
            url: '{{route("admin.slider.file.upload")}}',
            autoProcessQueue: false,
            acceptedFiles: '.png,.jpg,.jpeg,.webp',
            success: (res) => {
                location.replace("{{ route('admin.slider.list') }}");
            }
        });
        
        $('#dropZoneBtn').click(function(e){
            e.preventDefault();
            DropZoneUpload.processQueue();
        })
    </script>
    
@endpush