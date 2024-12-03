@extends('layouts.admin')
@section('main_content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page City -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Package</h1>
        <a href="{{ route('package.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Package
        </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Package</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>Credits</th>
                            <th>Duration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>Credits</th>
                            <th>Duration</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($packages as $key=>$package)
                        <tr>
                            <td>{{$package->id }}</td>
                            <td>{{$package->title}}</td>
                            <td>{{$package->amount}}</td>
                            <td>{{$package->credits}}</td>
                            <td>{{$package->duration}} days</td>
                            <td>
                                <form method='post' action="{{ route('package.destroy',$package->id) }}">
                                    <a href="{{ route('package.edit',$package->id) }}" class="btn btn-info  btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger  btn-sm"> <i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $packages->links() }}
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
