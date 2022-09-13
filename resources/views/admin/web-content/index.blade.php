@extends("layouts.admin.app")

@section('content')

    <!-- Main content -->
    <section class="content my-5 ">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">

                <div class="col-12">
                    <div class="row p-5">

                        <div class="col-lg-12 row">
                            <div class="col-4 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link {{ ($tab == 'sliders') ? 'active' : '' }}" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true"> <i class="bi bi-collection mr-3"></i>Sliders</a>
                                    <a class="nav-link {{ ($tab == 'tab-slider') ? 'active' : '' }}" id="vert-tabs-btn-tab" data-toggle="pill" href="#vert-tabs-btn" role="tab" aria-controls="vert-tabs-btn" aria-selected="true"> <i class="bi bi-collection mr-3"></i>Tab Slider</a>
                                    <a class="nav-link {{ ($tab == 'company') ? 'show active' : '' }}" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-company" role="tab" aria-controls="vert-tabs-profile" aria-selected="false"> <i class="bi bi-building mr-3"></i>Company Introducion</a>
                                    <a class="nav-link {{ ($tab == 'get-to-know') ? 'show active' : '' }}" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false"> <i class="bi bi-back mr-3"></i>Get to Know About</a>
                                    <a class="nav-link {{ ($tab == 'trusted-company') ? 'show active' : '' }}" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false"> <i class="bi bi-building mr-3"></i>Trusted Company</a>
                                    <a class="nav-link {{ ($tab == 'testimonial') ? 'show active' : '' }}" id="vert-tabs-testimonial-tab" data-toggle="pill" href="#vert-tabs-testimonial" role="tab" aria-controls="vert-tabs-testimonial" aria-selected="false"> <i class="bi bi-chat-right-heart-fill mr-3"></i>Testimonial </a>
                                    <a class="nav-link {{ ($tab == 'why-us') ? 'show active' : '' }}" id="vert-tabs-whyUs-tab" data-toggle="pill" href="#vert-tabs-whyUs" role="tab" aria-controls="vert-tabs-whyUs" aria-selected="false"> <i class="bi bi-box2-heart-fill mr-3"></i>Why Choose Us </a>
                                    <a class="nav-link {{ ($tab == 'about-us') ? 'show active' : '' }}" id="vert-tabs-aboutUs-tab" data-toggle="pill" href="#vert-tabs-aboutUs" role="tab" aria-controls="vert-tabs-aboutUs" aria-selected="false"> <i class="bi bi-cursor-fill mr-3"></i>About Us</a>
                                    <a class="nav-link {{ ($tab == 'teams') ? 'show active' : '' }}" id="vert-tabs-team-tab" data-toggle="pill" href="#vert-tabs-team" role="tab" aria-controls="vert-tabs-team" aria-selected="false"> <i class="bi bi-people-fill mr-3"></i>Teams</a>
                                    <a class="nav-link {{ ($tab == 'accounts') ? 'show active' : '' }}" id="vert-tabs-account-tab" data-toggle="pill" href="#vert-tabs-account" role="tab" aria-controls="vert-tabs-account" aria-selected="false"> <i class="bi bi-gear mr-3"></i>Account Services</a>
                                    <a class="nav-link {{ ($tab == 'subject') ? 'show active' : '' }}" id="vert-tabs-subject-tab" data-toggle="pill" href="#vert-tabs-subject" role="tab" aria-controls="vert-tabs-subject" aria-selected="false"> <i class="bi bi-gear mr-3"></i>Message Subject</a>
                                </div>
                            </div>
                            <div class="col-8 col-sm-9">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                    
                                    <!--  Slider Image  -->
                                    <div class="tab-pane fade {{ ($tab == 'sliders') ? 'show active' : '' }}" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                        
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h4 class="card-title mr-5">Sliders</h4>
                                                <a href="{{ route('admin.slider.add') }}" class="mt-3 btn-link"> <i class="bi bi-plus"></i> Create Slide</a>
                                            </div>
                                            <div class="card-body">
                                                <table class="table w-100">
                                                    
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Image</th>
                                                            <th>Slider Title</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (\App\Models\AppSlider::where('status', true)->latest()->get() as $key => $slider)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>
                                                                <img src="{{ asset($slider->image_path) }}" alt="{{ $slider->title }}" width="200" class="img-fluid">
                                                            </td>
                                                            <td>{{ $slider->title }}</td>
                                                            <td>
                                                                @if ($slider->status)
                                                                    <button class="btn btn-success"> <i class="bi bi-check"></i> </button>
                                                                @else
                                                                    <button class="btn btn-success"> <i class="bi bi-x"></i> </button>                                                            
                                                                @endif
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-info">
                                                                    <i class="bi bi-pen"></i>
                                                                </a>
                                                                <a href="{{ route('admin.slider.delete', $slider->id) }}" class="btn btn-warning">
                                                                    <i class="bi bi-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!--  Tab Slider  -->
                                    <div class="tab-pane fade {{ ($tab == 'tab-slider') ? 'show active' : '' }}" id="vert-tabs-btn" role="tabpanel" aria-labelledby="vert-tabs-btn-tab">
                                        
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h4 class="card-title mr-5">
                                                    Tab Slider
                                                </h4>
                                            </div>
                                            <div class="card-body table-responsive">
                                                
                                                <br>
                                                <table class="table w-100" id="example1">
                                                    
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Type</th>
                                                            <th>Description</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (\App\Models\AcTitle::latest()->get() as $key => $item)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td class="text-nowrap">{{ $item->ac_title_in_bangla }}</td>
                                                            <td>{!! substr_replace($item->details_in_bangla, 0, 100) !!} [...] </td>
                                                            <td>
                                                               <a title="{{ ($item->status) ? 'Active' : 'Inactive' }}" href="javascript::" class="btn {{ ($item->status) ? 'btn-success' : 'btn-secondary' }}"
                                                                    onclick="if(confirm('Are your sure? Do you want to change status?')){ location.replace('{{ route('admin.actitle.status', $item->id) }}') }">
                                                                    <i class="bi {{ ($item->status) ? 'bi-check2-circle' : 'bi-x-circle' }}"></i>
                                                                </a>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <a title="Update" href="{{route('admin.actitle.edit', [$item->id])}}" class="btn btn-info">
                                                                    <i class="bi bi-pen"></i>
                                                                </a>
                                                                <a title="Delete" href="javascript::"
                                                                    onclick="if(confirm('Are your sure? Do you want to delete this?')){ location.replace('{{ route('admin.actitle.delete', $item->id) }}') }"
                                                                    class="btn btn-warning">
                                                                    <i class="bi bi-trash"></i>
                                                                </a>  
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>

                                    </div>

                                    <!--  Company Introduction  -->
                                    <div class="tab-pane fade {{ ($tab == 'company') ? 'show active' : '' }}" id="vert-tabs-company" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                            <h4 class="card-title w-100">
                                                Company Introductions
                                            </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="border-bottom border-secondary">
                                                    <label for="">Company Intro Title</label>
                                                </div>
                                                <form action="{{ route('admin.content.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="section" value="company_intro_title">
                                                    <label for="">In English</label>
                                                    <textarea name="data" class="form-control mb-3">{!! AppContentInEnglish('company_intro_title') !!}</textarea>
                                                    <label for="">In Bangla</label>
                                                    <textarea name="data_in_bangla" class="form-control mb-3">{!! AppContentInBangla('company_intro_title') !!}</textarea>
                                                    <button class="btn btn-primary">SAVE</button>
                                                </form>

                                                <div class="mt-4 border-bottom border-secondary">
                                                    <label for="">Company Intro</label>
                                                </div>

                                                <form action="{{ route('admin.content.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="section" value="company_intro_body">
                                                    <label for="">In English</label>
                                                    <textarea name="data" class="form-control mb-3" cols="30" rows="5">{!! AppContentInEnglish('company_intro_body') !!}</textarea>
                                                    <label for="">In Bangla</label>
                                                    <textarea name="data_in_bangla" class="form-control mb-3" cols="30" rows="5">{!! AppContentInBangla('company_intro_body') !!}</textarea>
                                                    <button class="btn btn-primary">SAVE</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!--  Get to Know About -->
                                    <div class="tab-pane fade {{ ($tab == 'get-to-know') ? 'show active' : '' }}" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                                        
                                        <div class="card card-primary">
                                            <div class="card-header">
                                            <h4 class="card-title w-100">
                                                Get to Know About
                                            </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="border-bottom border-secondary">
                                                    <label for="">Title</label>
                                                </div>
                                                <form action="{{ route('admin.content.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="section" value="get_to_know_about_title">
                                                    <label for="">In English</label>
                                                    <textarea name="data" class="form-control mb-3">{!! AppContentInEnglish('get_to_know_about_title') !!}</textarea>
                                                    
                                                    <label for="">In Bangla</label>
                                                    <textarea name="data_in_bangla" class="form-control mb-3">{!! AppContentInBangla('get_to_know_about_title') !!}</textarea>
                                                    <button class="btn btn-primary">SAVE</button>
                                                </form>

                                                <div class="mt-4 border-bottom border-secondary">
                                                    <label for="">Text</label>
                                                </div>

                                                <form action="{{ route('admin.content.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="section" value="get_to_know_about_text">
                                                    <label for="">In English</label>
                                                    <textarea name="data" class="form-control mb-3" cols="30" rows="5">{!! AppContentInEnglish('get_to_know_about_text') !!}</textarea>
                                                    
                                                    <label for="">In Bangla</label>
                                                    <textarea name="data_in_bangla" class="form-control mb-3" cols="30" rows="5">{!! AppContentInBangla('get_to_know_about_text') !!}</textarea>
                                                    <button class="btn btn-primary">SAVE</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!--  Trusted Company -->
                                    <div class="tab-pane fade {{ ($tab == 'trusted-company') ? 'show active' : '' }}" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                            <h4 class="card-title w-100">
                                                Trusted Company
                                            </h4>
                                            </div>
                                            {{-- <div id="collapseOne" class="collapse show" data-parent="#accordion"> --}}
                                            <div id="" class="collapse show" data-parent="#accordion">
                                                <div class="card-body">
                                                    
                                                    <form action="{{ route('admin.content.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="section" value="trusted_company_text">
                                                        <label for="">In English</label>
                                                        <textarea name="data" id="trusted_company" class="form-control mb-3">{!! AppContentInEnglish('trusted_company_text') !!}</textarea>
                                                        
                                                        <label for="">In Bangla</label>
                                                        <textarea name="data_in_bangla" id="trusted_company_in_bangla" class="form-control mb-3">{!! AppContentInBangla('trusted_company_text') !!}</textarea>
                                                        <button class="btn btn-primary">SAVE</button>
                                                    </form>


                                                    <div class="border-bottom">
                                                        <h5>Right List One</h5>
                                                    </div>

                                                    <form action="{{ route('admin.content.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="section" value="trusted_company_text">
                                                        <label for="">In English</label>
                                                        <textarea name="data" id="trusted_company" class="form-control mb-3">{!! AppContentInEnglish('trusted_company_text') !!}</textarea>
                                                        
                                                        <label for="">In Bangla</label>
                                                        <textarea name="data_in_bangla" id="trusted_company_in_bangla" class="form-control mb-3">{!! AppContentInBangla('trusted_company_text') !!}</textarea>
                                                        <button class="btn btn-primary">SAVE</button>
                                                    </form>


                                                    <form action="{{ route('admin.content.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="section" value="trusted_company_text">
                                                        <label for="">In English</label>
                                                        <textarea name="data" id="trusted_company" class="form-control mb-3">{!! AppContentInEnglish('trusted_company_text') !!}</textarea>
                                                        
                                                        <label for="">In Bangla</label>
                                                        <textarea name="data_in_bangla" id="trusted_company_in_bangla" class="form-control mb-3">{!! AppContentInBangla('trusted_company_text') !!}</textarea>
                                                        <button class="btn btn-primary">SAVE</button>
                                                    </form>


                                                    <form action="{{ route('admin.content.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="section" value="trusted_company_text">
                                                        <label for="">In English</label>
                                                        <textarea name="data" id="trusted_company" class="form-control mb-3">{!! AppContentInEnglish('trusted_company_text') !!}</textarea>
                                                        
                                                        <label for="">In Bangla</label>
                                                        <textarea name="data_in_bangla" id="trusted_company_in_bangla" class="form-control mb-3">{!! AppContentInBangla('trusted_company_text') !!}</textarea>
                                                        <button class="btn btn-primary">SAVE</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!--  Testimonial  -->
                                    <div class="tab-pane fade {{ ($tab == 'testimonial') ? 'show active' : '' }}" id="vert-tabs-testimonial" role="tabpanel" aria-labelledby="vert-tabs-testimonial-tab">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h4 class="card-title mr-5">
                                                    Testimonial
                                                </h4>
                                                <a href="{{ route('admin.testimonial.create') }}" class="mt-3 btn-link"> <i class="bi bi-plus"></i> Create Testimonial</a>

                                            </div>
                                            <div class="card-body table-responsive">
                                                
                                                <br>
                                                <table class="table w-100" id="example1">
                                                    
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Image</th>
                                                            <th align="center"> Name <br> <small>Designation</small> </th>
                                                            <th>Testimonial</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (\App\Models\Testimonial::latest()->get() as $key => $item)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>
                                                                <img src="{{ asset($item->image) }}" width="100" class="img-fluid d-block m-auto">
                                                            </td>
                                                            <td>{{ $item->name }} <br> <small>{{ $item->position }}</small> </td>
                                                            <td>{{ substr($item->content, 0, 100) . '...' }} </td>
                                                            <td>
                                                               <a title="{{ ($item->status) ? 'Active' : 'Inactive' }}" href="javascript::" class="btn {{ ($item->status) ? 'btn-success' : 'btn-secondary' }}"
                                                                    onclick="if(confirm('Are your sure? Do you want to change status?')){ location.replace('{{ route('admin.testimonial.status', $item->id) }}') }">
                                                                    <i class="bi {{ ($item->status) ? 'bi-check2-circle' : 'bi-x-circle' }}"></i>
                                                                </a>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <a title="Update" href="{{route('admin.testimonial.edit', [$item->id])}}" class="btn btn-info">
                                                                    <i class="bi bi-pen"></i>
                                                                </a>
                                                                <a title="Delete" href="javascript::"
                                                                    onclick="if(confirm('Are your sure? Do you want to delete this?')){ location.replace('{{ route('admin.testimonial.delete', $item->id) }}') }"
                                                                    class="btn btn-warning">
                                                                    <i class="bi bi-trash"></i>
                                                                </a>  
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                     <!--  //. Testimonial  -->


                                    <!--  Why Us  -->
                                    <div class="tab-pane fade {{ ($tab == 'why-us') ? 'show active' : '' }}" id="vert-tabs-whyUs" role="tabpanel" aria-labelledby="vert-tabs-whyUs-tab">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                            <h4 class="card-title w-100">
                                                Why choose Us
                                            </h4>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('admin.content.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="section" value="why_choose_us_text">
                                                    <label for="">In English</label>
                                                    <textarea name="data" id="why_us" class="form-control mb-3" cols="30" rows="5">{!! AppContentInEnglish('why_choose_us_text') !!}</textarea>
                                                    <label for="">In Bangla</label>
                                                    <textarea name="data_in_bangla" id="why_us_in_bangla" class="form-control mb-3" cols="30" rows="5">{!! AppContentInBangla('why_choose_us_text') !!}</textarea>
                                                    <button class="btn btn-primary">SAVE</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  //. Why Us  -->


                                    <!--   About Us  -->
                                    <div class="tab-pane fade {{ ($tab == 'about-us') ? 'show active' : '' }}" id="vert-tabs-aboutUs" role="tabpanel" aria-labelledby="vert-tabs-whyUs-tab">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                            <h4 class="card-title w-100">
                                                About Us
                                            </h4>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('admin.content.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="section" value="about_us">
                                                    <label for="">In English</label>
                                                    <textarea name="data" id="about_us" class="form-control mb-3" cols="30" rows="5">{!! AppContentInEnglish('about_us') !!}</textarea>
                                                    <label for="">In Bangla</label>
                                                    <textarea name="data_in_bangla" id="about_us_in_bangla" class="form-control mb-3" cols="30" rows="5">{!! AppContentInBangla('about_us') !!}</textarea>
                                                    <button class="btn btn-primary">SAVE</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  //.  About Us  -->


                                    <!--  Teams  -->
                                    <div class="tab-pane fade {{ ($tab == 'teams') ? 'show active' : '' }}" id="vert-tabs-team" role="tabpanel" aria-labelledby="vert-tabs-team-tab">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h4 class="card-title mr-5">
                                                    Teams
                                                </h4>
                                                <a href="{{ route('admin.team.create') }}" class="mt-3 btn-link"> <i class="bi bi-plus"></i> Add Team Member</a>

                                            </div>
                                            <div class="card-body table-responsive">
                                                
                                                <br>
                                                <table class="table w-100" id="example1">
                                                    
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Image</th>
                                                            <th align="center"> Name </th>
                                                            <th>Designation</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (\App\Models\Team::latest()->get() as $key => $item)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>
                                                                <img src="{{ asset($item->image) }}" width="100" class="img-fluid d-block m-auto">
                                                            </td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->designation }} </td>
                                                            <td>
                                                               <a title="{{ ($item->status) ? 'Active' : 'Inactive' }}" href="javascript::" class="btn {{ ($item->status) ? 'btn-success' : 'btn-secondary' }}"
                                                                    onclick="if(confirm('Are your sure? Do you want to change status?')){ location.replace('{{ route('admin.team.status', $item->id) }}') }">
                                                                    <i class="bi {{ ($item->status) ? 'bi-check2-circle' : 'bi-x-circle' }}"></i>
                                                                </a>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <a title="Update" href="{{route('admin.team.edit', [$item->id])}}" class="btn btn-info">
                                                                    <i class="bi bi-pen"></i>
                                                                </a>
                                                                <a title="Delete" href="javascript::"
                                                                    onclick="if(confirm('Are your sure? Do you want to delete this?')){ location.replace('{{ route('admin.team.delete', $item->id) }}') }"
                                                                    class="btn btn-warning">
                                                                    <i class="bi bi-trash"></i>
                                                                </a>  
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                     <!--  //. Teams  -->


                                    <!--  Accounts  -->
                                    <div class="tab-pane fade {{ ($tab == 'accounts') ? 'show active' : '' }}" id="vert-tabs-account" role="tabpanel" aria-labelledby="vert-tabs-account-tab">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h4 class="card-title mr-5">
                                                    Account Services
                                                </h4>
                                                <a href="{{ route('admin.actype.create') }}" class="mt-3 btn-link"> <i class="bi bi-plus"></i> Add Services</a>

                                            </div>
                                            <div class="card-body table-responsive">
                                                
                                                <br>
                                                <table class="table w-100" id="example1">
                                                    
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Type</th>
                                                            <th>Description</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (\App\Models\AcType::latest()->get() as $key => $item)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td class="text-nowrap">{{ $item->type }}</td>
                                                            <td>{!! substr_replace($item->describe, 0, 100) !!} [...] </td>
                                                            <td>
                                                               <a title="{{ ($item->status) ? 'Active' : 'Inactive' }}" href="javascript::" class="btn {{ ($item->status) ? 'btn-success' : 'btn-secondary' }}"
                                                                    onclick="if(confirm('Are your sure? Do you want to change status?')){ location.replace('{{ route('admin.actype.status', $item->id) }}') }">
                                                                    <i class="bi {{ ($item->status) ? 'bi-check2-circle' : 'bi-x-circle' }}"></i>
                                                                </a>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <a title="Update" href="{{route('admin.actype.edit', [$item->id])}}" class="btn btn-info">
                                                                    <i class="bi bi-pen"></i>
                                                                </a>
                                                                <a title="Delete" href="javascript::"
                                                                    onclick="if(confirm('Are your sure? Do you want to delete this?')){ location.replace('{{ route('admin.actype.delete', $item->id) }}') }"
                                                                    class="btn btn-warning">
                                                                    <i class="bi bi-trash"></i>
                                                                </a>  
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                     <!--  //. Accounts  -->


                                     <!--  subject  -->
                                    <div class="tab-pane fade {{ ($tab == 'subject') ? 'show active' : '' }}" id="vert-tabs-subject" role="tabpanel" aria-labelledby="vert-tabs-subject-tab">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h4 class="card-title mr-5">
                                                    Message Subject
                                                </h4>
                                                <a href="#" data-target="#newSubject" data-toggle="modal" class="mt-3 btn-link"> <i class="bi bi-plus"></i> Add Services</a>
                                            </div>
                                            <div class="card-body table-responsive">
                                                
                                                <br>
                                                <table class="table w-100" id="example1">
                                                    
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Subject</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (\App\Models\MessageSubject::latest()->get() as $key => $item)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td class="text-nowrap">{{ $item->name }}</td>
                                                            <td>
                                                               <a title="{{ ($item->status) ? 'Active' : 'Inactive' }}" href="javascript::" class="btn {{ ($item->status) ? 'btn-success' : 'btn-secondary' }}"
                                                                    onclick="if(confirm('Are your sure? Do you want to change status?')){ location.replace('{{ route('admin.message.subject.status', $item->id) }}') }">
                                                                    <i class="bi {{ ($item->status) ? 'bi-check2-circle' : 'bi-x-circle' }}"></i>
                                                                </a>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <a title="Delete" href="javascript::"
                                                                    onclick="if(confirm('Are your sure? Do you want to delete this?')){ location.replace('{{ route('admin.message.subject.delete', $item->id) }}') }"
                                                                    class="btn btn-warning">
                                                                    <i class="bi bi-trash"></i>
                                                                </a>  
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                     <!--  //. Accounts  -->
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- col -->
                <div class="col-lg-8 d-none">
                    {{-- <a href="" class="btn btn-link mr-5"> <i class="bi bi-arrow-left"></i> Back</a> --}}
                    {{-- <a href="{{ route('admin.content.create') }}" class="btn btn-link"> <i class="bi bi-plus"></i> Create Service</a> --}}
                    
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Web Content</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                        <div id="accordion">
                            
                            <!--  App Sliders  -->
                            <div class="card card-primary">
                                <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                    Sliders
                                    </a>
                                </h4>
                                </div>
                                {{-- <div id="collapseOne" class="collapse show" data-parent="#accordion"> --}}
                                <div id="collapseOne" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="https://www.imgacademy.com/themes/custom/imgacademy/images/helpbox-contact.jpg" alt="First slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="https://www.imgacademy.com/themes/custom/imgacademy/images/helpbox-contact.jpg" alt="Second slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="https://www.imgacademy.com/themes/custom/imgacademy/images/helpbox-contact.jpg" alt="Third slide">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-left"></i>
                                                </span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right"></i>
                                                </span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--  Company Introduction  -->
                            <div class="card card-primary">
                                <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                    Company Introductions
                                    </a>
                                </h4>
                                </div>
                                {{-- <div id="collapseOne" class="collapse show" data-parent="#accordion"> --}}
                                <div id="collapseOne" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="border-bottom border-secondary">
                                            <label for="">Company Intro Title</label>
                                        </div>
                                        <form action="{{ route('admin.content.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="section" value="company_intro">
                                            <label for="">In English</label>
                                            <textarea name="data" class="form-control mb-3">{!! AppContentInEnglish('company_intro_title') !!}</textarea>
                                            <label for="">In Bangla</label>
                                            <textarea name="data_in_bangla" class="form-control mb-3">{!! AppContentInBangla('company_intro_title') !!}</textarea>
                                            <button class="btn btn-primary">SAVE</button>
                                        </form>

                                        <div class="mt-4 border-bottom border-secondary">
                                            <label for="">Company Intro</label>
                                        </div>

                                        <form action="{{ route('admin.content.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="section" value="company_intro_body">
                                            <label for="">In English</label>
                                            <textarea name="data" class="form-control mb-3" cols="30" rows="5">{!! AppContentInEnglish('company_intro_body') !!}</textarea>
                                            <label for="">In Bangla</label>
                                            <textarea name="data_in_bangla" class="form-control mb-3" cols="30" rows="5">{!! AppContentInBangla('company_intro_body') !!}</textarea>
                                            <button class="btn btn-primary">SAVE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!--  Get to Know About -->
                            <div class="card card-primary">
                                <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#get_to_know_about">
                                    Get to Know About
                                    </a>
                                </h4>
                                </div>
                                {{-- <div id="collapseOne" class="collapse show" data-parent="#accordion"> --}}
                                <div id="get_to_know_about" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="border-bottom border-secondary">
                                            <label for="">Title</label>
                                        </div>
                                        <form action="{{ route('admin.content.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="section" value="get_to_know_about_title">
                                            <label for="">In English</label>
                                            <textarea name="data" class="form-control mb-3">{!! AppContentInEnglish('get_to_know_about_title') !!}</textarea>
                                            
                                            <label for="">In Bangla</label>
                                            <textarea name="data_in_bangla" class="form-control mb-3">{!! AppContentInBangla('get_to_know_about_title') !!}</textarea>
                                            <button class="btn btn-primary">SAVE</button>
                                        </form>

                                        <div class="mt-4 border-bottom border-secondary">
                                            <label for="">Text</label>
                                        </div>

                                        <form action="{{ route('admin.content.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="section" value="get_to_know_about_text">
                                            <label for="">In English</label>
                                            <textarea name="data" class="form-control mb-3" cols="30" rows="5">{!! AppContentInEnglish('get_to_know_about_text') !!}</textarea>
                                            
                                            <label for="">In Bangla</label>
                                            <textarea name="data_in_bangla" class="form-control mb-3" cols="30" rows="5">{!! AppContentInBangla('get_to_know_about_text') !!}</textarea>
                                            <button class="btn btn-primary">SAVE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!--  Trusted Company -->
                            <div class="card card-primary">
                                <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#trusted_company">
                                    Trusted Company
                                    </a>
                                </h4>
                                </div>
                                {{-- <div id="collapseOne" class="collapse show" data-parent="#accordion"> --}}
                                <div id="trusted_company" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="border-bottom border-secondary">
                                            <label for="">Title</label>
                                        </div>
                                        <form action="{{ route('admin.content.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="section" value="trusted_company_title">
                                            <label for="">In English</label>
                                            <textarea name="data" class="form-control mb-3">{!! AppContentInEnglish('trusted_company_title') !!}</textarea>
                                            
                                            <label for="">In Bangla</label>
                                            <textarea name="data_in_bangla" class="form-control mb-3">{!! AppContentInBangla('trusted_company_title') !!}</textarea>
                                            <button class="btn btn-primary">SAVE</button>
                                        </form>

                                        <div class="mt-4 border-bottom border-secondary">
                                            <label for="">Text</label>
                                        </div>

                                        <form action="{{ route('admin.content.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="section" value="trusted_company_text">
                                            <label for="">In English</label>
                                            <textarea name="data" class="form-control mb-3" cols="30" rows="5">{!! AppContentInEnglish('trusted_company_text') !!}</textarea>
                                            
                                            <label for="">In Bangla</label>
                                            <textarea name="data_in_bangla" class="form-control mb-3" cols="30" rows="5">{!! AppContentInBangla('trusted_company_text') !!}</textarea>
                                            <button class="btn btn-primary">SAVE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            <!--  Why Choose Us -->
                            <div class="card card-primary">
                                <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#why_choose_us">
                                    Why Choose Us
                                    </a>
                                </h4>
                                </div>
                                {{-- <div id="collapseOne" class="collapse show" data-parent="#accordion"> --}}
                                <div id="why_choose_us" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="border-bottom border-secondary">
                                            <label for="">Title</label>
                                        </div>
                                        <form action="{{ route('admin.content.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="section" value="why_choose_us_texts">
                                            <label for="">In English</label>
                                            <textarea name="data" class="form-control mb-3">{!! AppContentInEnglish('why_choose_us_text') !!}</textarea>
                                            
                                            <label for="">In Bangla</label>
                                            <textarea name="data_in_bangla" class="form-control mb-3">{!! AppContentInBangla('why_choose_us_text') !!}</textarea>
                                            <button class="btn btn-primary">SAVE</button>
                                        </form>

                                        <div class="mt-4 border-bottom border-secondary">
                                            <label for="">Text</label>
                                        </div>

                                        <form action="{{ route('admin.content.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="section" value="why_choose_us_text">
                                            <label for="">In English</label>
                                            <textarea name="data" class="form-control mb-3" cols="30" rows="5">{!! AppContentInEnglish('why_choose_us_text') !!}</textarea>
                                            
                                            <label for="">In Bangla</label>
                                            <textarea name="data_in_bangla" class="form-control mb-3" cols="30" rows="5">{!! AppContentInBangla('why_choose_us_text') !!}</textarea>
                                            <button class="btn btn-primary">SAVE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            <!--  About Us    -->
                            <div class="card card-success">
                                <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                    About Us
                                    </a>
                                </h4>
                                </div>
                                {{-- <div id="collapseOne" class="collapse show" data-parent="#accordion"> --}}
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <form action="{{ route('admin.content.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="section" value="about_us">
                                            <label for="">In English</label>
                                            <textarea name="data" class="form-control mb-3" cols="30" rows="5">{!! AppContentInEnglish('about_us') !!}</textarea>
                                            <label for="">In Bangla</label>
                                            <textarea name="data_in_bangla" class="form-control mb-3" cols="30" rows="5">{!! AppContentInBangla('about_us') !!}</textarea>
                                            <button class="btn btn-primary">SAVE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- col -->


            </div><!-- Row -->
        </div>
    </div>


    <div class="modal fade" id="newSubject" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('admin.message.subject.create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Subject</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="">subject (In Bangla)</label>
                            <input type="text" class="form-control" name="name_in_bangla">
                        </div>

                        <button class="btn btn-outline-dark">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <!--  CkEditor.js  -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('trusted_company');
        CKEDITOR.replace('trusted_company_in_bangla');
        CKEDITOR.replace('why_us');
        CKEDITOR.replace('why_us_in_bangla');
        CKEDITOR.replace('about_us');
        CKEDITOR.replace('about_us_in_bangla');
    </script>    
@endpush