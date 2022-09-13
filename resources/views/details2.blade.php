@extends('layouts.app')

@section('page_title', $blog->title)

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
@endpush

@section('content')
        
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>
                    <li><a href="javascript::">Details</a></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
                <h2>{{ (session('langCode') == 'en') ? $blog->type : $blog->type }}</h2>
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="blog-details pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        {!! (session('langCode') == 'en') ? $blog->describe : $blog->describe_in_bangla !!}

                        <br>
                        <a href="{{ route('contact') }}" class="btn btn-primary my-5 p-3">Contact to support</a>
                    </div><!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="">
                            {{-- <div class="blog-sidebar__box blog-sidebar__search">
                                <form class="search-form">
                                    <input type="text" placeholder="Search" class="search-field">
                                    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div><!-- /.blog-sidebar__box --> --}}
                            <div class="blog-sidebar__box blog-sidebar__categories">
                                <h3 class="blog-sidebar__box-title">Categories</h3>
                                <ul class="list-unstyled">
                                    @forelse ($categories as $item)
                                    <li>
                                        <a href="{{ route('category', $item->slug) }}"><i class="far fa-arrow-right"></i><span>{{ $item->category_name }}</span></a>
                                        ({{ $item->posts->count() }})
                                    </li>   
                                    @empty
                                    <li>
                                        <a href="#"><i class="far fa-arrow-right"></i><span>Business</span></a>
                                        (1)
                                    </li>
                                    <li>
                                        <a href="#"><i class="far fa-arrow-right"></i><span>Car Loan</span></a>
                                        (1)
                                    </li>
                                    <li>
                                        <a href="#"><i class="far fa-arrow-right"></i><span>Credit Card</span></a>
                                        (1)
                                    </li>
                                    <li>
                                        <a href="#"><i class="far fa-arrow-right"></i><span>Education</span></a>
                                        (2)
                                    </li>
                                    <li>
                                        <a href="#"><i class="far fa-arrow-right"></i><span>Investment</span></a>
                                        (1)
                                    </li>  
                                    @endforelse
                                </ul>
                            </div>
                            <div class="blog-sidebar__box blog-sidebar__post">
                                <h3 class="blog-sidebar__box-title">Recent Posts</h3><!-- /.blog-sidebar__title -->
                                <ul class="list-unstyled footer-widget__post-list">
                                    @forelse ($recentPosts as $post)
                                    <li>
                                        <img src="{{ asset($post->image) }}" alt="" width="100">
                                        <div class="footer-widget__post-list-content">
                                            <span>{{ date('F d, Y', strtotime($post->created_at)) }}</span>
                                            <h3><a href="{{ route('post', $post->id) }}"> {{ (session('langCode') == 'en') ? $post->title : $post->title_in_bangla }} </a></h3>
                                        </div><!-- /.footer-widget__post-content -->
                                    </li> 
                                    @empty
                                    <li>
                                        <img src="assets/images/blog/lp-1-1.png" alt="">
                                        <div class="footer-widget__post-list-content">
                                            <span>October 16, 2020</span>
                                            <h3><a href="news-details.html">For Car auto you will get 90% loan amount</a></h3>
                                        </div><!-- /.footer-widget__post-content -->
                                    </li>
                                    @endforelse
                                </ul><!-- /.list-unstyled -->

                            </div><!-- /.blog-sidebar__box -->
                            {{-- <div class="blog-sidebar__box blog-sidebar__tags">
                                <h3 class="blog-sidebar__box-title">Tags</h3><!-- /.blog-sidebar__title -->
                                <ul class="list-unstyled blog-sidebar__tags-list">
                                    <li><a href="#">bank</a></li>
                                    <li><a href="#">business</a></li>
                                    <li><a href="#">check</a></li>
                                    <li><a href="#">company</a></li>
                                    <li><a href="#">doc</a></li>
                                    <li><a href="#">house loan</a></li>
                                    <li><a href="#">it loan</a></li>
                                    <li><a href="#">loan</a></li>
                                    <li><a href="#">new</a></li>
                                    <li><a href="#">video</a></li>
                                </ul><!-- /.list-unstyled -->
                            </div><!-- /.blog-sidebar__box --> --}}

                            <div class="blog-sidebar__box blog-sidebar__call">
                                <div class="service-sidebar__call">
                                    <div class="service-sidebar__call-bg" style="background-image: url(assets/images/services/service-sidebar-1-1.jpg);"></div><!-- /.service-sidebar__call-bg -->
                                    <i class="pylon-icon-tech-support"></i>
                                    <h3><a href="tel:{{ AppProperties()->contact_number }}">{{ AppProperties()->contact_number }}</a></h3>
                                    <div class="pylon-mail">
                                        <a href="mailto:{{ AppProperties()->contact_email }}">{{ AppProperties()->contact_email }}</a>
                                    </div>
                                    <p>We are here to help our customer any time. You can call on 24/7 To Answer Your Question.</p>
                                </div>
                            </div><!-- /.service-sidebar__call -->

                        </div><!-- /.blog-sidebar -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog-details -->

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:10,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:true
                },
                1000:{
                    items:5,
                    nav:true,
                }
            }
        });
    });
</script>
@endpush