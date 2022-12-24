@extends('layouts.app')

@section('page_title', 'Attendance')
   
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employee Attendance List</h1>
        <a href="{{ route('attendance.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add a new Record
        </a>
    </div>



    <div class="row" style="color:black;">
        <div class="col">
            <div class="card shadow">

                <div class="card-body">

                    <div class="form-group">
                        <form action="{{route('attendance')}}" method="GET" id="orderIdForm">
                            @csrf
                            
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md">
                                        <label for=""><b>Search On Date</b></label>
                                        <input type="date" name="searchdate" 
                                            class="form-control @error('searchdate') is-invalid @enderror">

                                        @error('searchdate')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                
                                    </div>
                                

                            
                                    <div class="col-md">
                                        <label for=""><b>Search On month</b></label>
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

                                    <div class="col-md">
                                        <label for=""><b>Search By ID</b></label>
                                            <input type="text" name="searchid" palceholder="ID"
                                            class="form-control @error('searchid') is-invalid @enderror">

                                            @error('searchid')
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





   @if(isset($attendanceday))

<div class="card shadow">
    <div class="card-body">
        <table class="table table-striped table-hover" style="color:black;">
            <thead>
                <tr>
                    
                    <th width="10%">ID</th>
                    <th width="80%">Employee Name</th>
                    <th width="10%">Attendance</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($attendanceday as $key => $item)
                <tr>
                    <td>{{$item->employee_id}}</td>
                    <td>{{$item->name}}</td>
                    
                    <td>  @if( $item->attendance == 1) 
                            <i class="fa fa-check" style="font-size:16px;color:green"></i>
                            @elseif( $item->attendance == 0) 
                            <i class="fa fa-close" style="font-size:16px;color:red"></i>
                            @else 
                            @endif </td>
                    
                    
                </tr>
                @empty
                <div class="col-12 text-center">
                    <tr>
                        <td colspan="3" style="text-align: center;">Select a Valid Date.</td>
                    </tr>
                </div>
                @endforelse
                
            </tbody>
        </table>
    </div>
</div>



@endif


@if(isset($attendancemonth))

<div class="card shadow">
    <div class="card-body table-responsive ">

        <div class="d-sm-flex align-items-center justify-content-between mb-4" >
            <h1 class="h3 mb-0 text-gray-800" style="color:black;" ><b> Employee Attendance List for 
                {{ $monthName = \DateTime::createFromFormat('!m', $searchmonth)->format('F') }}
                </b></h1>
            
        </div>


        <table class="table table-striped table-hover table-bordered data-table" style="color:black;">
        @section('page_title', 'Employee Attendance List for '.$monthName)
            <thead>
                <tr>
                    
                    <th width="10%">ID</th>
                    <th width="30%">Employee Name</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                    <th>21</th>
                    <th>22</th>
                    <th>23</th>
                    <th>24</th>
                    <th>25</th>
                    <th>26</th>
                    <th>27</th>
                    <th>28</th>
                    <th>29</th>
                    <th>30</th>
                    <th>31</th>
                    
                </tr>
            </thead>
            
            <tbody>

                @if(isset($searchid))
                    @php 
                        $checkValue= \App\models\attendance::wheremonth('date',$searchmonth) ->first()->attendance  ?? ' '
                    @endphp
                    @if($checkValue >= 1 && $checkValue <= 12)
                        <tr>
                            <td>{{$searchid}}</td>
                            <td width="30%">{{\App\models\employee::where('id_no',$searchid )->first()->name}}</td>
                            @for($day=1;$day<=31;$day++)
                            @php 
                                $checkValue= \App\models\attendance::where('employee_id',$searchid) 
                                                            ->whereday('date',$day)
                                                            ->wheremonth('date',$searchmonth)
                                                            ->first()->attendance  ?? ' '
                            @endphp
                            <td>  @if( $checkValue == 1) 
                                    <i class="fa fa-check" style="font-size:16px;color:green"></i>
                                    @elseif( $checkValue == 0) 
                                    <i class="fa fa-close" style="font-size:16px;color:red"></i>
                                    @else 
                                    @endif </td>

                            @endfor
                            
                            
                        </tr>
                    
                    @else 
                        <div class="col-12 text-center">
                            <tr>
                                <td colspan="33" style="text-align: center;">Select a Month And Id.</td>
                            </tr>
                        </div>

                    
                    @endif
   
                


                @else

                        @forelse($employee as $key => $item)
                        <tr>
                            <td>{{$item->id_no}}</td>
                            <td width="30%">{{$item->name}}</td>
                            @for($day=1;$day<=31;$day++)
                            @php 
                                $checkValue= \App\models\attendance::where('employee_id',$item->id_no) 
                                                            ->whereday('date',$day)
                                                            ->wheremonth('date',$searchmonth)
                                                            ->first()->attendance  ?? ' '
                            @endphp
                            <td>  @if( $checkValue == 1) 
                                    <i class="fa fa-check" style="font-size:16px;color:green"></i>
                                    @elseif( $checkValue == 0) 
                                    <i class="fa fa-close" style="font-size:16px;color:red"></i>
                                    @else 
                                    @endif </td>

                            @endfor
                            
                            
                        </tr>
                        @empty
                        <div class="col-12 text-center">
                            <tr>
                                <td colspan="4" style="text-align: center;">Select a Date First.</td>
                            </tr>
                        </div>
                        @endforelse
            
                    



                @endif

                
            </tbody>
        </table>
    </div>
</div>



@endif





@endsection()