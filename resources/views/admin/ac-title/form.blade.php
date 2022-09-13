@extends("layouts.admin.app")

@section('page_name', 'Ac Type')

@section('content')

    <!-- Main content -->
    <section class="content my-5 ">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">

               <!-- col -->
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <a href="{{ route('admin.content.list') }}" class="btn btn-link mr-5"> <i class="bi bi-arrow-left"></i> Back</a>

                    <div class="card shadow">
                        <div class="card-header">
                            @if(!isset($row))
                            <span class="h5">Create Account type</span>
                            @else
                            <span>Update Records</span>
                            @endif                            
                        </div>

                        <div class="card-body">


                            @if (isset($row))
                            <form action="{{ route('admin.actitle.update') }}" method="post" enctype="multipart/form-data">
                            @else
                            <form action="{{ route('admin.actitle.store') }}" method="post" enctype="multipart/form-data">
                            @endif
                                @csrf

                                @isset($row)
                                <input type="hidden" name="key" value="{{ __($row->id) }}">
                                @endisset
                                

                                <!--  ac_title_in_english  -->
                                <div class="form-group mb-3">
                                    <label for="">Account type</label>
                                    <input type="text" name="ac_title_in_english" class="form-control @error('ac_title_in_english') border-danger @enderror"
                                    placeholder="Savings Account"
                                    @if (isset($row))
                                        value="{{ __($row->ac_title_in_english) }}"
                                    @else
                                        value="{{ old('ac_title_in_english') }}"
                                    @endif>

                                    
                                    @error('ac_title_in_english')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!-- ac_title_in_bangla -->
                                <div class="form-group mb-3">
                                    <label for="">Account title (In Bangla)</label>
                                    <input type="text" name="ac_title_in_bangla" class="form-control @error('ac_title_in_bangla') border-danger @enderror"
                                    placeholder="Savings Account"
                                    @if (isset($row))
                                        value="{{ __($row->ac_title_in_bangla) }}"
                                    @else
                                        value="{{ old('ac_title_in_bangla') }}"
                                    @endif>

                                    
                                    @error('ac_title_in_bangla')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--  	details_in_english  -->
                                <div class="form-group mb-3">
                                    <label for="">Describe</label>
                                    <textarea type="text" name="details_in_english" id="describe" class="form-control @error('details_in_english') border-danger @enderror">@if(isset($row)) {{ __($row->details_in_english) }} @else {{ old('details_in_english') }} @endif</textarea>

                                    
                                    @error('details_in_english')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--  describe In Bangla -->
                                <div class="form-group mb-3">
                                    <label for="">Describe (In Bangla)</label>
                                    <textarea type="text" name="details_in_bangla" id="details_in_bangla" class="form-control @error('details_in_bangla') border-danger @enderror">@if(isset($row)) {{ __($row->details_in_bangla) }} @else {{ old('details_in_bangla') }} @endif</textarea>

                                    
                                    @error('details_in_bangla')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                @if (isset($row))
                                <button class="btn btn-primary" type="submit">Update</button>
                                @else
                                <button class="btn btn-primary" type="submit">Create</button>
                                @endif
                            </form>

                        </div>
                    </div>

                </div>
               <!-- col -->


            </div>
            <!-- //. Row -->
        </div>
    </section>

@endsection


@push('js')
     <!--  CkEditor.js  -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('describe');
        CKEDITOR.replace('details_in_bangla');
    </script>
@endpush
