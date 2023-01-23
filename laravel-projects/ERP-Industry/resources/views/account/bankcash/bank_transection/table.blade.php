@extends('layouts.app')

@section('page_title', 'Bank Transection')
   
@section('web-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bank Transection List</h1>
        
    </div>

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover data-table" style="color:black;">
            @section('page_title', 'Bank Trancetion list')
                <thead>
                    <tr style="color:black;">
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Account No</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $key=0;
                    ?>
                    @forelse($expense as $item)
                        @if($item->payment_method == 2)
                            <tr style="color:black;">
                                <th scope="row" >{{++$key}}</th>
                                <td>{{$item->datee}}</td>
                                <td>{{$item->purpose}}</td>
                                <td>{{$item->amount}}</td>
                                <td>{{ \App\Models\Bankadd::find($item->account)->account_number}}</td>
                                <td>{{$item->remark}}</td>
                                <td class="text-nowrap">

                                    <button class="btn btn-sm btn-primary"
                                        onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('expense/delete/{{$item->id}}'); }">
                                        <i class="fas fa-trash"></i>
                                    </button> 

                                </td>
                                
                            </tr>
                        @endif
                    
                    @empty
                    
                    @endforelse

                    @forelse($partyreceive as $item)
                        @if($item->method == 2)
                            <tr style="color:black;">
                                <th scope="row" >{{++$key}}</th>
                                <td>{{$item->date}}</td>
                                <td>Party Receive ({{\App\Models\Party::find($item->party)->company}})</td>
                                <td>{{$item->amount}}</td>
                                <td>{{ \App\Models\Bankadd::find($item->account)->account_number}}</td>
                                <td>{{$item->remark}}</td>
                                <td class="text-nowrap">

                                    <button class="btn btn-sm btn-primary"
                                        onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('expense/delete/{{$item->id}}'); }">
                                        <i class="fas fa-trash"></i>
                                    </button> 

                                </td>
                                
                            </tr>
                        @endif
                    
                    @empty
                    
                    @endforelse

                    

                    @forelse($supplierpayment as $item)
                        @if($item->method == 2)
                            <tr style="color:black;">
                                <th scope="row" >{{++$key}}</th>
                                <td>{{$item->date}}</td>
                                <td>Supplier Payment ({{\App\Models\Supplier::find($item->name)->company}})</td>
                                <td>{{$item->amount}}</td>
                                <td>{{ \App\Models\Bankadd::find($item->account)->account_number}}</td>
                                <td>{{$item->remark}}</td>
                                <td class="text-nowrap">

                                    <button class="btn btn-sm btn-primary"
                                        onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('expense/delete/{{$item->id}}'); }">
                                        <i class="fas fa-trash"></i>
                                    </button> 

                                </td>
                                
                            </tr>
                        @endif
                    
                    @empty
                    
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>







@endsection()