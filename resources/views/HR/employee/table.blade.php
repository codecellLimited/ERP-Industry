@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employees List</h1>
        <a href="{{ route('employee.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add a new employee
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover data-table" style="color:black;">
            @section('page_title', 'Employee List')
            
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">ID</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Depertment</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Phone</th>
                        
                        <th scope="col">Date of Joining</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employee as $key => $item)
                    <tr>
                        <th scope="row" >{{++$key}}</th>
                        <td><img src="{{ asset($item->image) }}" alt="" class="img-fluid rounded-circle m-auto d-block" style="width:50px;heigth:50px;"></td>
                        <td>{{$item->id_no}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{ \App\Models\department::find($item->department_id)->name }}</td>
                        <td>{{ \App\Models\designation::find($item->designation_id)->name }}</td>
                        <td>{{$item->phone}}</td>
                        
                        <td>{{$item->date_of_joining}}</td>
                        <td>
                            <a href="{{ route('employee.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('employee/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                        
                    </tr>
                    @empty
                    <div class="col-12 py-5 text-center">
                        <h4 class="text-muted"><b>No employee Yet</b></h4>
                    </div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection







@endsection()