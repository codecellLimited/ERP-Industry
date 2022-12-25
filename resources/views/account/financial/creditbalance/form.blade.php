@extends('layouts.app')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Credit Balance</h1>
        <a href="{{ route('credit') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row" style="color:black;">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($credit))
                    <form action="{{ route('credit.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('credit.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($credit)
                        <input type="hidden" name="key" value="{{ $credit->id }}">
                        @endisset

                            

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md">
                                    <label for=""><b>Date</b></label>
                                    <input type="date" name="date" 
                                        class="form-control @error('date') is-invalid @enderror"
                                        @if(isset($credit))
                                        value="{{ date('Y-m-d',strtotime($credit->date))}}"
                                        @else
                                        value="{{ old('date') }}"
                                        @endif>

                                    @error('date')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Pay Via</b></label>
                                    <select name="pay_via" id="" class="form-control @error('pay_via') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\designation::get() as $item)
                                        <option value="{{ $item->id }}"
                                        @if(isset($credit))
                                        {{($credit->pay_via == $item->id)? 'selected' : '' }}
                                        @else {{(old('pay_via') ? 'selected' : '')}}
                                        @endif>
                                        
                                        {{$item->name}}</option>
                                        @endforeach

                                    </select>

                                    @error('pay_via')
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
                                    <label for=""><b>Payment Method</b></label>
                                    <select name="debit_by" id="" class="form-control @error('debit_by') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="Hand Cash" @if(isset($credit)) @if($credit->debit_by == 'Hand Cash') {{'selected'}} @endif @endif >Hand Cash</option>
                                        <option value="Bank" @if(isset($credit)) @if($credit->debit_by == 'Bank') {{'selected'}} @endif @endif >Bank</option>
                                        
                                        
                                    
                                        @if(isset($credit))
                                        value="{{ $credit->debit_by}}"
                                        @else
                                        value="{{ old('debit_by') }}"
                                        @endif
                                    </select>

                                    @error('debit_by')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                                <div class="col-md">
                                    <label for=""><b>Account</b></label>
                                    <select name="account" id="" class="form-control @error('account') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\bankadd::get() as $item)
                                        <option value="{{ $item->id }}"
                                        @if(isset($credit))
                                        {{($credit->account == $item->id)? 'selected' : '' }}
                                        @else {{(old('account') ? 'selected' : '')}}
                                        @endif>
                                        
                                        {{$item->account_number}}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('account')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Amount</b></label>
                                    <input type="text" name="amount" 
                                        class="form-control @error('amount') is-invalid @enderror"
                                        @if(isset($credit))
                                        value="{{ $credit->amount}}"
                                        @else
                                        value="{{ old('amount') }}"
                                        @endif>

                                    @error('amount')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                                <div class="col-md">
                                    <label for=""><b>Image Attachment</b></label>
                                    @if(isset($credit))
                                        <img src="{{asset($credit->image)}}" alt="" width="200px" height="100px">
                                    @endif
                                    <input type="file" name="image" 
                                        class="form-control @error('image') is-invalid @enderror">

                                    @error('image')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>
                        </div>

                        
                        

                        <div class="form-group">
                            
                                
                                <div class="cal-md">
                                    <label for=""><b>Remark/ Note</b></label>
                                    <textarea type="text" name="remark" class="form-control @error('remark') is-invalid @enderror">@if(isset($credit)){{ $credit->remark}}@else {{ old('remark') }}@endif</textarea>

                                    @error('remark')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                            
                        </div>


                        


                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
   </div>


@endsection