@extends('layouts.app')

@section('page_title', 'About')

@section('content')
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(frontend/images/backgrounds/page-header-bg-1-1.jpg);"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li>/</li>
                    <li><span>About</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
                <h2>{{ __('message.about_us') }}</h2>
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="about-three">
            <div class="container">
                {{-- <div class="row">
                    <div class="col-lg-4">
                        <div class="about-three__image">
                            <img src="frontend/images/resources/about-3-1.png" alt="">
                        </div><!-- /.about-three__image -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-8">
                        <div class="about-three__image">
                            <img src="frontend/images/resources/about-3-2.png" alt="">
                            <div class="about-three__image-text">Trusted Company</div><!-- /.about-three__image-text -->
                        </div><!-- /.about-three__image -->
                    </div><!-- /.col-lg-8 -->
                </div><!-- /.row --> --}}
                <div class="row">
                    <div class="col-12">
                        <div class="block-title text-left">
                            <p>{{ __('message.get_to_know_about_us') }}</p>
                            <br>
                            {{-- <h2>{{__('message.few_words_about_us')}}</h2> --}}
                            
                        </div><!-- /.block-title -->
                        <div>
                            {!! AppContent('about_us') !!}
                        </div>
                    </div><!-- /.col-lg-5 -->
                    {{-- <div class="col-lg-7">
                        <p class="block-text">
                            {{ AppContent('about_us') }}    
                        </p><!-- /.block-text -->
                    </div><!-- /.col-lg-7 --> --}}
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.about-three -->
        <section class="testimonials-one testimonials-one__about-page">
            <div class="container">
                <div class="block-title text-center">
                    <p>{{__('message.testimonial')}}</p>
                    <h2>{{__('message.testimonial')}}</h2>
                </div><!-- /.block-title -->
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{
                            "spaceBetween": 0,
                            "slidesPerView": 1,
                            "slidesPerGroup": 1,
                            "autoplay": {
                                "delay": 5000
                            },
                            "pagination": {
                                "el": ".testimonials-one__swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "0": {
                                    "spaceBetween": 0,
                                    "slidesPerView": 1,
                                    "slidesPerGroup": 1
                                },
                                "375": {
                                    "spaceBetween": 0,
                                    "slidesPerView": 1,
                                    "slidesPerGroup": 1
                                },
                                "667": {
                                    "spaceBetween": 0,
                                    "slidesPerView": 1,
                                    "slidesPerGroup": 1
                                },
                                "768": {
                                    "spaceBetween": 30,
                                    "slidesPerView": 2,
                                    "slidesPerGroup": 2
                                },
                                "991": {
                                    "spaceBetween": 30,
                                    "slidesPerView": 2,
                                    "slidesPerGroup": 2
                                },
                                "1199": {
                                    "spaceBetween": 30,
                                    "slidesPerView": 3,
                                    "slidesPerGroup": 3
                                }
                            }}'>
                    <div class="swiper-wrapper">
                        @forelse (\App\Models\Testimonial::where('status', true)->latest()->get() as $item)
                        <div class="swiper-slide">
                            <div class="testimonials-one__box">
                                <p><span>{{ (session('langCode') == 'en') ? $item->content : $item->content_in_bangla }}</span></p>
                                <h3>{{ $item->name }}</h3>
                                <span class="testi_sname">{{ $item->position }}</span>
                            </div><!-- /.testimonials-one__box -->
                                <div class="testimonials-one__box-info">
                                    <img src="{{ asset($item->image) }}" alt="" width="70">   
                                </div><!-- /.testimonials-one__box-info -->
                        </div><!-- /.swiper-slide -->
                        @empty
                        <div class="swiper-slide">
                            <div class="testimonials-one__box">
                                <p><span>{{__('message.testimonial_speech')}}</span></p>
                                <h3>Clyde Williamson</h3>
                                <span class="testi_sname">Analytics</span>
                            </div><!-- /.testimonials-one__box -->
                                <div class="testimonials-one__box-info">
                                    <img src="frontend/images/resources/testimonials-1-1.png" alt="">   
                                </div><!-- /.testimonials-one__box-info -->
                        </div><!-- /.swiper-slide -->
                        @endforelse
                        
                    </div><!-- /.swiper-wrapper -->

                    <div class="testimonials-one__swiper-pagination swiper-pagination"></div><!-- /.testimonials-one__swiper-pagination swiper-pagination -->
                </div><!-- /.thm-swiper__slider -->
            </div><!-- /.container -->
        </section><!-- /.testimonials-one -->


        <section class="video-two">
            <div class="video-two__bg" style="background-image: url(frontend/images/backgrounds/video-bg-1-1.jpg);"></div><!-- /.video-two__bg -->
            <div class="container">
                <a href="https://www.youtube.com/watch?v=fKjTmTVqnG8" class="video-one__btn video-popup"><i class="fa fa-play"></i></a>
                <h3>{{ __('message.we_can_give_best') }}</h3>
            </div><!-- /.container -->
        </section><!-- /.video-two -->

        <section class="funfact-one">
            <div class="funfact-one__bg" style="background-image: url(frontend/images/backgrounds/funfact-bg-1-1.jpg);"></div><!-- /.funfact-one__bg -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="funfact-one__box">
                            <h3><span class="odometer" data-count="99">00</span>%</h3>
                            <p>{{__('message.approve_loans')}}</p>
                        </div><!-- /.funfact-one__box -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="funfact-one__box">
                            <h3>$<span class="odometer" data-count="90">00</span>k</h3>
                            <p>{{__('message.daily_payement')}}</p>
                        </div><!-- /.funfact-one__box -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="funfact-one__box">
                            <h3><span class="odometer" data-count="8900">00</span></h3>
                            <p>{{ __('message.happy_customer') }}</p>
                        </div><!-- /.funfact-one__box -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="funfact-one__box">
                            <h3><span class="odometer" data-count="346">00</span></h3>
                            <p>{{ __('message.staff_member') }}</p>
                        </div><!-- /.funfact-one__box -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.funfact-one -->

        <section class="team-about-page pb-90 pt-100">
            <div class="container">
                <div class="block-title text-center">
                    <p>{{ __('message.professional') }}</p>
                    <h2>{{__('message.meet_best_agents')}}</h2>
                </div><!-- /.block-title -->
                <div class="row">

                    @forelse (\App\Models\Team::where('status', true)->latest()->get() as $member)
                    <div class="col-lg-4">
                        <div class="team-one__card mb-30">
                            <div class="team-one__image">
                                <img src="{{ asset($member->image) }}" alt="">
                            </div><!-- /.team-one__image -->
                            <div class="team-one__content">
                                <div class="team-one__social">
                                    <a href="{{ $member->facebook }}" class="fab fa-facebook-square"></a>
                                    <a href="{{ $member->twitter }}" class="fab fa-twitter"></a>
                                    <a href="{{ $member->linkedin }}" class="fab fa-pinterest-p"></a>
                                    <a href="{{ $member->instagram }}" class="fab fa-instagram"></a>
                                </div><!-- /.team-one__social -->
                                <h3>{{ $member->name }}</h3>
                                <span>{{ $member->designation }}</span>
                            </div><!-- /.team-one__content -->
                        </div><!-- /.team-one__card -->
                    </div><!-- /.col-lg-4 -->
                    @empty
                    <div class="col-lg-4">
                        <div class="team-one__card mb-30">
                            <div class="team-one__image">
                                <img src="frontend/images/team/team-1-1.png" alt="">
                            </div><!-- /.team-one__image -->
                            <div class="team-one__content">
                                <div class="team-one__social">
                                    <a href="#" class="fab fa-facebook-square"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-pinterest-p"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                </div><!-- /.team-one__social -->
                                <h3>Willie Ray</h3>
                                <span>Expert Agent</span>
                            </div><!-- /.team-one__content -->
                        </div><!-- /.team-one__card -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="team-one__card mb-30">
                            <div class="team-one__image">
                                <img src="frontend/images/team/team-1-2.png" alt="">
                            </div><!-- /.team-one__image -->
                            <div class="team-one__content">
                                <div class="team-one__social">
                                    <a href="#" class="fab fa-facebook-square"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-pinterest-p"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                </div><!-- /.team-one__social -->
                                <h3>Carlos Bailey</h3>
                                <span>Expert Agent</span>
                            </div><!-- /.team-one__content -->
                        </div><!-- /.team-one__card -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="team-one__card mb-30">
                            <div class="team-one__image">
                                <img src="frontend/images/team/team-1-3.png" alt="">
                            </div><!-- /.team-one__image -->
                            <div class="team-one__content">
                                <div class="team-one__social">
                                    <a href="#" class="fab fa-facebook-square"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-pinterest-p"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                </div><!-- /.team-one__social -->
                                <h3>Sallie Grant</h3>
                                <span>Expert Agent</span>
                            </div><!-- /.team-one__content -->
                        </div><!-- /.team-one__card -->
                    </div><!-- /.col-lg-4 -->
                    @endforelse

                    
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.team-about-page -->

        {{-- <div class="client-carousel pt-90 pb-90 client-carousel__has-border-top">
            <div class="container">
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                "0": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "375": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "575": {
                    "spaceBetween": 30,
                    "slidesPerView": 3
                },
                "767": {
                    "spaceBetween": 50,
                    "slidesPerView": 4
                },
                "991": {
                    "spaceBetween": 50,
                    "slidesPerView": 5
                },
                "1199": {
                    "spaceBetween": 100,
                    "slidesPerView": 5
                }
            }}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="frontend/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontend/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontend/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontend/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontend/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontend/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontend/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontend/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontend/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontend/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                    </div><!-- /.swiper-wrapper -->
                </div><!-- /.thm-swiper__slider -->
            </div><!-- /.container -->
        </div><!-- /.client-carousel --> --}}

@endsection