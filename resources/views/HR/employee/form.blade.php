@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a new employee</h1>
        <a href="{{ route('employee') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>


   <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-body">
                    @if (isset($employee))
                    <form action="{{ route('employee.update') }}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf

                        @isset($employee)
                        <input type="hidden" name="key" value="{{ $employee->id }}">
                        @endisset
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for=""><b> Full Name</b></label>
                                    <input type="text" name="name" 
                                        class="form-control @error('name') is-invalid @enderror"
                                        @if(isset($employee))
                                        value="{{ $employee->name }}"
                                        @else
                                        value="{{ old('name') }}"
                                        @endif>

                                    @error('name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""> <b>ID No</b> </label>
                                    <input type="text" name="id_no" 
                                        class="form-control @error('id_no') is-invalid @enderror"
                                        @if(isset($employee))
                                        value="{{ $employee->id_no }}"
                                        @else
                                        value="{{ old('id_no') }}"
                                        @endif>

                                    @error('id_no')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Phone</b></label>
                                    <input type="text" name="phone" 
                                        class="form-control @error('phone') is-invalid @enderror"
                                        @if(isset($employee))
                                        value="{{ $employee->phone }}"
                                        @else
                                        value="{{ old('phone') }}"
                                        @endif>

                                    @error('phone')
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
                                    <label for=""><b>Department Name</b></label>
                                    <select name="department_id" id="" class="form-control @error('department_id') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\department::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($employee))
                                                {{($employee->department_id == $item->id) ? 'selected' : ''}}
                                            @else {{(old('department_id')== $item->id)?'selected': ''}} 
                                            @endif  >   
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    </select>

                                    @error('department_id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Designation</b></label>
                                    <select name="designation_id" id="" class="form-control @error('designation_id') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        @foreach(\App\Models\designation::get() as $item)
                                        <option value="{{ $item->id }}"
                                            @if(isset($employee))
                                                {{($employee->designation_id == $item->id)? 'selected':''}}
                                            @else{{(old('designation_id')?'selected':'')}}  
                                            @endif  >
                                        {{$item->name}}</option>
                                        @endforeach
                                        
                                    
                                    </select>

                                    @error('designation_id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md">
                                    <label for=""><b>Work Shift Name</b></label>
                                    <select name="work_shift_name" id="" class="form-control @error('work_shift_name') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @if(isset($employee))@if($employee->work_shift_name==1){{'selected'}}@endif @endif >Day</option>
                                        <option value="2" @if(isset($employee))@if($employee->work_shift_name==2){{'selected'}}@endif @endif >Night</option>
                                         
                                    </select>

                                    @error('work_shift_name')
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
                                    <label for=""><b>Email</b></label>
                                    <input type="text" name="email" 
                                        class="form-control @error('email') is-invalid @enderror"
                                        @if(isset($employee))
                                        value="{{ $employee->email }}"
                                        @else
                                        value="{{ old('email') }}"
                                        @endif>

                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Religion</b></label>
                                    <select name="religion" id="" class="form-control @error('religion') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @if(isset($employee))@if($employee->religion==1){{'selected'}}@endif @endif >Islam</option>
                                        <option value="2" @if(isset($employee))@if($employee->religion==2){{'selected'}}@endif @endif >Hindu</option>
                                        <option value="3" @if(isset($employee))@if($employee->religion==3){{'selected'}}@endif @endif >Buddho</option>
                                        <option value="4" @if(isset($employee))@if($employee->religion==4){{'selected'}}@endif @endif >Cristan</option> 
                                    
                                        @if(isset($employee))
                                        value="{{ $employee->religion}}"
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
                                    <label for=""><b>Daily salary</b></label>
                                    <input type="text" name="daily_salary" 
                                        class="form-control @error('daily_salary') is-invalid @enderror"
                                        @if(isset($employee))
                                        value="{{ $employee->daily_salary }}"
                                        @else
                                        value="{{ old('daily_salary') }}"
                                        @endif>

                                    @error('daily_salary')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md">
                                    <label for=""><b>Monthly Salary</b></label>
                                    <input type="text" name="monthly_salary" 
                                        class="form-control @error('monthly_salary') is-invalid @enderror"
                                        @if(isset($employee))
                                        value="{{ $employee->monthly_salary }}"
                                        @else
                                        value="{{ old('monthly_salary') }}"
                                        @endif>

                                    @error('monthly_salary')
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
                                    <label for=""><b>Gender</b></label>
                                    <select name="gender" id="" class="form-control @error('gender') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @if(isset($employee))@if($employee->gender==1){{'selected'}}@endif @endif >Male</option>
                                        <option value="2" @if(isset($employee))@if($employee->gender==2){{'selected'}}@endif @endif >Female</option>
                                        </select>

                                    @error('gender')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>NID No</b></label>
                                    <input type="text" name="nid_no" 
                                        class="form-control @error('nid_no') is-invalid @enderror"
                                        @if(isset($employee))
                                        value="{{ $employee->nid_no }}"
                                        @else
                                        value="{{ old('nid_no') }}"
                                        @endif>

                                    @error('nid_no')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>NID / Birth certificate</b></label>
                                    @if(isset($employee))
                                        <img src="{{asset($employee->nid_image)}}" alt="" width="150px" height="100px">
                                    @endif
                                    <input type="file" name="nid_image" 
                                        class="form-control @error('nid_image') is-invalid @enderror">

                                    @error('nid_image')
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
                                    <label for=""><b>Marital Status</b></label>
                                    <select name="marital_status" id="" class="form-control @error('marital_status') is-invalid @enderror" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @if(isset($employee))@if($employee->marital_status==1){{'selected'}}@endif @endif >Married</option>
                                        <option value="2" @if(isset($employee))@if($employee->marital_status==2){{'selected'}}@endif @endif >Unmarried</option>
                                    
                                    </select>

                                    @error('marital_status')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Date of Birth</b></label>
                                    <input type="date" name="date_of_birth" 
                                        class="form-control @error('date_of_birth') is-invalid @enderror"
                                        @if(isset($employee))
                                        value="{{ $employee->date_of_birth}}"
                                        @else
                                        value="{{ old('date_of_birth') }}"
                                        @endif>

                                    @error('date_of_birth')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Employee Image</b></label>
                                    @if(isset($employee))
                                        <img src="{{asset($employee->image)}}" alt="" width="100px" height="100px">
                                    @endif
                                    <input type="file" name="image" 
                                        class="form-control @error('image') is-invalid @enderror">

                                    @error('image')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class= "row">
                                    


                            
                            <div class="col-md">
                                    <label for=""><b>Date of Join</b></label>
                                    <input type="date" name="date_of_joining" 
                                        class="form-control @error('date_of_joining') is-invalid @enderror"
                                    @if(isset($employee))
                                        value="{{date('Y-m-d',strtotime($employee->date_of_joining)) }}"
                                    @else
                                        value="{{ old('date_of_joining') }}"
                                    @endif>

                                    @error('date_of_joining')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div> 

                                <div class="col-md">
                                    <label for=""><b>Employee Status</b></label>
                                    <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @if(isset($employee))@if($employee->status==1){{'selected'}}@endif @endif >Active</option>
                                        <option value="2" @if(isset($employee))@if($employee->status==2){{'selected'}}@endif @endif >Inactive</option>
                                    
                                        @if(isset($employee))
                                        value="{{ $employee->religion}}"
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
                                    <label for=""><b>Emergency Contact Name</b></label>
                                    <input type="text" name="emergency_name" 
                                        class="form-control @error('emergency_name') is-invalid @enderror"
                                        @if(isset($employee))
                                        value="{{ $employee->emergency_name}}"
                                        @else
                                        value="{{ old('emergency_name') }}"
                                        @endif>

                                    @error('emergency_name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md">
                                    <label for=""><b>Emergency Contact Number</b></label>
                                    <input type="text" name="emergency_contact" 
                                        class="form-control @error('emergency_contact') is-invalid @enderror"
                                        @if(isset($employee))
                                        value="{{ $employee->emergency_contact}}"
                                        @else
                                        value="{{ old('emergency_contact') }}"
                                        @endif>

                                    @error('emergency_contact')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                                
                            
                        </div>


                        <div class="form-group">
                            
                                
                                <div class="cal-md">
                                    <label for=""><b>Address</b></label>
                                    <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror">@if(isset($employee)){{$employee->address}}@else{{old('address')}}@endif</textarea>
                                    
                                    

                                    @error('address')
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