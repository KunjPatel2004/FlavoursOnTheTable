@extends('front.layout.layout')

@section('content')
<!-- Page Header Start -->
<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Checkout</h2>
                    </div>
                    <div class="col-12">
                        <a href="{{url('/')}}">Home</a>
                        <a href="{{url('/cart')}}">Cart</a>
                    </div>
                </div>
            </div>
        </div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
        @endif
        
<div class="container">
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
                <strong>Error:</strong>{{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <h2>Checkout</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Food Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->food_name }}</td>
                <td>₹{{ number_format($item->price, 2) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹{{ number_format($item->subtotal, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total: ₹{{ number_format($totalPrice, 2) }}</h3>

    <form action="{{ route('place.order') }}" method="POST">
        @csrf

        @if(auth()->check())
            <h4>Select Address</h4>
            <div class="mb-3">
                <label>Saved Addresses</label>
                <select name="address" class="form-control">
                    <option value="{{ $defaultAddress }}">{{ $defaultAddress }}</option>
                    @foreach($otherAddresses as $address)
                        <option value="{{ $address->address }}">{{ $address->address }}</option>
                    @endforeach
                </select>
            </div>
        @else
            <h4>Guest Checkout</h4>
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Mobile Number</label>
                <input type="text" name="mobile" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>
        @endif

        <h4>Payment Method</h4>
        <div class="mb-3">
            <label>
                <input type="radio" name="payment" value="COD" checked>
                Cash on Delivery
            </label>
        </div>

        <button type="submit" class="btn btn-success">Place Order</button>
    </form>
</div>
@endsection