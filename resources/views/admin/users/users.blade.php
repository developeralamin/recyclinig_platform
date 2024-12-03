@extends('layouts.admin')
@section('main_content')

<!-- Page City -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Users</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($users as $key=>$user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        @if($user->is_active == 0)
                        <td> <a href="{{ route('update-users-status',$user->id) }}" onclick="return confirm('Are you sure change status')" class="btn btn-danger  btn-sm">InActive</a></td>
                        @else
                        <td> <a href="{{ route('update-users-status',$user->id) }}" onclick="return confirm('Are you sure change status')" class="btn btn-success  btn-sm">Active</a></td>
                        @endif
                        <td>
                            <a href="{{ route('users-details',$user->id) }}" class="btn btn-success  btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            @if($user->is_active == 0)
                            <a href="{{ route('update-users-status',$user->id) }}" onclick="return confirm('Are you sure change status')" class="btn btn-danger  btn-sm">InActive</a>
                            @else
                            <a href="{{ route('update-users-status',$user->id) }}" onclick="return confirm('Are you sure change status')" class="btn btn-success  btn-sm">Active</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
