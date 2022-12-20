@extends('layouts.app')
@section('web-content')

<!-- page heading  -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0 text-gray-800 "> Sanction List</h1>
    <a href="{{route('sanction.create')}}" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        <span>Add new Record</span>
    </a>

</div>

<!-- page contain  -->
<div class="card shadow">
    <div class="card-body card-responsive">
        <table class="table table-striped table-hover" style="color:black;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sanction Date</th>
                    <th>Purpose</th>
                    <th>Amount</th>
                    <th>Remark</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                @forelse($sanction as $key =>$item)
                <tr>
                    <th scope="row" >{{++$key}}</th>
                    <th>{{$item->sanction_date}}</th>
                    <td>{{$item->purpose}}</td>
                    <td>{{$item->amount}}</td>
                    <td>{{$item->sanction_note}}</td>
                    <td class="text-nowrap">
                            <a href="{{ route('sanction.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('sanction/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button>
                    </td>
                </tr>
                @empty
                <div class="col-12 py-6 text-center">
                    <tr>
                        <td colspan="6" style="text-align: center;">No record found</td>
                    </tr>
                </div>
                @endforelse
            </tbody>
        </table>

    </div>

</div>

@endsection