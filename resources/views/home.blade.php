@extends('layouts.app')
@section('content')


    <style>
        .card.antor{
            /* background: none !important;  */
            background: #ffffff69 !important;
        }

        .antor:hover{
            border: 2px solid #066A9B;
            color: #fff !important;
            transition: 0.1s;
        }

        #main_slider{
            height: 75vh !important;
        }

    </style>

        <section class="main-slider">
            <div class="row">
                <!--            Main SLider
                        ========================================    -->

                <div class="col-md-8 px-md-5">
                    <div class="swiper-container thm-swiper__slider" data-swiper-options='{
                            "slidesPerView": 1,
                            "loop": true,
                            "effect": "fade",
                            "autoplay": {
                                "delay": 3000
                            },
                            "navigation": {
                                "nextEl": "#main-slider__swiper-button-next",
                                "prevEl": "#main-slider__swiper-button-prev"
                            }
                        }'>
                        <div class="swiper-wrapper">
                            @foreach ($sliders as $item)
                            <div class="swiper-slide" id="main_slider">
                                <div class="image-layer" style="background-image: url({{asset($item->image_path)}}); opacity: 0.7"></div>
                                <!-- /.image-layer -->
                                <div class="container" style="margin-top: -80px">
                                    <div class="row justify-content-center align-items-center" style="min-height: 60vh">

                                        <div class="col-lg-8">

                                            <div class="row justify-content-center">
                                                {{-- <div class="col-12 text-center">
                                                    <a href="{{ route('calculator') }}" class="btn btn-light p-3 mb-3 btn-block">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                {{ AcTitle('kistihisab_calculator') }}
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div> --}}

                                                <div class="col-6 mb-3">
                                                    <a href="{{ route('details', '2') }}" class="mb-3">
                                                        <div class="card antor pt-3" style="height: 120px; width: 100%">
                                                            <div class="card-body text-center">
                                                                <i class="bi bi-cash-stack" style="font-size: 32px"></i>
                                                                
                                                                <h6 class="mt-2"><strong>{{ AcTitle('personal_loan') }}</strong></h6>
                                                            </div>
                                                        </div>
                                                    </a>                                            
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <a href="{{ route('details', '3') }}" class="mb-3">
                                                        <div class="card antor pt-3" style="height: 120px; width: 100%">
                                                            <div class="card-body text-center">
                                                                <i class="bi bi-credit-card" style="font-size: 32px"></i>
                                                                
                                                                <h6 class="mt-2"><strong>{{ AcTitle('business_loan') }}</strong></h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <a href="{{ route('details', '4') }}">
                                                        <div class="card antor pt-3" style="height: 120px; width: 100%">
                                                            <div class="card-body text-center">
                                                                <i class="bi bi-bank" style="font-size: 32px"></i>
                                                                
                                                                <h6 class="mt-2"><strong>{{ AcTitle('account_opening') }}</strong></h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>


                                                <div class="col-6 mb-3">
                                                    <a href="{{ route('details', '5') }}">
                                                        <div class="card antor pt-3" style="height: 120px; width: 100%">
                                                            <div class="card-body text-center">
                                                                <i class="bi bi-wallet2" style="font-size: 32px"></i>
                                                                
                                                                <h6 class="mt-2"><strong>{{ AcTitle('home_loan') }}</strong></h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>


                                                <div class="col-6 mb-3">
                                                    <a href="{{ route('details', '6') }}">
                                                        <div class="card antor pt-3" style="height: 120px; width: 100%">
                                                            <div class="card-body text-center">
                                                                <i class="bi bi-file-person" style="font-size: 32px"></i>
                                                                
                                                                <h6 class="mt-2"><strong>{{ AcTitle('study_loan') }}</strong></h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <a href="{{ route('contact') }}">
                                                        <div class="card antor pt-3" style="height: 120px; width: 100%">
                                                            <div class="card-body text-center">
                                                                <i class="bi bi-info-square" style="font-size: 32px"></i>
                                                                
                                                                <h6 class="mt-2"><strong>{{ AcTitle('support') }}</strong></h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                

                                                {{-- <div class="col-lg-6 text-center">
                                                <a href="{{ route('details', '5') }}" class="btn btn-light p-3 mb-3 btn-block">{{ AcTitle('home_loan') }}</a>
                                                <a href="{{ route('details', '6') }}" class="btn btn-light p-3 mb-3 btn-block">{{ AcTitle('study_loan') }}</a>
                                                <a href="{{ route('contact') }}" class="btn btn-light p-3 mb-3 btn-block">{{ AcTitle('support') }}</a>
                                                </div> --}}
                                                
                                            </div>
                                        </div><!-- /.col-lg-8 -->
                                        
                                    </div><!-- /.row -->
                                </div><!-- /.container -->
                            </div><!-- /.swiper-slide -->
                            @endforeach
                            
                        </div><!-- /.swiper-wrapper -->

                        <div class="main-slider__nav">
                            <div class="swiper-button-prev" id="main-slider__swiper-button-next" tabindex="0" role="button" aria-label="Next slide"><i class="pylon-icon-left-arrow"></i></div>
                            <div class="swiper-button-next" id="main-slider__swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"><i class="pylon-icon-right-arrow"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">

                    <!--            Loan Calculator
                        ========================================    -->
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <form action="javascript::">
                                <center>
                                    <h3>{{ __('message.how_much_you_need') }}</h3>
                                </center>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="">Loan Amount</label>
                                        <div class="input-group">
                                            <input type="number" name="laon_amount" id="mloan_amount" class="form-control" value="100000" onkeyup="mcalculator()">
                                            <span class="input-group-text">BDT</span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Interest Rate</label>
                                        <div class="input-group">
                                            <input type="number" name="rate" id="mrate" class="form-control" value="10" onkeyup="mcalculator()">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="">Loan Period</label>
                                        <div class="input-group">
                                            <input type="number" name="period" id="mperiod" class="form-control" value="1" onkeyup="mcalculator()">
                                            <span class="input-group-text">Years</span>
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><strong>EMI</strong></span>
                                            <input type="text" id="mresult" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <a href="{{ route('contact') }}" class="btn btn-primary py-3 btn-block">{{ __('message.apply_for_loan') }}</a>
                                </div><!-- /.about-one__from-content -->
                            </form><!-- /.about-one__form -->
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- /.main-slider -->

      
        <!---   Success Story   -->
        <section class="service-one">
            <div class="container">
                <div class="block-title text-center">
                    {{-- <p>{{ __('message.we_are_offering') }}</p> --}}
                    <h2>{{ __('message.all_loan_service') }}</h2>
                </div><!-- /.block-title -->
                <div class="row">
                    @forelse ($services as $item)
                    <div class="col-lg-4">
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
                    <div class="col-lg-4">
                        <div class="service-one__card">
                            <div class="service-one__image">
                                <a href="#">
                                    <div class="post-thumbnail">
                                        <img src="{{ asset('frontend/images/services/services-1-1.png') }}" alt="">
                                    </div>
                                </a>
                            </div><!-- /.service-one__image -->
                            <div class="service-one__content">
                                <a href="#">
                                    <div class="service-icon">
                                        <i class="flaticon-car-loan"></i>
                                    </div>
                                </a>
                                <h3><a href="#">Personal Loan</a></h3>
                                <p>There are many variations of passages of lorem ipsum available the majority have some.</p>
                                <a href="#" class="pylon-icon-right-arrow service-one__link"></a><!-- /.service-one__link -->
                            </div><!-- /.service-one__content -->
                        </div><!-- /.service-one__card -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="service-one__card">
                            <div class="service-one__image">
                               <a href="#">
                                    <div class="post-thumbnail">
                                        <img src="{{ asset('frontend/images/services/services-1-2.png') }}" alt="">
                                    </div>
                                </a>
                            </div><!-- /.service-one__image -->
                            <div class="service-one__content">
                                <a href="#">
                                    <div class="service-icon">
                                        <i class="flaticon-online-money"></i>
                                    </div>
                                </a>
                                <h3><a href="#">Education Loan</a></h3>
                                <p>There are many variations of passages of lorem ipsum available the majority have some.</p>
                                <a href="#" class="pylon-icon-right-arrow service-one__link"></a><!-- /.service-one__link -->
                            </div><!-- /.service-one__content -->
                        </div><!-- /.service-one__card -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="service-one__card">
                            <div class="service-one__image">
                                <a href="#">
                                    <div class="post-thumbnail">
                                        <img src="{{ asset('frontend/images/services/services-1-3.png') }}" alt="">
                                    </div>
                                </a>
                            </div><!-- /.service-one__image -->
                            <div class="service-one__content">
                                <a href="#">
                                    <div class="service-icon">
                                        <i class="flaticon-property-1"></i>
                                    </div>
                                </a> 
                                <h3><a href="#">Business Loan</a></h3>
                                <p>There are many variations of passages of lorem ipsum available the majority have some.</p>
                                <a href="#" class="pylon-icon-right-arrow service-one__link"></a><!-- /.service-one__link -->
                            </div><!-- /.service-one__content -->
                        </div><!-- /.service-one__card -->
                    </div><!-- /.col-lg-4 -->
                    @endforelse
                    <a href="{{ route('story') }}" style="border-radius: 15px" class="mx-auto btn btn-outline-primary my-5 py-2 px-5">Show More <i class="bi bi-arrow-right"></i> </a>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.service-one -->

        <section class="feature-one">
            <img src="{{ asset('frontend/images/shapes/feature-shape-1-1.png') }}" alt="" class="feature-one__shape-1">
            <img src="{{ asset('frontend/images/shapes/feature-shape-1-2.png') }}" alt="" class="feature-one__shape-2">
            <img src="{{ asset('frontend/images/shapes/feature-shape-1-3.png') }}" alt="" class="feature-one__shape-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="block-title text-left">
                            <p>{{ __('message.get_to_know_about') }}</p>
                            <h2>{{ __('message.get_to_know_title') }}</h2>
                        </div><!-- /.block-title -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <p class="block-text">{{ __('message.get_to_know_body') }}</p><!-- /.block-text -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="feature-one__box">
                            <i class="pylon-icon-frontend"></i>
                            <p> {{ __('message.low_rate') }} </p>
                        </div><!-- /.feature-one__box -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="feature-one__box">
                            <i class="pylon-icon-verification"></i>
                            <p>{{ __('message.success_rate') }}</p>
                        </div><!-- /.feature-one__box -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="feature-one__box">
                            <i class="pylon-icon-finance"></i>
                            <p>{{ __('message.repayments') }}</p>
                        </div><!-- /.feature-one__box -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.feature-one -->

        <section class="trusted-company">
            <div class="trusted-company__bg" style="background-image: url({{ asset('frontend/images/shapes/trust-bg-1-1.png') }});"></div><!-- /.trusted-company__bg -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="trusted-company__content">
                            <div class="block-title text-left">
                                <p>{{ __('message.trusted_company') }}</p>
                                {{-- <h2>{{ __('message.trusted_company_title') }}</h2> --}}
                            </div><!-- /.block-title -->
                            <div style="color: white">
                                {{-- <img src="{{ asset('frontend/images/resources/trust-1-1.png') }}" alt="" height="148" width="171">
                                <p>{{ __("message.trusted_company_body") }}</p> --}}

                                {!! AppContent('trusted_company_text') !!}


                            </div><!-- /.trusted-company__image -->
                            {{-- <div class="row">
                                <div class="col-sm-5 col-xs-12">
                                    <ul class="trusted-company__list">
                                        <li class="trusted-company__list-item">
                                            <span>
                                                <i aria-hidden="true" class="far fa-check-circle"></i>
                                            </span>
                                            <span class="trusted-company__list-text">{{ __('message.credit_card_per_day') }}</span>
                                        </li><!-- /.trusted-company__list-item-->
                                        <li class="trusted-company__list-item">
                                            <span>
                                                <i aria-hidden="true" class="far fa-check-circle"></i>
                                            </span>
                                            <span class="trusted-company__list-text">{{ __('message.personal_loan') }}</span>
                                        </li><!-- /.trusted-company__list-item-->
                                        <li class="trusted-company__list-item">
                                            <span>
                                                <i aria-hidden="true" class="far fa-check-circle"></i>
                                            </span>
                                            <span class="trusted-company__list-text">{{ __('message.car_auto_loan') }}</span>
                                        </li><!-- /.trusted-company__list-item-->
                                        <li class="trusted-company__list-item">
                                            <span>
                                                <i aria-hidden="true" class="far fa-check-circle"></i>
                                            </span>
                                            <span class="trusted-company__list-text">{{ __('message.home_loan') }}</span>
                                        </li><!-- /.trusted-company__list-item-->
                                    </ul><!-- /.trusted-company__list-->
                                </div><!-- /.col-md-5-->
                                <div class="col-sm-6 col-xs-12">
                                    <ul class="trusted-company__list trusted-company__list-2">
                                        <li class="trusted-company__list-item">
                                            <span>
                                                <i aria-hidden="true" class="far fa-check-circle"></i>
                                            </span>
                                            <span class="trusted-company__list-text">{{ __('message.gold_loan_per_day') }}</span>
                                        </li><!-- /.trusted-company__list-item-->
                                        <li class="trusted-company__list-item">
                                            <span>
                                                <i aria-hidden="true" class="far fa-check-circle"></i>
                                            </span>
                                            <span class="trusted-company__list-text">{{ __('message.mortage_loan') }}</span>
                                        </li><!-- /.trusted-company__list-item-->
                                        <li class="trusted-company__list-item">
                                            <span>
                                                <i aria-hidden="true" class="far fa-check-circle"></i>
                                            </span>
                                            <span class="trusted-company__list-text">{{ __('message.education_loan') }}</span>
                                        </li><!-- /.trusted-company__list-item-->
                                        <li class="trusted-company__list-item">
                                            <span>
                                                <i aria-hidden="true" class="far fa-check-circle"></i>
                                            </span>
                                            <span class="trusted-company__list-text">{{ __('message.wedding_loan') }}</span>
                                        </li><!-- /.trusted-company__list-item-->
                                    </ul><!-- /.trusted-company__list-->
                                </div><!-- /.col-md-6-->
                            </div> --}}
                        </div><!-- /.trusted-company__content -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="">
                            <div class="trusted-company__box">
                                <span>1</span>
                                <p>{{ __('message.trusted_company_right_li_1') }}</p>
                            </div><!-- /.trusted-company__box -->
                            <div class="trusted-company__box">
                                <span>2</span>
                                <p>{{ __('message.trusted_company_right_li_2') }} </p>
                            </div><!-- /.trusted-company__box -->
                            <div class="trusted-company__box">
                                <span>3</span>
                                <p>{{ __('message.trusted_company_right_li_3') }}</p>
                            </div><!-- /.trusted-company__box -->
                            <div class="trusted-company__box">
                                <span>4</span>
                                <p>{{ __('message.trusted_company_right_li_4') }}</p>
                            </div><!-- /.trusted-company__box -->
                        </div><!-- /.trusted-company__box-wrap -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.trusted-company -->

        
        <section class="testimonials-one">
            <div class="container">
                <div class="block-title text-center">
                    <p>{{ __('message.testimonial') }}</p>
                    <h2>{{ __('message.testimonial') }}</h2>
                </div><!-- /.block-title -->
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{
                      "spaceBetween": 0,
                      "slidesPerView": 1,
                      "slidesPerGroup": 1,
                      "loop":true,
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
                              "spaceBetween": 30,
                              "slidesPerView": 1,
                              "slidesPerGroup": 1
                          },
                          "767": {
                              "spaceBetween": 30,
                              "slidesPerView": 1,
                              "slidesPerGroup": 1
                          },
                          "991": {
                              "spaceBetween": 30,
                              "slidesPerView": 1,
                              "slidesPerGroup": 1
                          },
                          "1199": {
                              "spaceBetween": 30,
                              "slidesPerView": 1,
                              "slidesPerGroup": 1
                          }
                      }}'>
                    <div class="swiper-wrapper">

                        @forelse ($testimonials as $item)
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
                                <p><span>{{ __('message.testimonial_speech') }}</span></p>
                                <h3>{{ Translate('Clyde Williamson') }}</h3>
                                <span class="testi_sname">{{ Translate('Analytics') }}</span>
                            </div><!-- /.testimonials-one__box -->
                                <div class="testimonials-one__box-info">
                                    <img src="{{ asset('frontend/images/resources/testimonials-1-1.png') }}" alt="">   
                                </div><!-- /.testimonials-one__box-info -->
                        </div><!-- /.swiper-slide -->

                        @endforelse

                    </div><!-- /.swiper-wrapper -->

                    <div class="testimonials-one__swiper-pagination swiper-pagination"></div><!-- /.testimonials-one__swiper-pagination swiper-pagination -->
                </div><!-- /.thm-swiper__slider -->
            </div><!-- /.container -->
        </section><!-- /.testimonials-one -->

        <section class="why-choose">
            <img src="{{ asset('frontend/images/shapes/why-choose-shape-1-1.png') }}" class="why-choose__shape-1" alt="">
            <img src="{{ asset('frontend/images/shapes/why-choose-shape-1-2.png') }}" class="why-choose__shape-2" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center my-5">
                        <h1><p><i class="pylon-icon-investment mr-3"></i>{{ __('message.experiences') }}</p></h1>
                    </div>
                    <div class="col-lg-6">
                        <div class="">                            
                            <img src="{{ asset('frontend/images/resources/why-choose-1-1.png') }}" alt="" class="img-fluid">
                        </div><!-- /.why-choose__image -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="why-choose__content">
                            <div class="block-title text-left">
                                <p>{{ __('message.benefits') }}</p>
                                {{-- <h2>{{ __('message.benefits_title') }}</h2> --}}
                            </div><!-- /.block-title -->
                            <div>{!! AppContent('why_choose_us_text') !!}</div>
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="why-choose__box">
                                        <h3><i class="fa fa-caret-right"></i>{{ __('message.professional_team') }}</h3>
                                        <p>{{ __('message.professional_team_text') }}</p>
                                    </div><!-- /.why-choose__box -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="why-choose__box">
                                        <h3><i class="fa fa-caret-right"></i>{{ __('message.quick_payment') }}</h3>
                                        <p>{{ __('message.quick_payment_text') }}</p>
                                    </div><!-- /.why-choose__box -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row --> --}}
                            <div class="why-choose__progress">
                                <div class="why-choose__progress-top">
                                    <h3>{{ Translate('Loan Process') }}</h3>
                                    <span>{{ Translate('90%') }}</span>
                                </div><!-- /.why-choose__progress-top -->
                                <div class="why-choose__progress-bar">
                                    <span style="width: 90%" class="wow slideInLeft" data-wow-duration="1500ms"></span>
                                </div><!-- /.why-choose__progress-bar -->
                            </div><!-- /.why-choose__progress -->
                            <div class="why-choose__progress">
                                <div class="why-choose__progress-top">
                                    <h3>{{ Translate('Consultancy') }}</h3>
                                    <span>{{ Translate('80%') }}</span>
                                </div><!-- /.why-choose__progress-top -->
                                <div class="why-choose__progress-bar">
                                    <span style="width:80%" class="wow slideInLeft" data-wow-duration="1500ms"></span>
                                </div><!-- /.why-choose__progress-bar -->
                            </div><!-- /.why-choose__progress -->
                            <div class="why-choose__progress">
                                <div class="why-choose__progress-top">
                                    <h3>{{ Translate('Payment Benefits') }}</h3>
                                    <span>{{ Translate('85%') }}</span>
                                </div><!-- /.why-choose__progress-top -->
                                <div class="why-choose__progress-bar">
                                    <span style="width: 85%" class="wow slideInLeft" data-wow-duration="1500ms"></span>
                                </div><!-- /.why-choose__progress-bar -->
                            </div><!-- /.why-choose__progress -->
                        </div><!-- /.why-choose__content -->

                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.why-choose -->

        <section class="funfact-one">
            <div class="funfact-one__bg" style="background-image: url({{ asset('frontend/images/backgrounds/funfact-bg-1-1.jpg') }});"></div><!-- /.funfact-one__bg -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="funfact-one__box">
                            <h3><span class="odometer" data-count="99">00</span>%</h3>
                            <p>{{ Translate('We Approve Loans') }}</p>
                        </div><!-- /.funfact-one__box -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="funfact-one__box">
                            <h3>$<span class="odometer" data-count="90">00</span>K</h3>
                            <p>{{ Translate('Daily Payments') }}</p>
                        </div><!-- /.funfact-one__box -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="funfact-one__box">
                            <h3><span class="odometer" data-count="8900">00</span></h3>
                            <p>{{ Translate('Happy Customers') }}</p>
                        </div><!-- /.funfact-one__box -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="funfact-one__box">
                            <h3><span class="odometer" data-count="346">00</span></h3>
                            <p>{{ Translate('Staff Members') }}</p>
                        </div><!-- /.funfact-one__box -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.funfact-one -->

        <section class="blog-home">
            <div class="container">
                <div class="block-title text-center">
                    <p>{{ __('message.blog_intro') }}</p>
                    <h2 class="blog-title__h2">{{ __('message.blog_title') }}</h2>
                </div><!-- /.block-title -->
                <div class="row">
                    @forelse ($blogs as $item)
                    <div class="col-lg-4">
                        <div class="blog-card">
                            <div class="blog-card__image">
                                <span>{{ date("d M, Y", strtotime($item->created_at)) }}</span>
                                <img src="{{asset($item->image)}}" alt="">
                            </div><!-- /.blog-card__image -->
                            <div class="blog-card__content">
                                <div class="blog-card__meta">
                                    <a href="#"><i class="far fa-user"></i>Admin</a>
                                    <a href=""><i class="far fa-credit-card"></i>{{ $item->category->category_name }}</a>
                                </div><!-- /.blog-card__meta -->
                                <h3>
                                    <a href="">
                                        {{ (session('langCode') == 'en') ? $item->title : $item->title_in_bangla }}
                                    </a>
                                </h3>
                                <div class="blog-card__bottom">
                                    <div class="blog-card-bottom-readmore">
                                        <a href="" class="readmore-card-link"><i class="pylon-icon-right-arrow"></i>Read More</a>
                                    </div><!-- /.blog-card-bottom-readmore-->
                                    <span class="blog_comment">
                                        <a href="#"><i class="far fa-comments"></i>0 Comments</a>
                                    </span>
                                </div><!-- /.blog-card__bottom -->
                            </div><!-- /.blog-card__content -->
                        </div><!-- /.blog-card -->
                    </div><!-- /.col-lg-3 -->
                    @empty
                    <div class="col-lg-4" data-wow-duration="1500ms">
                        <div class="blog-card">
                            <div class="blog-card__image">
                                <span>20 Sep, 2020</span>
                                <img src="frontend/images/blog/blog-1-1.png" alt="">
                            </div><!-- /.blog-card__image -->
                            <div class="blog-card__content">
                                <div class="blog-card__meta">
                                    <a href="#"><i class="far fa-user"></i>Admin</a>
                                    <a href="#"><i class="far fa-credit-card"></i>Credit Card</a>
                                </div><!-- /.blog-card__meta -->
                                <h3><a href="#">For Car auto you will get 90% loan amount</a></h3>
                                <div class="blog-card__bottom">
                                    <div class="blog-card-bottom-readmore">
                                        <a href="#" class="readmore-card-link"><i class="pylon-icon-right-arrow"></i>Read More</a>
                                    </div><!-- /.blog-card-bottom-readmore-->
                                    <span class="blog_comment">
                                        <a href="#"><i class="far fa-comments"></i>0 Comments</a>
                                    </span>
                                </div><!-- /.blog-card__bottom -->
                            </div><!-- /.blog-card__content -->
                        </div><!-- /.blog-card -->
                    </div><!-- /.col-lg-3 -->
                    <div class="col-lg-4 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="blog-card">
                            <div class="blog-card__image">
                                <span>20 Sep, 2020</span>
                                <img src="frontend/images/blog/blog-1-2.png" alt="">
                            </div><!-- /.blog-card__image -->
                            <div class="blog-card__content">
                                <div class="blog-card__meta">
                                    <a href="#"><i class="far fa-user"></i>Admin</a>
                                    <a href="#"><i class="far fa-credit-card"></i>Credit Card</a>
                                </div><!-- /.blog-card__meta -->
                                <h3><a href="#">How to get education loan for overseas</a></h3>
                                <div class="blog-card__bottom">
                                    <div class="blog-card-bottom-readmore">
                                        <a href="#" class="readmore-card-link"><i class="pylon-icon-right-arrow"></i>Read More</a>
                                    </div><!-- /.blog-card-bottom-readmore-->
                                    <span class="blog_comment">
                                        <a href="#"><i class="far fa-comments"></i>0 Comments</a>
                                    </span>
                                </div><!-- /.blog-card__bottom -->
                            </div><!-- /.blog-card__content -->
                        </div><!-- /.blog-card -->
                    </div><!-- /.col-lg-3 -->
                    <div class="col-lg-4 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="blog-card">
                            <div class="blog-card__image">
                                <span>20 Sep, 2020</span>
                                <img src="frontend/images/blog/blog-1-3.png" alt="">
                            </div><!-- /.blog-card__image -->
                            <div class="blog-card__content">
                                <div class="blog-card__meta">
                                    <a href="#"><i class="far fa-user"></i>Admin</a>
                                    <a href="#"><i class="far fa-credit-card"></i>Credit Card</a>
                                </div><!-- /.blog-card__meta -->
                                <h3><a href="#">Easy way to calculate interest on a loan</a></h3>
                                <div class="blog-card__bottom">
                                    <div class="blog-card-bottom-readmore">
                                        <a href="#" class="readmore-card-link"><i class="pylon-icon-right-arrow"></i>Read More</a>
                                    </div><!-- /.blog-card-bottom-readmore-->
                                    <span class="blog_comment">
                                        <a href="#"><i class="far fa-comments"></i>0 Comments</a>
                                    </span>
                                </div><!-- /.blog-card__bottom -->
                            </div><!-- /.blog-card__content -->
                        </div><!-- /.blog-card -->
                    </div><!-- /.col-lg-3 -->
                    @endforelse

                    <a href="{{ route('news') }}" style="border-radius: 15px" class="mx-auto btn btn-outline-primary mt-5 py-2 px-5">Show More <i class="bi bi-arrow-right"></i> </a>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog-home -->

        <div class="client-carousel pt-90 pb-90 client-carousel__has-border-top">
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
                    {{-- <div class="swiper-wrapper">
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
                    </div><!-- /.swiper-wrapper --> --}}
                </div><!-- /.thm-swiper__slider -->
            </div><!-- /.container -->
        </div><!-- /.client-carousel -->

        <section class="call-to-action" style="background-image: url(frontend/images/backgrounds/call-to-action-bg-1-1.jpg);">
            <div class="container">
                <div class="left-content">
                    <p><span>{{ __('message.simple') }}</span><span>{{ __('message.transparent') }}</span><span>{{ __('message.secure') }}</span></p>
                    <h3>{{ __('message.get_business_quickly') }}</h3>
                </div><!-- /.left-content -->
                <div class="right-content">
                    <a href="javascript::" class="thm-btn">{{ __("message.apply_for_loan") }}</a><!-- /.thm-btn -->
                </div><!-- /.right-content -->
            </div><!-- /.container -->
        </section><!-- /.call-to-action -->
@endsection


@push('js')
    <script>
        
        var calculator = () => {
            var loan_amount = $("#loan_amount").val();
            var rate = $("#rate").val();
            var years = $("#period").val();
            var months = years * 12;

            let r = rate / (12 * 100);
            let x = (1 + r);
            let y = Math.pow(x, months);

            let emi_per_month = (loan_amount * r * y) / (y - 1);
            let emi_per_year = emi_per_month * 12;

            $("#result").val(emi_per_month.toFixed(2));
        }

        calculator();

        var mcalculator = () => {
            var loan_amount = $("#mloan_amount").val();
            var rate = $("#mrate").val();
            var years = $("#mperiod").val();
            var months = years * 12;

            let r = rate / (12 * 100);
            let x = (1 + r);
            let y = Math.pow(x, months);

            let emi_per_month = (loan_amount * r * y) / (y - 1);
            let emi_per_year = emi_per_month * 12;

            $("#mresult").val(emi_per_month.toFixed(2));
        }

        mcalculator();
        
    </script>
@endpush
