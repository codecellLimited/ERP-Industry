@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Leave Application</h1>
        <a href="{{ route('leave') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row" style="color:black;">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($leave))
                    <form action="{{ route('leave.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('leave.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($leave)
                        <input type="hidden" name="key" value="{{ $leave->id }}">
                        @endisset

                            

                        <div class="form-group">
                            <div class="row">

                            <div class="col-md">
                                    <label for=""><b>Employee ID</b></label>
                                    <input type="text" name="employee_id" 
                                        class="form-control @error('employee_id') is-invalid @enderror"
                                        @if(isset($leave))
                                        value="{{ $leave->employee_id}}"
                                        @else
                                        value="{{ old('employee_id') }}"
                                        @endif>

                                    @error('employee_id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md">
                                    <label for=""><b>Employee Name</b></label>
                                    <input type="text" name="name" 
                                        class="form-control @error('name') is-invalid @enderror"
                                        @if(isset($leave))
                                        value="{{ $leave->name}}"
                                        @else
                                        value="{{ old('name') }}"
                                        @endif>

                                    @error('name')
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
                                    <label for=""><b>Leave Type</b></label>
                                    <select name="type" id="" class="form-control @error('type') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @if(isset($leave)) @if($leave->type == 1 ){{'selected'}} @endif @endif >Inform</option>
                                        <option value="2" @if(isset($leave)) @if($leave->type == 2 ){{'selected'}} @endif @endif >Application</option>
                                        <option value="3" @if(isset($leave)) @if($leave->type == 3 ){{'selected'}} @endif @endif >No Pay</option>
                                        <option value="4" @if(isset($leave)) @if($leave->type == 4 ){{'selected'}} @endif @endif >None</option>
                                        
                                    </select>

                                    @error('type')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Date From</b></label>
                                    <input type="date" name="date_from" 
                                        class="form-control @error('date_from') is-invalid @enderror"
                                        @if(isset($leave))
                                        value="{{ date('Y-m-d', strtotime($leave->date_from))}}"
                                        @else
                                        value="{{ old('date_from') }}"
                                        @endif>

                                    @error('date_from')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Upto Date</b></label>
                                    <input type="date" name="date_to" 
                                        class="form-control @error('date_to') is-invalid @enderror"
                                        @if(isset($leave))
                                        value="{{ date('Y-m-d', strtotime($leave->date_to)) }}"
                                        @else
                                        value="{{ old('date_to') }}"
                                        @endif>

                                    @error('date_to')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                

                                <div class="col-md">
                                    <label for=""><b>Total Days</b></label>
                                    <input type="text" name="total_days" 
                                        class="form-control @error('total_days') is-invalid @enderror"
                                        @if(isset($leave))
                                        value="{{ $leave->total_days}}"
                                        @else
                                        value="{{ old('total_days') }}"
                                        @endif>

                                    @error('total_days')
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
                                    <textarea type="text" name="remark" class="form-control @error('remark') is-invalid @enderror">@if(isset($leave)){{$leave->remark}}@else{{old('remark')}}@endif</textarea>

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