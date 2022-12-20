@extends('layouts.app')
@section('web-content')

<!-- page heading  -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="mb-0 text-gray-800 "> Quotation List</h1>
    <a href="{{route('quotation.create')}}" class="btn btn-primary shadow-sm">
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
                    <th>Date</th>
                    <th>Party Name</th>
                    <th>Total Bill</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($quotation as $key =>$item)
                <tr>
                    <th scope="row" >{{++$key}}</th>
                    <th>{{$item->quotation_date}}</th>
                    <td>{{Str::upper( \App\Models\party::find($item->party_id)->name)}}</td>
                    <td>{{$item->grand_total}}</td>
                    <td>@if($item->quotation_status == 1) Sending
                        @elseif($item->quotation_status == 2) Pending
                        @endif
                    </td>
                    <td class="text-nowrap">
                            <a href="{{ route('quotation.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('quotation/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button>
                    </td>
                </tr>
                @empty
                <div class="col-12 py-5 text-center">
                    <tr>
                        <td colspan="5" style="text-align: center;">No record found</td>
                    </tr>
                </div>
                @endforelse
            </tbody>
        </table>

    </div>

</div>

@endsection