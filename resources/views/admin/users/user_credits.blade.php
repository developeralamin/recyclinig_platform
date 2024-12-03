@extends('layouts.admin')
@section('main_content')
<!-- Page Heading -->
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-thin text-primary">Add Credits</h4>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <form action="{{ route('add-users-credits',$user->id) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="balance"> Balance <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('balance') is-invalid @enderror" name="balance" value="{{ $user->balance }}" placeholder="Enter user balance">

                            @if ($errors->has('balance'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('balance') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="credits"> Expire Date <span class="text-danger">*</span> </label>
                            <input type="date" class="form-control @error('expire_date') is-invalid @enderror" name="expire_date" value="{{ $user->expire_date}}" placeholder="Enter expire date">
                            @if ($errors->has('expire_date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('expire_date') }}</strong>
                            </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection