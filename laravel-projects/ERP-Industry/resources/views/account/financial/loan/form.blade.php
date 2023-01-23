@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New loan Application</h1>
        <a href="{{ route('loan') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row" style="color:black;">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($loan))
                    <form action="{{ route('loan.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('loan.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($loan)
                        <input type="hidden" name="key" value="{{ $loan->id }}">
                        @endisset

                            

                        <div class="form-group">
                            <div class="row">

                            <div class="col-md">
                                    <label for=""><b>Employee ID</b></label>
                                    <input type="text" name="employee_id" 
                                        class="form-control @error('employee_id') is-invalid @enderror"
                                        @if(isset($loan))
                                        value="{{ $loan->employee_id}}"
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
                                        @if(isset($loan))
                                        value="{{ $loan->name}}"
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
                                    <label for=""><b>Loan Apply Date</b></label>
                                    <input type="date" name="date" 
                                        class="form-control @error('date') is-invalid @enderror"
                                        @if(isset($loan))
                                        value="{{ date('Y-m-d',strtotime($loan->date))}}"
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
                                    <label for=""><b>Amount Of Loan</b></label>
                                    <input type="text" name="amount" 
                                        class="form-control @error('amount') is-invalid @enderror"
                                        @if(isset($loan))
                                        value="{{ $loan->amount}}"
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
                            
                                
                                <div class="cal-md">
                                    <label for=""><b>Purpose Note</b></label>
                                    <textarea type="text" name="note" class="form-control @error('note') is-invalid @enderror">@if(isset($loan)){{ $loan->note}}@else{{ old('note') }}@endif</textarea>
                                    @error('note')
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