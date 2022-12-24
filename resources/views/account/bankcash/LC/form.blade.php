@extends('layouts.app')

   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a new LC</h1>
        <a href="{{ route('lc') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($lc))
                    <form action="{{ route('lc.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('lc.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($lc)
                        <input type="hidden" name="key" value="{{ $lc->id }}">
                        @endisset
                        
                        

                        <div class="form-group">
                            <div class="row">

                            <div class="col-md">
                                    <label for=""><b>PI Number</b></label>
                                    <input type="text" name="pi_number" 
                                        class="form-control @error('pi_number') is-invalid @enderror"
                                        @if(isset($lc))
                                        value="{{ $lc->pi_number}}"
                                        @else
                                        value="{{ old('pi_number') }}"
                                        @endif>

                                    @error('pi_number')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>PI Date</b></label>
                                    <input type="date" name="pi_date" 
                                        class="form-control @error('pi_date') is-invalid @enderror"
                                        @if(isset($lc))
                                        value="{{ date('Y-m-d', strtotime($lc->pi_date)) }}"
                                        @else
                                        value="{{ old('pi_date') }}"
                                        @endif>

                                    @error('pi_date')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b> PI/Bill Value</b></label>
                                    <input type="text" name="pi_value" class="form-control @error('pi_value') is-invalid @enderror"
                                    @if(isset($lc))
                                    value="{{$lc->pi_value}}"
                                    @else
                                    value="{{old('pi_value')}}"
                                    @endif>

                                    @error('pi_value')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>


                              
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">


                            <div class="col-md">
                                    <label for=""><b>Party name</b></label>
                                    <select name="party_id" id="" class="form-control @error('party_id') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\party::get() as $item)
                                        <option value="{{ $item->id }}"
                                        @if(isset($lc))
                                        {{($lc->party_id == $item->id) ? 'selected' : ''}}
                                        @else{{(old('party_id') ? 'selected' : '')}}
                                        @endif>
                                        
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('party_id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md">
                                    <label for=""><b>Received BDT</b></label>
                                    <input type="text" name="received_bdt" 
                                        class="form-control @error('received_bdt') is-invalid @enderror"
                                        @if(isset($lc))
                                        value="{{ $lc->received_bdt }}"
                                        @else
                                        value="{{ old('received_bdt') }}"
                                        @endif>

                                    @error('received_bdt')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md">
                                    <label for=""><b>Status BDT</b></label>
                                    <select name="status_bdt" id="" class="form-control @error('status_bdt') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>
                                        <option value="Accepted" @if(isset($lc)) @if($lc->status_bdt == 'Accepted'){{'selected'}} @endif @endif>Accepted</option>
                                        <option value="Collection"@if(isset($lc)) @if($lc->status_bdt == 'Collection'){{'selected'}} @endif @endif>Collection</option>
                                        <option value="Purchased"@if(isset($lc)) @if($lc->status_bdt == 'Purchased'){{'selected'}} @endif @endif>Purchased</option>
                                        <option value="Received"@if(isset($lc)) @if($lc->status_bdt == 'Received'){{'selected'}} @endif @endif>Received</option> 
                                        <option value="Refusal"@if(isset($lc)) @if($lc->status_bdt == 'Refusal'){{'selected'}} @endif @endif>Refusal</option> 
                                        <option value="Processing"@if(isset($lc)) @if($lc->status_bdt == 'Processing'){{'selected'}} @endif @endif>Processing</option> 
                                    
                                        @if(isset($lc))
                                        value="{{ $lc->religion}}"
                                        @else
                                        value="{{ old('religion') }}"
                                        @endif
                                    </select>

                                    @error('religion')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>LC Number</b></label>
                                    <input type="text" name="lc_number" 
                                        class="form-control @error('lc_number') is-invalid @enderror"
                                        @if(isset($lc))
                                        value="{{ $lc->lc_number }}"
                                        @else
                                        value="{{ old('lc_number') }}"
                                        @endif>

                                    @error('lc_number')
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
                                    <label for=""><b>LC Date</b></label>
                                    <input type="date" name="lc_date" 
                                        class="form-control @error('lc_date') is-invalid @enderror"
                                        @if(isset($lc))
                                        value="{{ date('Y-m-d',strtotime($lc->lc_date))}}"
                                        @else
                                        value="{{ old('lc_date') }}"
                                        @endif>

                                    @error('lc_date')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Bank Name</b></label>
                                    <select name="bank_id" id="" class="form-control @error('bank_id') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\bankadd::get() as $item)
                                        <option value="{{ $item->bank_name }}"
                                        @if(isset($lc))
                                        {{($lc->bank_id == $item->bank_name)? 'selected' : ''}}
                                        @else{{(old('bank_id') ? 'selected' : '')}}
                                        
                                        @endif>
                                        {{ \App\Models\bank::find($item->bank_name)->name }}</option>
                                        @endforeach
                                        
                                        @if(isset($lc))
                                        value="{{ $lc->bank_id}}"
                                        @else
                                        value="{{ old('bank_id') }}"
                                        @endif
                                    </select>

                                    @error('department')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                            <div class="col-md">
                                    <label for=""><b>Amd no: date</b></label>
                                    <input type="text" name="amd_no_date" 
                                        class="form-control @error('amd_no_date') is-invalid @enderror"
                                        @if(isset($lc))
                                        value="{{ $lc->amd_no_date}}"
                                        @else
                                        value="{{ old('amd_no_date') }}"
                                        @endif>

                                    @error('amd_no_date')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Document Submited Date</b></label>
                                    <input type="date" name="submitted_date" 
                                        class="form-control @error('submitted_date') is-invalid @enderror"
                                        @if(isset($lc))
                                        value="{{ date('Y-m-d',strtotime($lc->submitted_date))}}"
                                        @else
                                        value="{{ old('submitted_date') }}"
                                        @endif>

                                    @error('submitted_date')
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
                                    <label for=""><b>Maturity Date</b></label>
                                    <input type="date" name="maturity_date" 
                                        class="form-control @error('maturity_date') is-invalid @enderror"
                                        @if(isset($lc))
                                        value="{{ date('Y-m-d',strtotime($lc->maturity_date))}}"
                                        @else
                                        value="{{ old('maturity_date') }}"
                                        @endif>

                                    @error('maturity_date')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>LDBC Number</b></label>
                                    <input type="text" name="ldbc_number" 
                                        class="form-control @error('ldbc_number') is-invalid @enderror"
                                        @if(isset($lc))
                                        value="{{ $lc->ldbc_number}}"
                                        @else
                                        value="{{ old('ldbc_number') }}"
                                        @endif>

                                    @error('ldbc_number')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Purchase Amount BDT</b></label>
                                    <input type="text" name="purchase_amount" 
                                        class="form-control @error('purchase_amount') is-invalid @enderror"
                                        @if(isset($lc))
                                        value="{{ $lc->purchase_amount}}"
                                        @else
                                        value="{{ old('purchase_amount') }}"
                                        @endif>

                                    @error('purchase_amount')
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