@extends('layouts.user')

@section('main_content')
<!-- Page Heading -->
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            @if(session('error'))
            <div class="alert alert-danger">
                {!! session('error') !!}
            </div>
            @elseif(session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-thin text-primary">Payment details </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id='checkout-form' method='post' action="{{ route('stripe-create-charge',$package->id) }}">
                                @csrf
                                <input type='hidden' name='stripeToken' id='stripe-token-id'>
                                <br>
                                <div id="card-element" class="form-control"></div>
                                <button id='pay-btn' class="btn btn-success mt-3" type="button" style="margin-top: 20px; width: 100%;padding: 7px;" onclick="createToken()">
                                    Pay ${{ $package->amount }}
                                </button>
                                <form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_js')

<script type="text/javascript">
    //For stripe.js
    const stripe = Stripe("{{ config('stripe.pk') }}");
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    function createToken() {
        document.getElementById("pay-btn").disabled = true;
        stripe.createToken(cardElement).then(function(result) {


            if (typeof result.error != 'undefined') {
                document.getElementById("pay-btn").disabled = false;
                alert(result.error.message);
            }

            // creating token success
            if (typeof result.token != 'undefined') {
                document.getElementById("stripe-token-id").value = result.token.id;
                document.getElementById('checkout-form').submit();
            }
        });
    }

</script>
@endsection
