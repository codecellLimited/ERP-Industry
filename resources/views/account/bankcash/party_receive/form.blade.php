@extends('layouts.app')

   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Party Receive Balance</h1>
        <a href="{{ route('partyreceive') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row" style="color:black;">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($partyreceive))
                    <form action="{{ route('partyreceive.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('partyreceive.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($partyreceive)
                        <input type="hidden" name="key" value="{{ $partyreceive->id }}">
                        @endisset

                            

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md">
                                    <label for=""><b>Date</b></label>
                                    <input type="date" name="date" 
                                        class="form-control @error('date') is-invalid @enderror"
                                        @if(isset($partyreceive))
                                        value="{{ (empty($partyreceive->date)? date('Y-m-d',strtotime(today())) : date('Y-m-d',strtotime($partyreceive->date))) }}"
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
                                    <label for=""><b>Party Name</b></label>
                                    <select name="party" id="" class="form-control @error('party') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\party::get() as $item)
                                        <option value="{{ $item->id }}"
                                        @if(isset($partyreceive))
                                        {{($partyreceive->party == $item->id) ? 'selected':''}}
                                        @else{{(old('party')== $item->id) ? 'selected' : '' }}
                                        @endif>{{$item->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('party')
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
                                    <select name="method" id="" class="form-control @error('method') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @if(isset($partyreceive))@if($partyreceive->method == 1) {{'selected'}} @endif @endif>Hand Payment</option>
                                        <option value="2" @if(isset($partyreceive))@if($partyreceive->method == 2) {{'selected'}} @endif @endif >Bank Payment</option>
                                    </select>

                                    @error('method')
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
                                        @if(isset($partyreceive))
                                            {{($partyreceive->account == $item->id) ? 'selected': '' }}

                                            @else{{(old('account')== $item->id) ? 'selected' : ''}}

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
                                        @if(isset($partyreceive))
                                        value="{{ $partyreceive->amount}}"
                                        @else
                                        value="{{ old('amount') }}"
                                        @endif>

                                    @error('amount')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="row">

                                
                                 
                            </div>
                        </div>
                        

                        <div class="form-group">
                            
                                
                                <div class="cal-md">
                                    <label for=""><b>Remark/ Note</b></label>
                                    <textarea type="text" name="remark" class="form-control @error('remark') is-invalid @enderror">@if(isset($partyreceive)){{ $partyreceive->remark}}@else {{ old('remark') }}@endif</textarea>

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