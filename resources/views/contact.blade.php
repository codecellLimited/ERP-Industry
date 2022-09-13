@extends('layouts.app')

@section('page_title', 'Contact')

@section('content')
    <section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('frontend/images/backgrounds/page-header-bg-1-1.jpg') }});"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>
                    <li><span>Contact Us</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
                <h2>{{ __('message.contact') }}</h2>
            </div><!-- /.container -->
        </section><!-- /.page-header -->
        <section class="contact-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="contact-one__content">
                            <div class="block-title">
                                {{-- <p class="small-title">Get in touch with us</p> --}}
                                <h2 class="title-block">{{__('message.ask_for_query')}}</h2>
                            </div>
                            <div class="contact-one__box">
                                <i class="pylon-icon-telephone"></i>
                                <div class="contact-one__box-content">
                                    <h4>{{ __('message.call_us') }}</h4>
                                    <a href="tel:92 666 888 000">92 666 888 0000</a>
                                </div><!-- /.contact-one__box-content -->
                            </div><!-- /.contact-one__box -->
                            <div class="contact-one__box">
                                <i class="pylon-icon-email1"></i>
                                <div class="contact-one__box-content">
                                    <h4>{{ __('message.write_email') }}</h4>
                                    <a href="mailto:needhelp@company.com">needhelp@company.com</a>
                                </div><!-- /.contact-one__box-content -->
                            </div><!-- /.contact-one__box -->
                            <div class="contact-one__box">
                                <i class="pylon-icon-pin1"></i>
                                <div class="contact-one__box-content">
                                    <h4>{{ __('message.visit_office') }}</h4>
                                    <a href="#">Dhaka, Bangladesh</a>
                                </div><!-- /.contact-one__box-content -->
                            </div><!-- /.contact-one__box -->
                        </div><!-- /.contact-one__content -->
                    </div><!-- /.col-lg-5 -->
                    <div class="col-lg-7">

                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            <strong>{{ session('success') }}</strong>
                        </div>
                        @endif

                        <form  action="{{ route('send.message.to.admin') }}" method="post" class="contact-one__form">
                            @csrf
                            <div class="row low-gutters">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <input type="text" placeholder="{{ __('message.your_name') }}" class="form-control contact-one__form-input m-0" name="name" required>
                                    
                                        @error('name')
                                            <span class="invalid-feedback">
                                                <strong> {{$message}} </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" placeholder="{{ __('message.your_email') }}" class="form-control contact-one__form-input m-0" name="email" required>
                                        @error('email')
                                            <span class="invalid-feedback">
                                                <strong> {{$message}} </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="{{ __('message.your_phone') }}" class="form-control contact-one__form-input m-0" name="phone" required>
                                        @error('phone')
                                            <span class="invalid-feedback">
                                                <strong> {{$message}} </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- /.col-md-6 -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="{{ __('message.location') }}" class="form-control contact-one__form-input m-0" name="location" required>
                                        @error('location')
                                            <span class="invalid-feedback">
                                                <strong> {{$message}} </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- /.col-md-6 -->


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="subject" id="" class="form-control contact-one__form-input" required>
                                            <option value="" selected disabled>
                                                {{ (session('langCode') == 'en') ? 'Select Subject' : 'বিষয় নির্বাচন করুন'}}
                                            </option>
                                            @foreach (\App\Models\MessageSubject::where('status', true)->get() as $item)
                                                <option value="{{ $item->name }}">{{ (session('langCode') == 'en') ? $item->name : $item->name_in_bangla }}</option>
                                            @endforeach
                                        </select>
                                            
                                        @error('subject')
                                            <span class="invalid-feedback">
                                                <strong> {{$message}} </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" placeholder="{{ __('message.write_msg') }}" class="contact-one__form-input m-0" required></textarea>
                                        @error('message')
                                            <span class="invalid-feedback">
                                                <strong> {{$message}} </strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button class="thm-btn" type="submit">{{__('message.send_msg')}}</button>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                        </form><!-- /.contact-one__from -->
                    </div><!-- /.col-lg-7 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.contact-one -->
        <div class="google-map__home-two">
            <iframe title="template google map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd" class="map__home-two" allowfullscreen></iframe>
        </div><!-- /.google-map -->
@endsection