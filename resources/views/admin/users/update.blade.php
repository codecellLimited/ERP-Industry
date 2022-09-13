@extends("layouts.app")

@section('content')

    <!-- Main content -->
    <section class="content my-5 ">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row justify-content-center">

               <!-- col -->
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <a href="{{ url()->previous() }}" class="btn btn-link mr-5"> <i class="bi bi-arrow-left"></i> Back</a>

                    <div class="card shadow">
                        <div class="card-header">
                            <span class="h5">Rerods of <b class="ml-2">{{ __($user->name) }} ({{__($user->email)}})</b></span>
                            
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.user.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="key" value="{{ __($user->id) }}">

                                <div class="form-group mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror" value="{{ __($user->name) }}">

                                   @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror" value="{{ __($user->email) }}">
                                
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid  @enderror" value="{{ __($user->phone) }}">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="form-group mb-3">
                                            <label for="">Gender</label>
                                            <select name="gender" class="form-control @error('gender') is-invalid  @enderror" id="gender" required>
                                                <option value="" selected disabled>Select One</option>
                                                <option value="Male" {{ ($user->gender == 'Male') ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ ($user->gender == 'Female') ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ ($user->gender == 'Other') ? 'selected' : '' }}>Other</option>
                                            </select>

                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>                                        
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group mb-3">
                                            <label for="">Date Of Birth</label>
                                            <input type="date" name="dateOfBirth" class="form-control @error('dateOfBirth') is-invalid  @enderror" value="{{ __($user->date_of_birth) }}">
                                        
                                            @error('dateOfBirth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Location</label>
                                    <input type="text" name="location" class="form-control @error('location') is-invalid  @enderror" value="{{ __($user->location) }}">

                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
               <!-- col -->


            </div><!-- Row -->
        </div>
    </div>

@endsection