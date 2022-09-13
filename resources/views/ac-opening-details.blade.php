@extends('layouts.app')

@section('page_title', 'Account Opening')


@section('content')
        
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('frontend/images/backgrounds/page-header-bg-1-1.jpg') }});"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>
                    <li><a href="{{ url()->current() }}">Account opening</a></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
                <h2>{{ (session('langCode') == 'en') ? "Account Opening" : "ব্যাংক হিসাব খোলা" }}</h2>
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="blog-details pt-100 pb-100">
            <div class="container">
                <div class="row justify-content-center">                   
                    
                    @forelse ($data as $key => $item)
                    <div class="col-8">
                        <div class="accordion" id="accordionExample">
                            <div class="card shadow mb-3">
                                <div class="card-header bg-primary text-white" id="heading{{$key}}" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                    <strong>{{ $item->type }}</strong>
                                </div>

                                <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @if (is_null($item->describe))
                                            <strong>Null</strong>
                                        @else
                                            {!! (session('langCode') == 'en') ? $item->describe : $item->describe_in_bangla !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    @empty
                        
                    @endforelse
                    
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog-details -->

@endsection