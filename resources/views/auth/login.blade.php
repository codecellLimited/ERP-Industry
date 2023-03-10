@extends('layouts.auth')

@section('web-content')

<!-- Outer Row -->
        <div class="row justify-content-center align-items-center p-0 m-0 min-vh-100">
            
            <div class="col-xl-4 col-lg-5 col-md-9">
                
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>

                            @if (session()->has('status'))
                                <div class="alert alert-danger">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="user" action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <select name="role" id="" class="form-control @error('role') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1">Owner</option>
                                        <option value="2">GM</option>
                                        <option value="3">Sales</option>
                                        <option value="4">HR</option>
                                        <option value="5">Account</option>
                                        
                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                        id="exampleInputPassword" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                           {{-- <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div> --}}
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection
