@extends('auth.layouts.app')

@section('content')
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        <div class="login-logo">
            <a href="javascript::"><b>{{ env('APP_NAME') }}</a>
        </div>

        <form action="{{ route('admin.password.email') }}" method="post">
            @csrf
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"" placeholder="Enter your register email" autofocus required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            

            <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Send Password Reset Link') }}
            </button>
            </div>
        </form>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection
