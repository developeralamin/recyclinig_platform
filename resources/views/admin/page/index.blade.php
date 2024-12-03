@extends('layouts.admin')
@section('main_content')

<!-- Begin Page Content -->
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Page</h1>
        <a href="{{ route('page.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Page
        </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Page</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $key=>$page)
                        <tr>
                            <td>{{$page->id }}</td>
                            <td>{{Str::limit($page->title,40)}}</td>
                            <td>{{$page->slug}}</td>
                            <td>
                                <form method='post' action="{{ route('page.destroy',$page->id) }}">
                                    <a href="{{ route('page.show',$page->id) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('page.edit',$page->id) }}" class="btn btn-info  btn-sm">
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
                {{ $pages->links() }}
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
