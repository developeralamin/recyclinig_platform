@extends('layouts.user')
@section('main_content')
<!-- Page Heading -->
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex">
                    <div>
                        <h4 class="m-0 text-primary">Website Information</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-md-center">
                        <div class="col-md-8">
                            <table class="table">
                                <tr>
                                    <th>Title:</th>
                                    <td>{{ $website->title}}</td>
                                </tr>
                                <tr>
                                    <th>Domain:</th>
                                    <td>{{ $website->domain}}</td>
                                </tr>
                                <tr>
                                    <th>Username:</th>
                                    <td>{{ $website->username}}</td>
                                </tr>
                                <tr>
                                    <th>Password:</th>
                                    <td>{{ $website->password}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection