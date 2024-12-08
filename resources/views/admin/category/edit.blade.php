@extends('layouts.user')
@section('main_content')
    <div class="container">
        <h4>Categories Edit</h4>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Category Name"
                            value="{{ old('name', $category->name) }}">
                        @error('name')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Category Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                        @if ($category->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/category/' . $category->image) }}" alt="Category Image"
                                    width="100">
                            </div>
                        @endif
                        @error('image')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Category Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
