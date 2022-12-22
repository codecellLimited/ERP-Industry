@extends('layouts.app')

@section('web-content')

<!-- Page Heading -->
{{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Hello {{ auth()->user()->name }}</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div> --}}

<div class="row">
    
    <div class=".col-lg-3 col-md-3 col-sm-6">
        <div class="card" style="background-color:blue;border-radius:20px;">
            <div class="card-body">
                <div class="my-3 text-center" style="color:white;">
                    <h4><b>Total Supplier</b></h4>
                    
                    <h4>{{\App\Models\supplier::count();}}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class=".col-lg-3 col-md-3 col-sm-6">
        <div class="card" style="background-color:#7B9DE2;border-radius:20px;">
            <div class="card-body">
                <div class="my-3 text-center" style="color:white;">
                    <h4><b>Total Party</b></h4>
                    
                    <h4>{{\App\Models\party::count();}}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class=".col-lg-3 col-md-3 col-sm-6">
        <div class="card" style="background-color:#F2A510;border-radius:20px;">
            <div class="card-body">
                <div class="my-3 text-center" style="color:white;">
                    <h4><b>Total Employee</b></h4>
                    
                    <h4>{{\App\Models\employee::where('status', true)->count();}}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class=".col-lg-3 col-md-3 col-sm-6">
        <div class="card" style="background-color:green;border-radius:20px;">
            <div class="card-body">
                <div class="my-3 text-center" style="color:white;">
                    <h4><b>Total Products</b></h4>
                    
                    <h4>{{\App\Models\product::count();}}</h4>
                </div>
            </div>
        </div>
    </div>

</div>

<br>

<div class="row">
    
    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="card" style="background-color:#FD0202; border-radius:20px;">
            <div class="card-body">
                <div class="my-3 text-center" style="color:white;">
                    <h4><b>Total User</b></h4>
                    <h4>{{\App\Models\User:: count();}}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="card" style="background-color:#075326;border-radius:20px;">
            <div class="card-body">
                <div class="my-3 text-center" style="color:white;">
                    <h4><b>Total Materials</b></h4>
                    <h4>{{\App\Models\material::count();}}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="card" style="background-color:#2749B8;border-radius:20px;">
            <div class="card-body">
                <div class="my-3 text-center" style="color:white;">
                
                    <h4><b>Total Order</b></h4>
                    
                    <h4>{{\App\Models\order::count();}}</h4>
                </div>
            </div>
        </div>
    </div>

    

    <div class=".col-lg-3 col-md-3 col-sm-6">
        <div class="card" style="background-color:#228C22;border-radius:20px;">
            <div class="card-body">
                <div class="my-3 text-center" style="color:white;">
                
                    <h4><b>Total Income</b></h4>
                    
                    <h4>{{App\Models\partyreceive::where('status', true)->sum('amount')}}</h4>
                </div>
            </div>
        </div>
    </div>


</div>

<br>


<div class="row">
    
    <div class=".col-lg-3 col-md-3 col-sm-6">
        <div class="card" style="background-color:green;border-radius:20px;">
            <div class="card-body">
                <div class="my-3 text-center" style="color:white;">
                
                    <h4><b>Todays Employee Attendance</b></h4>
                    <?php $today= new DateTime('today');?>
                    <h4>{{\App\Models\attendance::where('status', true)->wheredate('date', $today)->where('attendance', 1)->orderBy('employee_id', 'asc')->count();}}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class=".col-lg-3 col-md-3 col-sm-6">
        <div class="card" style="background-color:#F2A510;border-radius:20px;">
            <div class="card-body">
                <div class="my-3 text-center" style="color:white;">
               
                    <h4><b>This month Expense</b></h4>
                    
                    <h4>{{\App\Models\expense::where('status', true)->whereMonth('created_at',now()->month)->sum('amount')}}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class=".col-lg-3 col-md-3 col-sm-6">
        <div class="card" style="background-color:blue;border-radius:20px;">
            <div class="card-body">
                <div class="my-3 text-center" style="color:white;">
                    <h4><b>Total Employee Salary (Monthly)</b></h4>
                    
                    <h4>{{\App\Models\employee::where('status', true)->sum('monthly_salary')}}</h4>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="card" style="background-color:#D43939; border-radius:20px;">
            <div class="card-body">
                <div class="my-3 text-center" style="color:white;">
                
                    <h4><b>Total Completed Order</b></h4>
                    <h4>{{\App\Models\order::where('status', 2)->count();}}</h4>
                </div>
            </div>
        </div>
    </div>

    
</div>

@endsection
