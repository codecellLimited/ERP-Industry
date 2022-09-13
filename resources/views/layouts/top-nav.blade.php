<header class="main-header">
    {{-- <div class="topbar">
        <div class="container">
            <div class="topbar__left">
                <div class="topbar__social">
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.topbar__social -->
                <a href="#">Login</a>
                <a href="news.html">Company News</a>
                <a href="faq.html">FAQs</a>
            </div><!-- /.topbar__left -->
            <div class="topbar__right">
                <a href="#"><i class="pylon-icon-email1"></i>needhelp@company.com</a>
                <a href="#"><i class="pylon-icon-clock2"></i>Mon - Sat 8:00 AM - 6:00 PM</a>
            </div><!-- /.topbar__right -->
        </div><!-- /.container -->
    </div><!-- /.topbar --> --}}

    <nav class="main-menu">
        <div class="container">
            <div class="logo-box">
                <a href="{{url('/')}}" class="h3 m-0 p-0">
                  <img src="{{asset(AppProperties()->app_logo)}}" width="29" alt="" class="img-fluid m-auto"/> 
                  <span class="m-0 p-0" style="color: #066A9B; font-family: bootstrap-icon;">
                    {{ AppProperties()->app_name }}
                  </span>
                </a>
                <span class="fa fa-bars mobile-nav__toggler"></span>
            </div><!-- /.logo-box -->
            <ul class="main-menu__list">
                <li class="dropdown">
                    <a href="{{url('/')}}">{{__("message.home")}}</a>
                </li>
                <li class="dropdown">
                    <a href="{{ url('about') }}">{{__("message.about_us")}}</a>
                <li class="dropdown">
                    <a href="{{ url('news') }}">{{__("message.news")}}</a>
                </li>
                
                <li>
                    <a href="{{ url('contact') }}">{{__("message.contact")}}</a>
                </li>

                <li class="dropdown">
                    <select onchange="changeLanguage(this.value)">
                        <option value="bn" {{ (session('langCode') == 'bn') ? 'selected' : '' }}>বাংলা</option>
                        <option value="en" {{ (session('langCode') == 'en') ? 'selected' : '' }}>English</option>
                    </select>
                </li>
                <script>
                    function changeLanguage(lang){
                        window.location='{{url("change-language")}}/'+lang;
                    }
                </script>

                <li class="search-btn search-toggler">
                    <a href="#"><i class="pylon-icon-magnifying-glass"></i></a>
                </li>
            </ul>
            <!-- /.main-menu__list -->

            <div class="main-header__info">
                <div class="main-header__info-phone">
                    <i class="pylon-icon-tech-support"></i>
                    <div class="main-header__info-phone-content">
                        <span>{{__("message.call_us")}}</span>
                        <h3><a href="tel:{{AppProperties()->contact_number}}">{{AppProperties()->contact_number}}</a></h3>
                    </div><!-- /.main-header__info-phone-content -->
                </div><!-- /.main-header__info-phone -->
            </div><!-- /.main-header__info -->
        </div><!-- /.container -->
    </nav>
    <!-- /.main-menu -->
</header><!-- /.main-header -->

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
