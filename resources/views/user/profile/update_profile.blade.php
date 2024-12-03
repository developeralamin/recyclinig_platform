@extends('layouts.user')
@section('main_content')
<!-- Page Heading -->
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-thin text-primary">Update <b>{{ $user->name }}</b> Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10">
                            <form action="{{ route('user-profile-update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="name">Name </label>
                                        <input type="name" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="User name">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="email"> E-mail </label>
                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="User Email">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="phone"> Phone </label>
                                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control @error('phone') is-invalid @enderror" placeholder="User phone">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="photo"> Photo </label>
                                            <div class="controls">
                                                <input type="file" class="form-control" id="photo" name="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @if(!$user->photo)
                                            <div class="controls">
                                                <img id="blah" width="400" src="{{ $user->photo }}" height="400" style="width: 150px;height: 100px;border: 1px solid #000000" alt="User photo">
                                            </div>
                                            @elseif($user->photo)
                                            <div class="controls">
                                                <img id="blah" width="400" src="{{ $user->photo }}" height="400" style="width: 150px;height: 100px;border: 1px solid #000000" alt="User photo">
                                            </div>
                                            @endif
                                        </div><!-- End Col Md-6 -->
                                    </div> <!-- End Row -->
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