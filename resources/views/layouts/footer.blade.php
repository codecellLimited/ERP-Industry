
<div class="bottom-footer"> 
  <footer class="site-footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget footer-widget__about">
                    <a href="{{ url('/') }}" class="text-white h3">
                        {{-- <img src="{{asset('frontend/images/logo-light.png')}}" width="155" alt=""> --}}
                        {{ __("message.app_name") }}
                    </a>
                    <div class="footer-widget__about-phone" style="margin-top: 30px">
                        <i class="pylon-icon-tech-support"></i>
                        <div class="footer-widget__about-phone-content">
                            <span>{{ __('message.call_us') }}</span>
                            <h3><a href="tel:{{ AppProperties()->contact_number }}">{{ AppProperties()->contact_number }}</a></h3>
                        </div><!-- /.footer-widget__about-phone-content -->
                    </div><!-- /.footer-widget__about-phone -->
                </div><!-- /.footer-widget footer-widget__about -->
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-2 col-sm-6">
                <div class="footer-widget footer-widget__link">
                    <h3 class="footer-widget__title">{{ __('message.explore') }}</h3>
                    <ul class="list-unstyled footer-widget__link-list">
                        <li><a href="{{ url('about') }}"><i class="fa fa-arrow-right"></i>{{ __('message.about_us') }}</a></li>
                        <li><a href="{{ url('news') }}"><i class="fa fa-arrow-right"></i>{{ __('message.news') }}</a></li>
                        {{-- <li><a href=""><i class="fa fa-arrow-right"></i>{{ Translate('Testimonials') }}</a></li> --}}
                        <li><a href="{{ url('contact') }}"><i class="fa fa-arrow-right"></i>{{ __('message.contact') }}</a></li>
                        {{-- <li><a href=""><i class="fa fa-arrow-right"></i>{{ Translate('Loan Calculator') }}</a></li> --}}
                    </ul><!-- /.list-unstyled -->
                </div><!-- /.footer-widget -->
            </div><!-- /.col-lg-2 -->
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget footer-widget__post">
                    <h3 class="footer-widget__title">{{ __('message.latest_news') }}</h3>
                    <ul class="list-unstyled footer-widget__post-list">
                        @forelse (\App\Models\Blog::where('status', true)->latest()->limit(2)->get() as $latestItem)
                        <li>
                            <img src="{{ asset($latestItem->image) }}" alt="" width="100">
                            <div class="footer-widget__post-list-content">
                                {{-- <span>October 16, 2020</span> --}}
                                <h3><a href="">
                                    {{ (session('langCode') == 'EN') ? $latestItem->title : $latestItem->title_in_bangla }}    
                                </a></h3>
                            </div><!-- /.footer-widget__post-content -->
                        </li>
                        @empty
                        <li>
                            <img src="frontend/images/resources/footer-post-1-1.png" alt="">
                            <div class="footer-widget__post-list-content">
                                <span>October 16, 2020</span>
                                <h3><a href="">{{ Translate('We’re Providing the Quality Services') }}</a></h3>
                            </div><!-- /.footer-widget__post-content -->
                        </li>
                        <li>
                            <img src="frontend/images/resources/footer-post-1-2.png" alt="">
                            <div class="footer-widget__post-list-content">
                                <span>October 16, 2020</span>
                                <h3><a href="">{{ Translate('We’re Providing the Quality Services') }}</a></h3>
                            </div><!-- /.footer-widget__post-content -->
                        </li>
                        <li>
                            <img src="frontend/images/resources/footer-post-1-2.png" alt="">
                            <div class="footer-widget__post-list-content">
                                <span>October 16, 2020</span>
                                <h3><a href="">{{ Translate('We’re Providing the Quality Services') }}</a></h3>
                            </div><!-- /.footer-widget__post-content -->
                        </li>
                        @endforelse
                    </ul><!-- /.list-unstyled -->
                </div><!-- /.footer-widget -->
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget footer-widget__contact">
                    <h3>{{ __('message.contact') }}</h3>
                    <ul class="list-unstyled footer-widget__contact-list">
                        <li>
                            <a href="mailto:{{ AppProperties()->contact_email }}"><i class="pylon-icon-email1"></i>{{ AppProperties()->contact_email }}</a>
                        </li>
                        <li>
                            <a href="#"><i class="pylon-icon-clock2"></i>{{ AppProperties()->office_time }}</a>
                        </li>
                        <li>
                            <a href="#"><i class="pylon-icon-pin1"></i> {{AppProperties()->location}} </a>
                        </li>
                    </ul>
                </div><!-- /.footer-widget footer-widget__contact -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
  </footer><!-- /.site-footer -->
      <div class="container">
          <p>{{ AppProperties()->copyright_text }}</p>
          <div class="bottom-footer__social">
              <a href="#" class="fab fa-facebook-f"></a>
              <a href="#" class="fab fa-twitter"></a>
              <a href="#" class="fab fa-pinterest-p"></a>
              <a href="#" class="fab fa-instagram"></a>
          </div><!-- /.bottom-footer__social -->
      </div><!-- /.container -->
</div><!-- /.bottom-footer -->

