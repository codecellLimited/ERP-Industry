@extends('layouts.app')

@section('web-content')
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a new Record</h1>
        <a href="{{ route('sanction') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body card-responsive">
                    @if (isset($sanction))
                    <form action="{{ route('sanction.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('sanction.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($sanction)
                        <input type="hidden" name="key" value="{{ $sanction->id }}">
                        @endisset
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md">
                                    <label for=""><b> Sanction Date *</b></label>
                                    <input type="date" name="sanction_date" 
                                        class="form-control @error('sanction_date') is-invalid @enderror"
                                        @if(isset($sanction))
                                        value="{{ date('Y-m-d', strtotime($sanction->sanction_date )) }}"
                                        @else
                                        value="{{ old('sanction_date') }}"
                                        @endif>

                                    @error('sanction_date')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Purpose *</b></label>
                                    <input type="text" name="purpose" 
                                        class="form-control @error('purpose') is-invalid @enderror"
                                        @if(isset($sanction))
                                        value="{{ $sanction->purpose }}"
                                        @else
                                        value="{{ old('purpose') }}"
                                        @endif>

                                    @error('purpose')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Amount *</b></label>
                                    <input type="text" name="amount" 
                                        class="form-control @error('amount') is-invalid @enderror"
                                        @if(isset($sanction))
                                        value="{{ $sanction->amount }}"
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
                            <label for=""><b>Sanction Note</b></label>
                            <textarea type="text" name="sanction_note" class="form-control @error('sanction_note') is-invalid @enderror">@if(isset($sanction)){{ $sanction->sanction_note}}
                             @else {{ old('sanction_note') }}@endif</textarea>

                            @error('sanction_note')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
   </div>


@endsection

