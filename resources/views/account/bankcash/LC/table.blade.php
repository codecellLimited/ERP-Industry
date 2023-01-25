@extends('layouts.app')

@section('page_title', 'LC')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">LC List</h1>
        <a href="{{ route('lc.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add a new LC
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover data-table" style="color:black;">
            @section('page_title', 'LC list')
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">PI Number</th>
                        <th scope="col">PI/Bill Date</th>
                        <th scope="col">PI/Bill Value</th>
                        <th scope="col">Party Name</th>
                        <th scope="col">Received BDT</th>
                        <th scope="col">Status</th>
                        <th scope="col">LC Number</th>
                        <th scope="col">LC Date</th>
                        <th scope="col">Bank Name</th>
                        <th scope="col">Amd no & Date</th>
                        <th scope="col">Document Submited Date</th>
                        <th scope="col">Maturity Date</th>
                        <th scope="col">LDBC Number</th>
                        <th scope="col">Purchase Amount BDT</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lc as $key => $item)
                    <tr>
                        <th scope="row" >{{++$key}}</th>
                        <td>{{$item->pi_number}}</td>
                        <td>{{$item->pi_date}}</td>
                        <td>{{$item->pi_value}}</td>
                        <td>{{ \App\Models\Party::find($item->party_id)->name }}</td>
                        <td>{{$item->received_bdt}}</td>
                        <td>{{$item->status_bdt}}</td>
                        <td>{{$item->lc_number}}</td>
                        <td>{{$item->lc_date}}</td>
                        <td>{{ \App\Models\Bank::find($item->bank_id)->name }}</td>
                        
                        <td>{{$item->amd_no_date}}</td>
                        <td>{{$item->submitted_date}}</td>
                        <td>{{$item->maturity_date}}</td>
                        <td>{{$item->ldbc_number}}</td>
                        <td>{{$item->purchase_amount}}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('lc.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button class="btn btn-sm btn-primary"
                                onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('lc/delete/{{$item->id}}'); }">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                        
                    </tr>
                    @empty
                    <div class="col-12 py-5 text-center">
                        <h4 class="text-muted"><b>No record found</b></h4>
                    </div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>







@endsection()