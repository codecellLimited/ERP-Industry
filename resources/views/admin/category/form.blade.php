@extends("layouts.admin.app")

@section('content')

    <!-- Main content -->
    <section class="content my-5 ">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">

               <!-- col -->
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <a href="{{ url()->previous() }}" class="btn btn-link mr-5"> <i class="bi bi-arrow-left"></i> Back</a>
                    
                    <!--  Card  -->
                    <div class="card shadow">
                        <div class="card-header">
                            @if(!isset($row))
                                <span class="h5">Create new category</span>
                            @endif
                        </div>
                        <div class="card-body">
                            @if (isset($row))
                            <form action="{{ route('admin.category.update') }}" method="post">
                            @else
                            <form action="{{ route('admin.category.store') }}" method="post">
                            @endif
                            
                                @csrf
                                @isset($item)
                                    <input type="hidden" name="item" value="{{ __($item) }}">
                                @endisset

                                @isset($row)
                                <input type="hidden" name="key" value="{{ __($row->id) }}">
                                @endisset

                                <div class="form-group mb-3">
                                    <label for="">Category Name</label>
                                    <input type="text" name="categoryName" class="form-control @error('categoryName') border-danger @enderror"
                                    @if (isset($row))
                                    value="{{ __($row->category_name) }}"
                                    @else
                                    value="{{ old('categoryName') }}"
                                    @endif>

                                    @error('categoryName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                {{-- <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="is_visible_on_homepage" id="flexCheckDefault"
                                    @isset($row)
                                        {{ ($row->is_visible_on_homepage) ? 'checked' : '' }}
                                    @endisset>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Display on home page
                                    </label>
                                </div> --}}

                                
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


            </div><!-- Row -->
        </div>
    </div>

@endsection