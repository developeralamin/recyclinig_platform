@extends('layouts.admin')
@section('main_content')

<!-- Begin Page Content -->
<div class="container">
    <!-- Page City -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Website</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Website</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Username</th>
                            <th>Domain</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($websites as $key=>$website)
                        <tr>
                            <td>{{ $website->id }}</td>
                            <td>{{$website->title}}</td>
                            <td>{{$website->username}}</td>
                            <td>{{$website->domain}}</td>
                            <td>{{$website->password}}</td>
                            <td>
                                <form method='post' action="{{ route('website-delete',$website->id) }}">

                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger  btn-sm"> <i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $websites->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
