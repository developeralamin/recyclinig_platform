@extends('layouts.user')
@section('main_content')
<!-- Begin Page Content -->
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Payments</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payments</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
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
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Payment Method</th>
                            <th>Package</th>
                            <th>Amount</th>
                            <th>Credits</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($payments as $key=>$payment)
                        <tr>
                            <td>{{ $key+1 }}</td>
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
@endsection