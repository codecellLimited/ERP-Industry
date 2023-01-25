@extends('layouts.app')

   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New expense Balance</h1>
        <a href="{{ route('expense') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row" style="color:black;">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($expense))
                    <form action="{{ route('expense.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('expense.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($expense)
                        <input type="hidden" name="key" value="{{ $expense->id }}">
                        @endisset

                            

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md">
                                    <label for=""><b>Date</b></label>
                                    <input type="date" name="datee" 
                                        class="form-control @error('datee') is-invalid @enderror"
                                        @if(isset($expense))
                                        value="{{ (empty($expense->datee) ? date('Y-m-d',strtotime(today())) : date('Y-m-d', strtotime($expense->datee))) }}"
                                        @else
                                        value="{{ old('datee') }}"
                                        @endif>

                                    @error('datee')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Purpose</b></label>
                                    <input type="text" name="purpose" 
                                        class="form-control @error('purpose') is-invalid @enderror"
                                        @if(isset($expense))
                                        value="{{ $expense->purpose}}"
                                        @else
                                        value="{{ old('purpose') }}"
                                        @endif>

                                    @error('purpose')
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
                                    <select name="payment_method" id="" class="form-control @error('payment_method') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @if(isset($expense)) @if($expense->payment_method == 1) {{'selected'}} @endif @endif >Hand Payment</option>
                                        <option value="2" @if(isset($expense)) @if($expense->payment_method == 2) {{'selected'}} @endif @endif >Bank Payment</option>
                                    </select>

                                    @error('payment_method')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md">
                                    <label for=""><b>Account</b></label>
                                    <select name="account" id="" class="form-control @error('account') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\Bankadd::get() as $item)
                                        <option value="{{ $item->id }}" 
                                            @if(isset($expense))
                                            {{($expense->account == $item->id)? 'selected':'' }}
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
                                        @if(isset($expense))
                                        value="{{ $expense->amount}}"
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
                                    <textarea type="text" name="remark" class="form-control @error('remark') is-invalid @enderror">@if(isset($expense)){{ $expense->remark}}@else {{ old('remark') }}@endif</textarea>

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