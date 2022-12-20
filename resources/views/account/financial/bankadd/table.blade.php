@extends('layouts.app')

@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bank Accounts</h1>
        <a href="{{ route('bankadd.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add a Bank Account
        </a>
    </div>


   <div class="row">
        @forelse ($bankadd as $item)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body" style="color:black;">
                    <div class="my-3 text-center">
                        <h6><b>Bank Name: </b><br>{{ \App\Models\bank::find($item->id)->name }}</h6>
                        <h6><b>Branch: </b><br>{{ $item->branch}}</h6>
                        <h6><b>Account Holder: </b><br>{{ $item->account_holder}}</h6>
                        <h6><b>Account Type: </b><br>{{ $item->account_type}}</h6>
                        <h6><b>Account Number: </b><br>{{ $item->account_number}}</h6>

                        <a href="{{ route('bankadd.edit', $item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-pen"></i>
                        </a>

                        <button class="btn btn-sm btn-primary"
                        onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('bankadd/delete/{{$item->id}}'); }">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 py-5 text-center">
            <h4 class="text-muted"><b>No Supplier Yet</b></h4>
        </div>
        @endforelse
   </div>


@endsection