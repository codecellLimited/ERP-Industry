@extends("layouts.admin.app")

@section('page_name', 'Create Service')

@section('content')
    @push('css')
        <!--  Dropzone Css  -->
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    @endpush

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
                            <span class="h5">Create Service</span>
                            @else
                            <span>Update Service</span>
                            @endif                            
                        </div>

                        <div class="card-body">
                            
                            <!-- Product Image -->
                            {{-- @isset($row)
                            <div class="form-group border-bottom border-secondary mb-5 pb-3">
                                <label for="">Product Image</label>
                                <form class="dropzone fileUpload" id="fileUpload">
                                    @csrf
                                    <input type="hidden" name="key" value="{{ $row->id }}">                                    
                                </form>
                                <button class="btn btn-primary" id="dropZoneBtn">Submit</button>
                                @error('image')
                                    <span class="invalid-feedback">
                                        <strong> {{$message}} </strong>
                                    </span>
                                @enderror
                            </div>
                            @endisset --}}



                            @if (isset($row))
                            <form action="{{ route('admin.service.update') }}" method="post" enctype="multipart/form-data">
                            @else
                            <form action="{{ route('admin.service.store') }}" method="post" enctype="multipart/form-data">
                            @endif
                                @csrf

                                @isset($row)
                                <input type="hidden" name="key" value="{{ __($row->id) }}">
                                @endisset                                

                                <!-- Product Category -->
                                {{-- <div class="form-group mb-3">
                                    <label for="category">Category</label>
                                    @if ($categories->count() > 0)
                                    <select name="category" id="category" 
                                            class="form-control  @error('category') border-danger @enderror" >

                                        <option value="" selected>Select a category</option>

                                        @foreach ($categories as $item)
                                        <option value="{{ $item->id }}" 
                                            @isset($row) {{($item->id == $row->category_id) ? 'selected' : ''}} @endisset>
                                            {{ __($item->category_name) }}
                                        </option>
                                        @endforeach

                                    </select>

                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @else
                                    <br>
                                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add Category</a>
                                    @endif                                 
                                </div> --}}

                                <!-- Image -->
                                <div class="form-group mb-3">
                                    <label for="">Feature Image</label><br>
                                    
                                    @if (isset($row))
                                        <img src="{{ asset($row->image) }}" alt="{{ $row->title }}" width="300" class="img-fluid">
                                    @endif

                                    <input type="file" name="image" class="form-control @error('image') border-danger @enderror" @if(!isset($row)) required @endif>

                                    
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--  Blog Title in Bangla  -->
                                <div class="form-group mb-3">
                                    <label for="">Service Title (In Bangla)</label>
                                    <input type="text" name="title_in_bangla" class="form-control @error('title_in_bangla') border-danger @enderror" 
                                    @if (isset($row))
                                        value="{{ __($row->title_in_bangla) }}"
                                    @else
                                        value="{{ old('title_in_bangla') }}"
                                    @endif>

                                    
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!--  Blog Title  -->
                                <div class="form-group mb-3">
                                    <label for="">Service Title (In English)</label>
                                    <input type="text" name="title" class="form-control @error('title') border-danger @enderror" 
                                    @if (isset($row))
                                        value="{{ __($row->title) }}"
                                    @else
                                        value="{{ old('title') }}"
                                    @endif>

                                    
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                

                                <!--  Content in Bangla  -->
                                <div class="form-group mb-3">
                                    <label for="">Content (In Bangla)</label>
                                    <textarea name="content_in_bangla" class="form-control" id="content_in_bangla">@if(isset($row)) {!! $row->content_in_bangla !!} @else {!! old('content_in_bangla') !!} @endif</textarea>
                                
                                    @error('content_in_bangla')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!--  Content  -->
                                <div class="form-group mb-3">
                                    <label for="">Content (In English)</label>
                                    <textarea name="content" class="form-control" id="content">@if(isset($row)) {!! $row->content !!} @else {!! old('content') !!} @endif</textarea>
                                
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <!--    Tags   -->
                                {{-- <div class="form-group mb-3">
                                    <label for="">Tags</label>
                                    <input type="text" name="tags" class="form-control @error('tags') border-danger @enderror" 
                                    placeholder="Tag1, Tag2, Tag3, ..."
                                    @if (isset($row))
                                        value="{{ __($row->tags) }}"
                                    @else
                                        value="{{ old('tags') }}"
                                    @endif>


                                    @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}



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


@push('js')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
    //Initialize Select2 Elements
    $('.select2').select2()
    </script>

    <!--  CkEditor.js  -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
        CKEDITOR.replace('content_in_bangla');
    </script>    

    <!--  Dropzone  -->
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        var DropZoneUpload = new Dropzone("#fileUpload", {
            url: '',
            autoProcessQueue: false,
            acceptedFiles: '.png,.jpg,.jpeg,.webp',
        });
        
        $('#dropZoneBtn').click(function(e){
            e.preventDefault();
            DropZoneUpload.processQueue();
        })
    </script>
    
@endpush