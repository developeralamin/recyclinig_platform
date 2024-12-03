@extends('layouts.admin')
@section('main_content')
<!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-thin text-primary">Update Page</h4>
    </div>
    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <form action="{{ route('page.update',$page->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name"> Title </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $page->title }}" name="title" placeholder="Enter page title">
                    </div>
                    <div class="form-group">
                        <label for="slug"> Slug </label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ $page->slug }}" disabled name="slug">
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea rows="10" cols="15" class="form-control" id="editor" name="description">
                        {{$page->description }}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection