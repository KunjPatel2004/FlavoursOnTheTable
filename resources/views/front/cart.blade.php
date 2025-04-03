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

        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                <strong>Success:</strong> {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>    
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
                <strong>Error:</strong> {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="container">
    <h2>Your Cart</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Food Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->food_name }}</td>
                    <td>₹{{ $item->price }}</td>
                    <td>
                        <input type="number" class="update-cart" data-id="{{ $item->id }}" value="{{ $item->quantity }}" min="1">
                    </td>
                    <td>{{ $item->subtotal }}</td>
                    <td>
                        <button class="btn btn-danger remove-item" data-id="{{ $item->id }}">Remove</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Total: ₹{{ number_format($totalPrice, 2) }}</h3>

    <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
    </div>
</div>
@endsection