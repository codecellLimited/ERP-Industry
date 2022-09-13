@extends('layouts.app')

@section('page_title', $row->title)


@section('content')
        
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('frontend/images/backgrounds/page-header-bg-1-1.jpg') }});"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>
                    <li><a href="{{ url()->current() }}">Details</a></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
                <h2>{{ (session('langCode') == 'en') ? $row->title : $row->title_in_bangla }}</h2>
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="blog-details pt-100 pb-100">
            <div class="container">
                <div class="row justify-content-center">                   
                    
                    <div class="col-md-8">
                        {!! (session('langCode') == 'en') ? $row->content : $row->content_in_bangla !!}
                    </div>
                    
                    
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog-details -->

@endsection