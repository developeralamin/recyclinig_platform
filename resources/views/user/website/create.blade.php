@extends('layouts.user')
@section('main_content')
<!-- Page Heading -->
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-thin text-primary">Add Website</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10">
                            <form action="{{ route('website.store') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="name"> Title <span class="text-danger"> * </span> </label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter website title">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name">Website Domain <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control @error('domain') is-invalid @enderror" name="domain" placeholder="domain.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="name">WordPress Username <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Enter WordPress Username">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="name">Application Password <span class="text-danger"> * </span></label>
                                        <small>
                                            <a href="https://blogen.net/wordpress-application-passwords" target="_blank" rel="noopener noreferrer"> Guide </a>
                                        </small>
                                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter application password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
