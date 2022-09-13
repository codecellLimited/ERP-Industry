@extends('layouts.app')

@section('page_title', 'Success Story')


@section('content')
    <section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('frontend/images/backgrounds/page-header-bg-1-1.jpg') }});"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>
                    <li><span>Success Story</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
                <h2>
                   <h2>{{ __('message.all_loan_service') }}</h2>
                </h2>
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="blog-page pt-100 pb-60">
            <div class="container">
                <div class="row">
                   @forelse ($stories as $item)
                   <div class="col-lg-4 mb-4">
                        <div class="service-one__card">
                            <div class="service-one__image">
                                <a href="{{ route('service', $item->id) }}">
                                    <div class="post-thumbnail">
                                        <img src="{{ asset($item->image) }}" alt="" style="height: 250px">
                                    </div>
                                </a>
                            </div><!-- /.service-one__image -->
                            <div class="service-one__content" style="height: 250px">
                                <a href="{{ route('service', $item->id) }}">
                                    <div class="service-icon">
                                        <i class="flaticon-property-1"></i>
                                    </div>
                                </a> 
                                <h3><a href="{{ route('service', $item->id) }}">{{ (session('langCode') == 'en') ? $item->title : $item->title_in_bangla }}</a></h3>
                                <p>
                                    {!! (session('langCode') == 'en') ? substr($item->content, 0, 100).'...' : substr($item->content_in_bangla, 0, 100).'...' !!}
                                </p>
                                <a href="{{ route('service', $item->id) }}s" class="pylon-icon-right-arrow service-one__link"></a><!-- /.service-one__link -->
                            </div><!-- /.service-one__content -->
                        </div><!-- /.service-one__card -->
                    </div><!-- /.col-lg-4 -->
                   @empty
                    <div class="col-12 my-5 py-5 text-center">
                        <h3><strong>No Story Available</strong></h3>
                        <a href="{{ url()->previous() }}" class="btn btn-primary"> <-- Back</a>
                    </div>
                   @endforelse
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog-page -->
@endsection