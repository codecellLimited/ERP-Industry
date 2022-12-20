@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employee Attendance List</h1>
        <a href="{{ route('attendance') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{route('attendance.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-md-4" style="color: black;">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{  date('Y-m-d', strtotime(today())) }}">
                    
                    <br>
                </div>
                
                <table class="table table-striped table-hover" style="color: black;">
                    <thead>
                        <div class="row">
                            <div class="col">
                                <th >ID</th>
                            </div>
                            <div class="col-10">
                                <th >Employee Name</th>
                            </div>
                            <div class="col">
                                <th >Attendance</th>
                            </div>
                        </div>


                        <tr>
                            
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employee as $key => $item)
                        
                        <input type="hidden" name="employee_id[]" value="{{$item->id_no}}">
                        <input type="hidden" name="name[]" value="{{$item->name}}">

                        <tr>
                            <td width="10%">{{$item->id_no}}</td>
                            <td width="80%">{{$item->name}}</td>
                            <td width="10%"> 
                                    <select name="attendance[]" class="form-control @error('attendance') is-invalid @enderror">
                                        <option value="0" selected>0</option>
                                        <option value="1" >1</option>
                                    </select>
                                
                            </td>
                            
                        </tr>
                        @empty
                        
                        @endforelse
                        
                    </tbody>
                    
                </table>
                <button class="btn btn-primary">Save</button>
            
            </form>
            
            
            
        </div>
    </div>







@endsection()