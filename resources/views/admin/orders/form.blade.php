@extends("layouts.app")

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
                            <span class="h5">Create new product</span>
                            @else
                            <span>Update product details</span>
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
                            <form action="{{ route('admin.product.update') }}" method="post" enctype="multipart/form-data">
                            @else
                            <form action="{{ route('admin.product.create') }}" method="post" enctype="multipart/form-data">
                            @endif
                                @csrf                       

                                @isset($row)
                                <input type="hidden" name="key" value="{{ __($row->id) }}">
                                @endisset                                

                                <!-- Product Category -->
                                <div class="form-group mb-3">
                                    <label for="category">Category</label>
                                    @if ($data->count() > 0)
                                    <select name="category" id="category" 
                                            class="form-control  @error('category') border-danger @enderror" >

                                        <option value="" selected>Select a category</option>

                                        @foreach ($data as $item)
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
                                </div>

                                <!-- Product Image -->
                                <div class="form-group mb-3">
                                    <label for="">Product Image</label><br>
                                    @if (isset($row))
                                        @forelse ($row->Image as $item)
                                        <div class="position-relative mb-2 mr-2 d-inline">
                                            <a href="{{ route('admin.product.file.remove', $item->id) }}" class="position-absolute badge bg-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <img src="{{ asset($item->file_path) }}" alt="Image" class="img-fluid" width="130">
                                        </div>
                                        @empty
                                            
                                        @endforelse
                                    @endif
                                    <input type="file" name="productImage[]" class="form-control @error('productImage') border-danger @enderror" multiple required>

                                    
                                    @error('productImage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--  Product Name  -->
                                <div class="form-group mb-3">
                                    <label for="">Product Title</label>
                                    <input type="text" name="productName" class="form-control @error('productName') border-danger @enderror" 
                                    @if (isset($row))
                                        value="{{ __($row->product_name) }}"
                                    @else
                                        value="{{ old('productName') }}"
                                    @endif>

                                    
                                    @error('productName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!--  Products Description  -->
                                <div class="form-group mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" id="description">@if(isset($row)) {!! $row->description !!} @else {!! old('description') !!} @endif</textarea>
                                
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>                               


                                <!--    Product price   -->
                                <div class="form-group mb-3">
                                    <label for="">Product price</label>
                                    <input type="text" name="price" class="form-control @error('price') border-danger @enderror" 
                                    @if (isset($row))
                                        value="{{ __($row->price) }}"
                                    @else
                                        value="{{ old('price') }}"
                                    @endif>


                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--    Product Quantity   -->
                                <div class="form-group mb-3">
                                    <label for="">Product Quantity</label>
                                    <input type="number" name="quantity" class="form-control @error('quantity') border-danger @enderror" 
                                    @if (isset($row))
                                        value="{{ __($row->quantity) }}"
                                    @else
                                        value="{{ old('quantity') }}"
                                    @endif>

                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--    Available size   -->
                                <div class="form-group mb-3">
                                    <label for="category">Available Size</label>

                                    <select name="sizes[]" id="size" 
                                            class="form-control select2 @error('sizes') border-danger @enderror" 
                                            multiple="multiple">

                                        <option value="Small" selected>Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option>

                                    </select>

                                    @error('sizes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror                              
                                </div>


                                
                                <!--    Available Color   -->
                                <div class="form-group mb-3">
                                    <label for="colors">Available Color</label>
                                    <small class="text-danger ml-3"><b>* Please write each color separate by comma(,)</b></small>

                                    <input type="text" name="colors" class="form-control @error('colors') border-danger @enderror " placeholder="Color1, Color2, Color3 ...">

                                    @error('colors')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror                              
                                </div>



                                <!--    Product Code   -->
                                <div class="form-group mb-3">
                                    <label for="">Product Code</label>
                                    <input type="text" name="product_code" class="form-control @error('product_code') border-danger @enderror " required readonly
                                    @if (isset($row))
                                        value="{{ __($row->product_code) }}"
                                    @else
                                        value="{{ strtoupper(uniqid()) }}"
                                    @endif>

                                    @error('product_code')

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
        CKEDITOR.replace('description');
    </script>    

    <!--  Dropzone  -->
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        var DropZoneUpload = new Dropzone("#fileUpload", {
            url: '{{route("admin.product.file.upload")}}',
            autoProcessQueue: false,
            acceptedFiles: '.png,.jpg,.jpeg,.webp',
        });
        
        $('#dropZoneBtn').click(function(e){
            e.preventDefault();
            DropZoneUpload.processQueue();
        })
    </script>
    
@endpush