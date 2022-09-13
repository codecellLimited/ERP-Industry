@extends('layouts.app')

@section('page_title', 'News')


@section('content')
    <section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('frontend/images/backgrounds/page-header-bg-1-1.jpg') }});"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>
                    <li><span>News</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
                <h2>
                    @if(isset($subtitle))
                        {{$subtitle}}
                    @else
                        {{ __('message.news') }}
                    @endif
                </h2>
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="blog-page pt-100 pb-60">
            <div class="container">
                <div class="row">
                   @forelse ($blogs as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="blog-card">
                            <div class="blog-card__image" style="height: 250px">
                                <span>{{ date('d M, Y', strtotime($item->created_at)) }}</span>
                                <img src="{{ asset($item->image) }}" alt="">
                            </div><!-- /.blog-card__image -->
                            <div class="blog-card__content" style="height: 250px">
                                <div class="blog-card__meta">
                                    {{-- <a href="#"><i class="far fa-user"></i>Admin</a> --}}
                                    <a href="{{ route('category', $item->category->slug) }}"><i class="far fa-credit-card"></i>{{ $item->category->category_name }}</a>
                                </div><!-- /.blog-card__meta -->
                                <h3><a href="{{ route('post', $item->id) }}">
                                    {{ (session('langCode') == 'EN') ? $item->title : $item->title_in_bangla }}    
                                </a></h3>
                                <div class="blog-card__bottom">
                                    <div class="blog-card-bottom-readmore">
                                        <a href="{{ route('post', $item->id) }}" class="readmore-card-link"><i class="pylon-icon-right-arrow"></i>{{ __('message.read_more') }}</a>
                                    </div><!-- /.blog-card-bottom-readmore-->
                                    <span class="blog_comment">
                                        <a href="{{ route('post', $item->id) }}"><i class="far fa-comments"></i>0 Comments</a>
                                    </span>
                                </div><!-- /.blog-card__bottom -->
                            </div><!-- /.blog-card__content -->
                        </div><!-- /.blog-card -->
                    </div><!-- /.col-lg-4 col-md-6 -->
                   @empty
                    <div class="col-12 my-5 py-5 text-center">
                        <h3><strong>No Post Available</strong></h3>
                        <a href="{{ url()->previous() }}" class="btn btn-primary"> <-- Back</a>
                    </div>
                   @endforelse
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog-page -->
@endsection