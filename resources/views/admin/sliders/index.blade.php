@extends("layouts.app")

@section('content')
    @push('css')
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('plugins/ekko-lightbox/ekko-lightbox.css') }}">
    @endpush

    <!-- Main content -->
    <section class="content my-5 ">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">

               <!-- col -->
               <!-- Welcome Slider -->
                <div class="col-md-10 mb-4 mt-4">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            welcome_slider
                        </h4>
                        <a href="{{ route('admin.slider.add', ['welcome_slider']) }}" class="ml-5 btn-sm btn-secondary">
                            <i class="bi bi-plus"></i>
                            Add Slider
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($welcome_slider as $item)
                            <div class="col-sm-2 position-relative">
                                <a href="javascript::" onclick="if(confirm('Are you sure? Do you want to delete this?')){ location.replace('{{ route('admin.slider.file.remove', $item->id) }}') }"
                                    class="badge bg-danger position-absolute">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="{{ asset($item->image_path) }}" data-toggle="lightbox" data-title="{{$item->slider_name}}" data-gallery="gallery">
                                    <img src="{{ asset($item->image_path) }}" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                            </div>
                            @empty
                            <div class="col-12">{{ __("No image found") }}</div>
                            @endforelse                        
                        </div>
                    </div>
                    </div>
                </div>
               <!-- col -->

               <!-- col -->
               <!-- top_slider_in_home -->
                <div class="col-md-10 mb-4">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            top_slider_in_home
                        </h4>
                        <a href="{{ route('admin.slider.add', ['top_slider_in_home']) }}" class="ml-5 btn-sm btn-secondary">
                            <i class="bi bi-plus"></i>
                            Add Slider
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($top_slider_in_home as $item)
                            <div class="col-sm-2 position-relative">
                                <a href="javascript::" onclick="if(confirm('Are you sure? Do you want to delete this?')){ location.replace('{{ route('admin.slider.file.remove', $item->id) }}') }"
                                    class="badge bg-danger position-absolute">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="{{ asset($item->image_path) }}" data-toggle="lightbox" data-title="{{$item->slider_name}}" data-gallery="gallery">
                                    <img src="{{ asset($item->image_path) }}" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                            </div>
                            @empty
                            <div class="col-12">{{ __("No image found") }}</div>
                            @endforelse                        
                        </div>
                    </div>
                    </div>
                </div>
               <!-- col -->


               <!-- col -->
               <!-- Welcome Slider -->
                <div class="col-md-10 mb-4">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            shop_gift_slider_in_home
                        </h4>
                        <a href="{{ route('admin.slider.add', ['shop_gift_slider_in_home']) }}" class="ml-5 btn-sm btn-secondary">
                            <i class="bi bi-plus"></i>
                            Add Slider
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($shop_gift_slider_in_home as $item)
                            <div class="col-sm-2 position-relative">
                                <a href="javascript::" onclick="if(confirm('Are you sure? Do you want to delete this?')){ location.replace('{{ route('admin.slider.file.remove', $item->id) }}') }"
                                    class="badge bg-danger position-absolute">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="{{ asset($item->image_path) }}" data-toggle="lightbox" data-title="{{$item->file_name}}" data-gallery="gallery">
                                    <img src="{{ asset($item->image_path) }}" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                            </div>
                            @empty
                            <div class="col-12">{{ __("No image found") }}</div>
                            @endforelse                        
                        </div>
                    </div>
                    </div>
                </div>
               <!-- col -->


               <!-- col -->
               <!-- new_uploaded_bg_in_home -->
                <div class="col-md-10 mb-4">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            new_uploaded_bg_in_home
                        </h4>
                        <a href="{{ route('admin.slider.add', ['new_uploaded_bg_in_home']) }}" class="ml-5 btn-sm btn-secondary">
                            <i class="bi bi-plus"></i>
                            Add Slider
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($new_uploaded_bg_in_home as $item)
                            <div class="col-sm-2 position-relative">
                                <a href="javascript::" onclick="if(confirm('Are you sure? Do you want to delete this?')){ location.replace('{{ route('admin.slider.file.remove', $item->id) }}') }"
                                    class="badge bg-danger position-absolute">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="{{ asset($item->image_path) }}" data-toggle="lightbox" data-title="{{$item->file_name}}" data-gallery="gallery">
                                    <img src="{{ asset($item->image_path) }}" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                            </div>
                            @empty
                            <div class="col-12">{{ __("No image found") }}</div>
                            @endforelse                        
                        </div>
                    </div>
                    </div>
                </div>
               <!-- col -->



               <!-- col -->
               <!-- all_category_bg_in_home -->
                <div class="col-md-10 mb-4">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            all_category_bg_in_home
                        </h4>
                        <a href="{{ route('admin.slider.add', ['all_category_bg_in_home']) }}" class="ml-5 btn-sm btn-secondary">
                            <i class="bi bi-plus"></i>
                            Add Slider
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($all_category_bg_in_home as $item)
                            <div class="col-sm-2 position-relative">
                                <a href="javascript::" onclick="if(confirm('Are you sure? Do you want to delete this?')){ location.replace('{{ route('admin.slider.file.remove', $item->id) }}') }"
                                    class="badge bg-danger position-absolute">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="{{ asset($item->image_path) }}" data-toggle="lightbox" data-title="{{$item->file_name}}" data-gallery="gallery">
                                    <img src="{{ asset($item->image_path) }}" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                            </div>
                            @empty
                            <div class="col-12">{{ __("No image found") }}</div>
                            @endforelse                        
                        </div>
                    </div>
                    </div>
                </div>
               <!-- col -->


               <!-- col -->
               <!-- top_slider_in_market -->
                <div class="col-md-10 mb-4">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            top_slider_in_market
                        </h4>
                        <a href="{{ route('admin.slider.add', ['top_slider_in_market']) }}" class="ml-5 btn-sm btn-secondary">
                            <i class="bi bi-plus"></i>
                            Add Slider
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($top_slider_in_market as $item)
                            <div class="col-sm-2 position-relative">
                                <a href="javascript::" onclick="if(confirm('Are you sure? Do you want to delete this?')){ location.replace('{{ route('admin.slider.file.remove', $item->id) }}') }"
                                    class="badge bg-danger position-absolute">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="{{ asset($item->image_path) }}" data-toggle="lightbox" data-title="{{$item->file_name}}" data-gallery="gallery">
                                    <img src="{{ asset($item->image_path) }}" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                            </div>
                            @empty
                            <div class="col-12">{{ __("No image found") }}</div>
                            @endforelse                        
                        </div>
                    </div>
                    </div>
                </div>
               <!-- col -->


               <!-- col -->
               <!-- recomended_product_bg_in_market -->
                <div class="col-md-10 mb-4">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            recomended_product_bg_in_market
                        </h4>
                        <a href="{{ route('admin.slider.add', ['recomended_product_bg_in_market']) }}" class="ml-5 btn-sm btn-secondary">
                            <i class="bi bi-plus"></i>
                            Add Slider
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($recomended_product_bg_in_market as $item)
                            <div class="col-sm-2 position-relative">
                                <a href="javascript::" onclick="if(confirm('Are you sure? Do you want to delete this?')){ location.replace('{{ route('admin.slider.file.remove', $item->id) }}') }"
                                    class="badge bg-danger position-absolute">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="{{ asset($item->image_path) }}" data-toggle="lightbox" data-title="{{$item->file_name}}" data-gallery="gallery">
                                    <img src="{{ asset($item->image_path) }}" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                            </div>
                            @empty
                            <div class="col-12">{{ __("No image found") }}</div>
                            @endforelse                        
                        </div>
                    </div>
                    </div>
                </div>
               <!-- col -->

            </div><!-- Row -->
        </div>
    </div>

@endsection

@push('js')
    <!-- Ekko Lightbox -->
    <script src="{{ asset('plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
        });

        $('.filter-container').filterizr({gutterPixels: 3});
        $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
        });
    })
    </script>
@endpush