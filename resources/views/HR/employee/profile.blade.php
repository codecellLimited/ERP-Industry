@extends('layouts.app')

@section('web-content')
@section('page_title', 'profile')
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employee Profile</h1>
        <a href="{{ route('employee') }}" class="btn btn-primary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

<!-- profile -->
    <div class="modal-content">

        <div class="modal-body" style="color:black;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        
                        <h4><b> Employee Name :</b> {{$employee->name}}</h4>
                        <h4><b> Employee Phone:</b> {{$employee->phone}}</h4>
                        <h4><b> Employee Email:</b> {{$employee->email}}</h4>
                        <h4><b> Company Name:</b> {{$employee->company}}</h4>
                    </div>
                <div class="col-md-4 ml-auto">
                    <img src="{{asset($parties->image)}}" alt="" sizes="width:60px;height:60px" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h3></h3>
                </div>
            </div>
            

        </div>
    </div>
  


@endsection