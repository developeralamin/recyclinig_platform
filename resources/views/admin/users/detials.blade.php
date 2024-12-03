@extends('layouts.admin')
@section('main_content')

<!-- Content Row -->
<div class="row">
    <!-- Total Article  Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-info text-uppercase mb-1">
                            Total Article
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_article}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Website Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-info text-uppercase mb-1">Total Website
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$total_website}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Payment  Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-info text-uppercase mb-1">Total Payments
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$total_payment}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Balance  Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-info text-uppercase mb-1">Total Balance
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$user->balance }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add credits button  -->
<div class="mt-4">
    <div class="d-flex justify-content-end">
        <a href="{{ route('delete-users',$user->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger m-1">Delete</a>
        <a href="{{ route('users-credits',$user->id) }}" data-toggle="modal" data-target="#editUserModal" class="btn btn-info m-1"> Edit</a>
        <a href="{{ route('users-credits',$user->id) }}" class="btn btn-primary m-1"> Add Credits</a>
    </div>

</div>

<!-- Show user Information -->
<div class="card mt-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <span class="text-sm font-weight-bold">Name: </span><span>{{$user->name}}</span>
                        </td>
                        <td>
                            <span class="text-sm font-weight-bold">E-mail: </span><span>{{$user->email}}</span>
                        </td>
                        <td>
                            <span class="text-sm font-weight-bold">Phone: </span><span>{{$user->phone}}</span>
                        </td>
                        <td>
                            <span class="text-sm font-weight-bold">Balance: </span><span>{{ $user->balance}}</span>
                        </td>
                        <td>
                            <span class="text-sm font-weight-bold">Expire Date: </span><span>{{$user->expire_date}}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- User information -->
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Articles</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Payments Histroy</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Keywords</th>
                                    <th>Status</th>
                                    <th>Format</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->keywords }}</td>
                                    <td>
                                        @if($article->status == "done")
                                            <span class="badge badge-success"> {{ $article->status}}</span>
                                        @else
                                            <span class="badge badge-warning"> {{ $article->status}}</span>
                                        @endif
                                    </td>
                                    <td> <span class="badge badge-success">{{ $article->format}}</span> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$articles->links()}}
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Payment Method</th>
                                    <th>Package</th>
                                    <th>Amount</th>
                                    <th>Credits</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $key=>$payment)
                                <tr>
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ date('d-m-Y', strtotime( $payment->date))}}</td>
                                    <td>{{$payment->payment_method}}</td>
                                    <td>{{$payment->package->title}}</td>
                                    <td>{{$payment->amount}}</td>
                                    <td>{{$payment->credits}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $payments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabe2">Update <b>{{ $user->name }}</b> Info</h5>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <form action="{{ route('update-users',$user->id) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name"> Name <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="Enter user name">

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email"> E-mail <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="Enter user email">

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone"> Phone </label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" placeholder="Enter user phone">

                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endsection
