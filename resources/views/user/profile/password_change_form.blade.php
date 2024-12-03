@extends('layouts.user')
@section('main_content')
<!-- Page Heading -->
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-thin text-primary">Changed Password</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-md-center">
                        <div class="col-md-8">
                            <form action="{{ route('user.password.update') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="name"> Old Password <span class="text-danger"> * </span></label>
                                    <input type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" placeholder="Enter old password">
                                    <font style="color: red">
                                        {{ ($errors->has('oldpassword'))?($errors->first('oldpassword')):'' }}
                                    </font>
                                </div>
                                <div class="form-group">
                                    <label for="name"> Password <span class="text-danger"> * </span> </label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password">
                                    <font style="color: red">
                                        {{ ($errors->has('password'))?($errors->first('password')):'' }}
                                    </font>
                                </div>
                                <div class="form-group">
                                    <label for="name"> Confirm Password <span class="text-danger"> * </span></label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Enter confirm password">
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