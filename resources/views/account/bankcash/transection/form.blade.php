@extends('layouts.app')

@section('page_title', 'Transection Form')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Transection</h1>
        <a href="{{ route('transection') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row" style="color:black;">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($transection))
                    <form action="{{ route('transection.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('transection.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($transection)
                        <input type="hidden" name="key" value="{{ $transection->id }}">
                        @endisset

                            

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md">
                                    <label for=""><b>Date</b></label>
                                    <input type="date" name="date" 
                                        class="form-control @error('date') is-invalid @enderror"
                                        @if(isset($transection))
                                        value="{{ (empty($transection->date) ? date('Y-m-d',strtotime(today())) : date('Y-m-d', strtotime($transection->date))) }}"
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
                                    <label for=""><b>Transection For</b></label>
                                    <select name="transection_for" id="" onchange="toggoldiv(this.value)" class="form-control @error('transection_for') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @if(isset($transection)) @if($transection->transection_for == 1) {{'selected'}} @endif @endif >Receive Party Payment</option>
                                        <option value="2" @if(isset($transection)) @if($transection->transection_for == 2) {{'selected'}} @endif @endif >Pay Supplier Payment</option>
                                    </select>

                                    @error('transection_for')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md" style="display:none;" id="party_show">
                                    <label for=""><b>Party Name</b></label>
                                    <select name="party_id"  class="form-control @error('party_id') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\party::get() as $item)
                                        <option value="{{ $item->id }}"
                                        @if(isset($transection))
                                        {{($transection->party_id == $item->id) ? 'selected':''}}
                                        @else{{(old('party_id')== $item->id) ? 'selected' : '' }}
                                        @endif>{{$item->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('party_id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md" style="display:none;" id="supplier_show" >
                                    <label for=""><b>Supplier Name</b></label>
                                    <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\supplier::get() as $item)
                                        <option value="{{ $item->id }}"
                                        @if(isset($transection))
                                        {{($transection->supplier_id == $item->id) ? 'selected':''}}
                                        
                                        @else{{(old('supplier_id')== $item->id) ? 'selected' : '' }}
                                        
                                        @endif>
                                        
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('supplier_id')
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
                                    <label for=""><b>Order No</b></label>
                                    <input type="text" name="order" 
                                        class="form-control @error('order') is-invalid @enderror"
                                        @if(isset($transection))
                                        value="{{ $transection->order}}"
                                        @else
                                        value="{{ old('order') }}"
                                        @endif>

                                    @error('order')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Total Due</b></label>
                                    <input type="text" name="due" 
                                        class="form-control @error('due') is-invalid @enderror"
                                        @if(isset($transection))
                                        value="{{ $transection->due}}"
                                        @else
                                        value="{{ old('due') }}"
                                        @endif readonly>

                                    @error('due')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md" >
                                    <label for=""><b>Payment Method</b></label>
                                    <select name="payment_method" id="" onchange="transection(this.value)" class="form-control @error('payment_method') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @if(isset($transection)) @if($transection->payment_method == 1) {{'selected'}} @endif @endif >Hand cash</option>
                                        <option value="2" @if(isset($transection)) @if($transection->payment_method == 2) {{'selected'}} @endif @endif >Bank Payment</option>
                                    </select>

                                    @error('payment_method')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md" style="display:none;" id="account">
                                    <label for=""><b>Account</b></label>
                                    <select name="account" id="" class="form-control @error('account') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\bankadd::get() as $item)
                                        <option value="{{ $item->id }}" 
                                            @if(isset($transection))
                                            {{($transection->account == $item->id)? 'selected':'' }}
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

                                <div class="col-md" style="display:none;" id="bearer">
                                    <label for=""><b>Bearer Name</b></label>
                                    <input type="text" name="bearer" 
                                        class="form-control @error('bearer') is-invalid @enderror"
                                        @if(isset($transection))
                                        value="{{ $transection->bearer}}"
                                        @else
                                        value="{{ old('bearer') }}"
                                        @endif>

                                    @error('bearer')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Amount</b></label>
                                    <input type="text" name="amount" 
                                        class="form-control @error('amount') is-invalid @enderror"
                                        @if(isset($transection))
                                        value="{{ $transection->amount}}"
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
                                    <textarea type="text" name="remark" class="form-control @error('remark') is-invalid @enderror">@if(isset($transection)){{ $transection->remark}}@else {{ old('remark') }}@endif</textarea>

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

@push('js')
    <script>
        function toggoldiv(value){
            
            const party_show = document.getElementById("party_show");
            const supplier_show = document.getElementById("supplier_show");

            if(value == '1'){
                party_show.style.display = "block";
                supplier_show.style.display = "none";
            }  
            else if(value == '2'){
                
                party_show.style.display = "none";
                supplier_show.style.display = "block";
            }
        }

        function transection(value){
            const bearer = document.getElementById("bearer");
            const account = document.getElementById("account");

            if(value == '1'){
                bearer.style.display = "block";
                account.style.display = "none";
            }  
            else if(value == '2'){
                
                bearer.style.display = "none";
                account.style.display = "block";
            }
        }
    </script>

@endpush