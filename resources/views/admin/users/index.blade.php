@extends("layouts.app")

@section('content')

    <!-- Main content -->
    <section class="content my-5 ">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row">

               <!-- col -->
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <b>Users</b>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example1" class="text-nowrap w-100 table-hover table-stripped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $key => $user)
                                        <tr>
                                            <td>{{ __(++$key) }}</td>
                                            <td align="center">
                                                @if (is_null($user->image))
                                                    <span style="font-size: 40px" title="No Image"><i class="bi bi-person-circle"></i></span>
                                                @else
                                                    <img src="{{ asset($user->image) }}" alt="profile image" class="img-fluid rounded-circle" width="200">
                                                @endif
                                            </td>
                                            <td>{{ __($user->name) }}</td>
                                            <td>{{ __($user->email) }}</td>
                                            <td>{{ __($user->phone) }}</td>
                                            <td>
                                                <a title="{{ ($user->status) ? 'Account is active' : 'Account is deactive' }}" href="javascript::" class="btn {{ ($user->status) ? 'btn-success' : 'btn-secondary' }}"
                                                    onclick="if(confirm('Are your sure? Do you want to change status for this user?{{ ($user->status) ? '\nUser cannot login to this account!' : '' }}')){ location.replace('restrict/{{$user->id}}') }">
                                                    <i class="bi {{ ($user->status) ? 'bi-person-check' : 'bi-person-x' }}"></i>
                                                </a>
                                            </td>
                                            <td>{{ date("d-M-Y H:i:s", strtotime($user->created_at)) }}</td>
                                            <td>
                                                <a title="Update" href="{{route('admin.user.edit', $user->id)}}" class="btn btn-success">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                                <a title="Delete" href="javascript::"
                                                    onclick="if(confirm('Are your sure? Do you want to delete this user?')){ location.replace('remove/{{$user->id}}') }"
                                                    class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>

                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               <!-- col -->


            </div><!-- Row -->
        </div>
    </div>

@endsection