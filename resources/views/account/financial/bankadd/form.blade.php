@extends('layouts.app')


   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a New Bank Account</h1>
        <a href="{{ route('bankadd') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($bankadd))
                    <form action="{{ route('bankadd.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('bankadd.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($bankadd)
                        <input type="hidden" name="key" value="{{ $bankadd->id }}">
                        @endisset

                            

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for=""><b>Bank Name</b></label>
                                    <select name="bank_name" id="" class="form-control @error('bank_name') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\Bank::get() as $item)
                                        <option value="{{ $item->id }}"
                                        @if(isset($bankadd))
                                        {{ ($bankadd->bank_name == $item->id) ? 'selected' : ''}}
                                        @else{{(old('bank_name') ? 'selected' : '')}}
                                        @endif>
                                        
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    
                                        @if(isset($bankadd))
                                        value="{{ $bankadd->bank_name}}"
                                        @else
                                        value="{{ old('bank_name') }}"
                                        @endif
                                    </select>

                                    @error('bank_name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for="">Branch</label>
                                    <input type="text" name="branch" 
                                        class="form-control @error('branch') is-invalid @enderror"
                                        @if(isset($bankadd))
                                        value="{{ $bankadd->branch}}"
                                        @else
                                        value="{{ old('branch') }}"
                                        @endif>

                                    @error('branch')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for="">Account Holder Name</label>
                                    <input type="tel" name="account_holder" 
                                        class="form-control @error('account_holder') is-invalid @enderror"
                                        @if(isset($bankadd))
                                        value="{{ $bankadd->account_holder}}"
                                        @else
                                        value="{{ old('account_holder') }}"
                                        @endif>

                                    @error('account_holder')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for="">Account Number</label>
                                    <input type="text" name="account_number" 
                                        class="form-control @error('account_number') is-invalid @enderror"
                                        @if(isset($bankadd))
                                        value="{{ $bankadd->account_number }}"
                                        @else
                                        value="{{ old('account_number') }}"
                                        @endif>

                                    @error('account_number')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Account Type</b></label>
                                    <select name="account_type" id="" class="form-control @error('account_type') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="Business" @if(isset($bankadd)) @if($bankadd -> account_type == 'Business'){{'selected'}} @endif @endif>Business</option>
                                        <option value="saving"@if(isset($bankadd)) @if($bankadd -> account_type == 'saving'){{'selected'}} @endif @endif >saving</option>
                                        <option value="Current" @if(isset($bankadd)) @if($bankadd -> account_type == 'Current'){{'selected'}} @endif @endif >Current</option>
                                        <option value="Foreign" @if(isset($bankadd)) @if($bankadd -> account_type == 'Foreign'){{'selected'}} @endif @endif>Foreign</option>
                                        <option value="Expoters FC" @if(isset($bankadd)) @if($bankadd -> account_type == 'Expoters FC'){{'selected'}} @endif @endif >Expoters FC</option>
                                        
                                    
                                        @if(isset($employee))
                                        value="{{ $employee->account_type}}"
                                        @else
                                        value="{{ old('account_type') }}"
                                        @endif
                                    </select>

                                    @error('account_type')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                
                                <div class="col-md">
                                    <label for="">Routing Number</label>
                                    <input type="text" name="routing" 
                                        class="form-control @error('routing') is-invalid @enderror"
                                        @if(isset($bankadd))
                                        value="{{ $bankadd->routing}}"
                                        @else
                                        value="{{ old('routing') }}"
                                        @endif>

                                    @error('routing')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for="">Swift</label>
                                    <input type="text" name="swift" 
                                        class="form-control @error('swift') is-invalid @enderror"
                                        @if(isset($bankadd))
                                        value="{{ $bankadd->swift}}"
                                        @else
                                        value="{{ old('swift') }}"
                                        @endif>

                                    @error('swift')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                            </div>
                        </div>


                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
   </div>


@endsection