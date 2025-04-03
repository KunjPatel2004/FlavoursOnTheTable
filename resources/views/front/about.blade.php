@extends('front.layout.layout')

@section('content')

<!-- Page Header Start -->
<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Food Menu</h2>
                    </div>
                    <div class="col-12">
                        <a href="{{url('/')}}">Home</a>
                        <a href="{{url('/available_cooks')}}">Menu</a>
                    </div>
                </div>
            </div>
        </div>


<div class="container">
    <h2>Order Placed Successfully!</h2>
    <p>Thank you for your order. The cook will start preparing it soon.</p>
    <a href="/" class="btn btn-primary">Back to Home</a>
</div>

@endsection