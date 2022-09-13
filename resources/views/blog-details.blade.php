@extends('layouts.app')

@section('page_title', $blog->title)


@section('content')

        
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>
                    <li><a href="{{ url('news') }}">News</a></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
                <h2>{{ (session('langCode') == 'en') ? $blog->title : $blog->title_in_bangla }}</h2>
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="blog-details pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-card__image">
                            <span>{{ date('d M, Y', strtotime($blog->created_at)) }}</span>
                            <img src="{{asset($blog->image)}}" alt="">
                        </div><!-- /.blog-card__image -->
                        {{-- <div class="blog-card__meta">
                            <a href="#"><i class="far fa-folder"></i>Investment</a>
                            <a href="#"><i class="far fa-comments"></i>Comment</a>
                            <a href="#"><i class="far fa-user"></i>Admin</a>
                        </div><!-- /.blog-card__meta --> --}}


                        <div>
                            {!! (session('langCode') == 'en') ? $blog->content : $blog->content_in_bangla !!}
                        </div>
                       

                        {{-- <div class="blog-details__bottom">
                            <div class="blog-details__tags">
                                <span>
                                    <a href="#">Company</a>
                                    <a href="#">House Loan</a>
                                    <a href="#">IT Loan</a>
                                </span>
                            </div><!-- /.blog-details__tags --> --}}
                            {{-- <div class="blog-details__social team-details__social">
                                <a href="#" class="fab fa-facebook-f"></a>
                                <a href="#" class="fab fa-twitter"></a>
                                <a href="#" class="fab fa-linkedin-in"></a>
                            </div><!-- /.blog-details__social --> --}}
                        {{-- </div><!-- /.blog-details__bottom --> --}}
                        
                        <div class="blog-comment-form mt-5">
                            <h2 class="blog-details__box-title">Leave A Reply</h2>
                            <form action="{{ route('comment.store') }}" method="post" class="contact-one__form">
                                
                                @csrf
                                <input type="hidden" name="key" value="{{ $blog->id }}">

                                
                                <p>Your email address will not be published. </p>
                                <div class="row low-gutters">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control contact-one__form-input" placeholder="Name*" name="name" required>
                                        </div>
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control contact-one__form-input" placeholder="Email*" name="email" required>
                                        </div>
                                    </div><!-- /.col-md-6 -->
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control contact-one__form-input" placeholder="Website" name="website">
                                        </div>
                                    </div><!-- /.col-md-12 -->
                                    <div class="col-md-12">
                                        <div class="contact-one__form-consent">
                                            <div class="form-group">
                                                <input type="checkbox" name="consent" id="consentCheck">
                                                <label>Save my name, email, and website in this browser for the next time I comment.</label>
                                            </div>
                                        </div>
                                    </div><!--/.col-md-12--> --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control contact-one__form-input" placeholder="Your Comment*"></textarea>
                                        </div>
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                                <button class="thm-btn" type="submit">Post Comment</button>
                            </form><!-- /.contact-one__from -->

                        </div><!-- /.blog-comment -->

                        <div class="my-5">
                            <h4><strong>Previous Comments</strong></h4>
                            @forelse ($blog->comments as $item)
                            <div class="card shadow mb-3">
                                <div class="card-body px-5 py-2">
                                    <div class="row m-0 p-0">
                                        <div class="col-1">
                                            <i class="bi bi-person-circle text-danger" style="font-size: 50px"></i>
                                        </div>
                                        <div class="col-11">
                                            <h6 class="m-0">{{ $item->name }}</h6>
                                            <p>{{ $item->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="card shadow p-0">
                                <div class="card-body px-5 py-2">
                                    <div class="row m-0 p-0">
                                        <strong>No Comment Yet</strong>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>


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