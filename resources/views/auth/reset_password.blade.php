@extends('layouts.backend')
@section('page_body')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forget your password </div>
                <div class="card-body">
                    You can reset password from bellow link:
                    <a href="{{ route('reset-password', $token) }}">Reset Password</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection