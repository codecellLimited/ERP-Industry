@extends('layouts.app')

@section('page_title', 'Employee Salary')
   
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employee Salary List</h1>
        
    </div>


    <div class="row " style="color:black;">
        <div class="col-md-6">
            <div class="card shadow">

                <div class="card-body">

                    <div class="form-group">
                        <form action="{{route('salary.calculate')}}" method="GET" id="orderIdForm">
                           
                            
                            <div class="form-group">
                                <div class="row">

                                                            
                                    <div class="col-md">
                                        <label for=""><b>Search on month</b></label>
                                        <select name="searchmonth" class="form-control @error('searchmonth') is-invalid @enderror">
                                        <option value="0" selected>select a month</option>
                                        <option value="1" >Januart</option>
                                        <option value="2" >February</option>
                                        <option value="3" >March</option>
                                        <option value="4" >April</option>
                                        <option value="5" >May</option>
                                        <option value="6" >June</option>
                                        <option value="7" >July</option>
                                        <option value="8" >August</option>
                                        <option value="9" >September</option>
                                        <option value="10" >October</option>
                                        <option value="11" >November</option>
                                        <option value="12" >December</option>
                                    </select>

                                        @error('searchmonth')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                
                                    </div>
                                    
                                    <div class="col">
                                        <label for="search">  </label><br>
                                        <button class="btn btn-primary">Search</button>
                                    </div>

                                    
                                </div>
                            </div>
                                
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
   </div>
   <br><br>
    

<div class="card shadow">
    <div class="card-body table-responsive">

        <div class="d-sm-flex align-items-center justify-content-between mb-4" >
            <h1 class="h3 mb-0 text-gray-800" style="color:black;" ><b> Employee Salary List
                </b></h1>
            
        </div>

        <table class="table table-striped table-hover table-bordered data-table" style="color:black;">
        @section('page_title', 'Employee Salary')    
        <thead>
                <tr>
                    
                    <th width="10%">ID</th>
                    <th width="30%">Employee Name</th>
                    <th width="10%">Department</th>
                    <th width="10%">Salary</th>
                    
                </tr>

            </thead>


            <tbody>
                @forelse($salarys as $item)
                <tr>
                    <td>{{$item->id_no}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{\App\Models\department:: find($item->department_id)->name}}</td>
                    <td>{{$item->monthly_salary}}</td>
                </tr>
                @empty
                <div class="col-12 py-4 text-center">
                    <tr>
                        <td colspan='4' style="text-align: center;">No Record Found</td>
                    </tr> 
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


@endsection









