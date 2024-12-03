@extends('layouts.admin')
@section('main_content')
<!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-thin text-primary">Add Package</h4>
    </div>
    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <form action="{{ route('package.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="name"> Title <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter package title">
                        </div>
                        <div class="col-sm-6">
                            <label for="name">Amount <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" placeholder="Enter package amount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="name">Credits <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('credits') is-invalid @enderror" name="credits" placeholder="Enter package credits">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="name">Duration <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('duration') is-invalid @enderror" name="duration" placeholder="Enter package duration">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection