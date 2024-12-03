@extends('layouts.user')
@section('main_content')
<!-- Page Heading -->
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-thin text-primary">Update Website</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10">
                            <form action="{{ route('website.update',$website->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="name"> Title </label>
                                        <input type="text" value="{{ $website->title }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter website title">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name">Domain</label>
                                        <input type="text" value="{{ $website->domain }}" class="form-control @error('domain') is-invalid @enderror" name="domain" placeholder="Enter website domain">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="name">Username</label>
                                        <input type="text" value="{{ $website->username }}" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Enter website username">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="name">Password</label>
                                        <input type="text" value="{{ $website->password }}" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter website password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection