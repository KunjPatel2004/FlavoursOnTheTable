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
    <h2>Your Cart</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="cart-body">
            @foreach(session('cart', []) as $id => $item)
            <tr>
                <td><img src="{{ asset('storage/'.$item['image']) }}" width="50"></td>
                <td>{{ $item['name'] }}</td>
                <td>${{ $item['price'] }}</td>
                <td><input type="number" class="cart-quantity" data-id="{{ $id }}" value="{{ $item['quantity'] }}" min="1"></td>
                <td>${{ $item['price'] * $item['quantity'] }}</td>
                <td><button class="btn btn-sm btn-danger remove-from-cart" data-id="{{ $id }}">Remove</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button class="btn btn-warning" id="clear-cart">Clear Cart</button>
</div>
@endsection