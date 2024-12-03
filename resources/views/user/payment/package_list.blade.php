@extends('layouts.user')
@section('main_content')
<!-- Begin Page Content -->
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Recharge</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Recharge</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Credits</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @foreach($packages as $key=>$package)
                        <tr>
                            <td>{{$package->title}}</td>
                            <td>{{$package->amount}}</td>
                            <td>{{$package->credits}}</td>
                            <td>{{$package->duration}} days</td>
                            <td>
                                <a href="{{ route('payment-form',$package->id) }}" class="btn btn-info  btn-sm">
                                    Buy
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
