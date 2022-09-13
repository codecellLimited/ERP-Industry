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
                            <form action="{{ route('admin.actype.update') }}" method="post" enctype="multipart/form-data">
                            @else
                            <form action="{{ route('admin.actype.store') }}" method="post" enctype="multipart/form-data">
                            @endif
                                @csrf

                                @isset($row)
                                <input type="hidden" name="key" value="{{ __($row->id) }}">
                                @endisset
                                

                                <!-- Category -->
                                <div class="form-group mb-3">
                                    <label for="">Category</label>

                                    <select name="ac_title_id" class="form-control" id="" required>
                                        <option value="" selected disabled>Selec One</option>
                                        @foreach (\App\Models\AcTitle::get() as $item)
                                        <option value="{{ $item->id }}" {{ (isset($row) && $item->id == $row->id) ? 'selected' : ''}}>{{ $item->ac_title_in_english }}</option>
                                        @endforeach
                                    </select>

                                    
                                    @error('cat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                


                               
                                <!-- Image -->
                                <div class="form-group mb-3">
                                    <label for="">Image</label><br>
                                    
                                    @if (isset($row))
                                        <img src="{{ asset($row->image) }}" alt="{{ $row->title }}" width="100" class="img-fluid">
                                    @endif

                                    <input type="file" name="image" class="form-control @error('image') border-danger @enderror">

                                    
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--  Account Name  -->
                                <div class="form-group mb-3">
                                    <label for="">Account type</label>
                                    <input type="text" name="type" class="form-control @error('type') border-danger @enderror"
                                    placeholder="Savings Account"
                                    @if (isset($row))
                                        value="{{ __($row->type) }}"
                                    @else
                                        value="{{ old('type') }}"
                                    @endif>

                                    
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--  describe  -->
                                <div class="form-group mb-3">
                                    <label for="">Describe</label>
                                    <textarea type="text" name="describe" id="describe" class="form-control @error('describe') border-danger @enderror">@if(isset($row)) {{ __($row->describe) }} @else {{ old('describe') }} @endif</textarea>

                                    
                                    @error('describe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <!--  describe In Bangla -->
                                <div class="form-group mb-3">
                                    <label for="">Describe (In Bangla)</label>
                                    <textarea type="text" name="describe_in_bangla" id="describe_in_bangla" class="form-control @error('describe_in_bangla') border-danger @enderror">@if(isset($row)) {{ __($row->describe_in_bangla) }} @else {{ old('describe_in_bangla') }} @endif</textarea>

                                    
                                    @error('describe_in_bangla')
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
        CKEDITOR.replace('describe_in_bangla');
    </script>
@endpush
