<!DOCTYPE html>
<html lang="en">


<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title', 'Home') || {{__(AppProperties()->app_name)}}</title>

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('app/APzaotiQz9uHaRPXiRZkdymBNsKqevkBSoA9uOFN.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('app/APzaotiQz9uHaRPXiRZkdymBNsKqevkBSoA9uOFN.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('app/APzaotiQz9uHaRPXiRZkdymBNsKqevkBSoA9uOFN.png') }}">
    <meta name="description" content="Loan HTML Template">

    <!-- fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/pylon-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nouislider.pips.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/flaticon.css') }}">

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">

    @stack('css')

    <style>
        .invalid-feedback{
            display: block;
        }
    </style>
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">

  <div class="preloader">
    <img class="preloader__image" src="{{ asset('images/loading.gif') }}" alt="" width="150">
  </div><!-- /.preloader -->

  <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none">
    @csrf
  </form>
  
    @include('layouts.top-nav')

    @yield('content')
    @include('layouts.footer')



    {{-- </div><!-- /.page-wrapper --> --}}


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"></span>
            <div class="logo-box text-white">
                <img src="{{asset(AppProperties()->app_logo)}}" width="50" alt="" class="rounded-circle img-fluid"/> 
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="pylon-icon-email1"></i>
                    <a href="mailto:{{AppProperties()->contact_email}}">{{AppProperties()->contact_email}}</a>
                </li>
                <li>
                    <i class="pylon-icon-telephone"></i>
                    <a href="tel:{{AppProperties()->contact_number}}">{{AppProperties()->contact_number}}</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" aria-label="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="facebook"><i class="fab fa-facebook-square"></i></a>
                    <a href="#" aria-label="pinterest"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" aria-label="instagram"><i class="fab fa-instagram"></i></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="{{ route('search') }}" method="GET">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" name="keyword" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    {{-- <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a> --}}

    <button class="btn btn-primary rounded-circle" id="open_chatBox" style="position: fixed; bottom: 23px; right: 28px; z-index: 200"> 
        <i class="bi bi-chat-dots" style="font-size: 30px"></i> 
    </button>

    <div class="card" id="popup_chatBox" style="position: fixed; bottom: 10px; right: 100px; z-index: 200; display: none">
        <div class="card-body">
            <form action="{{ route('send.message.to.admin') }}" method="POST" id="popup_form">
                @csrf

                <div class="mb-3">
                    <label for=""><strong>name</strong></label>
                    <input type="text" name="name" id="popup_name" class="form-control"
                    placeholder="Name" required>
                </div>

                <div class="mb-3">
                    <label for=""><strong>Email</strong></label>
                    <input type="email" name="email" id="popup_email" class="form-control"
                    placeholder="Email address" required>
                </div>                 

                <div class="mb-3">
                    <label for=""><strong>Phone</strong></label>
                    <input type="number" name="phone" id="popup_phone" class="form-control"
                    placeholder="Phone" required>
                </div>

                <div class="mb-3">
                    <label for=""><strong>Message</strong></label>
                    <textarea name="message" id="popup_message" rows="5" class="form-control" placeholder="Type Here..."></textarea>
                </div>

                <div id="alert-msg"></div>

                <div class="mb-3">
                    <button class="btn btn-block btn-primary">Send Message</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('frontend/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.js') }}"></script>
    <script src="{{ asset('frontend/js/odometer.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wNumb.min.js') }}"></script>
    <script src="{{ asset('frontend/js/nouislider.min.js') }}"></script>

    <!-- template js -->
    <script src="{{ asset('frontend/js/theme.js') }}"></script>


    <script>
        $("#open_chatBox").click(() => {
            $("#popup_chatBox").slideToggle();
        })

        $("#popup_form").submit((e) => {
            e.preventDefault();


            $.ajax({
                url: '{{ route('send.message.to.admin') }}',
                type: "POST",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'name': $("#popup_name").val(),
                    'email': $("#popup_email").val(),
                    'phone': $("#popup_phone").val(),
                    'message': $("#popup_message").val(),
                },
                success: (res) => {
                    $('#popup_form').trigger("reset");
                    $("#popup_chatBox").slideToggle();
                    // $("#alert-msg").append('<div class="alert alert-success my-3">Message sent successfully</div>')
                }
            })
        })

    </script>

    @stack('js')
</body>


<!-- Mirrored from webdevcode.com/html/pylon1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Aug 2022 04:48:26 GMT -->
</html>