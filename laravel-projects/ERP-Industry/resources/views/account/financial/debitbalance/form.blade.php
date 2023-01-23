@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Debit Balance</h1>
        <a href="{{ route('debit') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row" style="color:black;">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($debit))
                    <form action="{{ route('debit.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('debit.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($debit)
                        <input type="hidden" name="key" value="{{ $debit->id }}">
                        @endisset

                            

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md">
                                    <label for=""><b>Date</b></label>
                                    <input type="date" name="date" 
                                        class="form-control @error('date') is-invalid @enderror"
                                        @if(isset($debit))
                                        value="{{ date('Y-m-d',strtotime($debit->date))}}"
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
                                    <label for=""><b>Account Number</b></label>
                                    <select name="account" id="" class="form-control @error('account') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\Bankadd::get() as $item)
                                        <option value="{{ $item->id }}"
                                        @if(isset($debit))
                                        {{($debit->account == $item->id)? 'selected' : '' }}
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
                                        @if(isset($debit))
                                        value="{{ $debit->amount}}"
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
                                <div class="col-md">
                                    <label for=""><b>Credit From</b></label>
                                    <input type="text" name="credit_from" 
                                        class="form-control @error('credit_from') is-invalid @enderror"
                                        @if(isset($debit))
                                        value="{{ $debit->credit_from}}"
                                        @else
                                        value="{{ old('credit_from') }}"
                                        @endif>

                                    @error('credit_from')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Reveived By</b></label>
                                    <select name="received" id="" class="form-control @error('received') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\Designation::get() as $item)
                                        <option value="{{ $item->id }}"
                                        @if(isset($debit))
                                        {{($debit->received == $item->id)? 'selected' : '' }}
                                        @else {{(old('received') ? 'selected' : '')}}
                                        @endif>
                                        
                                        {{$item->name}}</option>
                                        @endforeach

                                        
                                    
                                    </select>

                                    @error('received')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md">
                                    <label for=""><b>Image Attachment</b></label>
                                    <input type="file" name="image" 
                                        class="form-control @error('image') is-invalid @enderror"
                                        @if(isset($debit))
                                        value="{{ $debit->image}}"
                                        @else
                                        value="{{ old('image') }}"
                                        @endif>

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
                                    <textarea type="text" name="remark" class="form-control @error('remark') is-invalid @enderror">@if(isset($debit)){{ $debit->remark}}@else {{ old('remark') }}@endif</textarea>

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