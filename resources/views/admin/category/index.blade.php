@extends('layouts.user')
@section('main_content')
    <div class="container">
        <h4>Categories</h4>
        <div class="text-end">
            <a href="{{ route('categories.create') }}" class="btn btn-info mb-3">Add Category</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ $category->image == null ? asset('images/default.png') : asset('storage/category/' . $category->image) }}"
                                alt="" width="50" height="50"></td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-4">
            {{ $categories->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
@endsection
