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

        @if(Session::has('success message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Success:</strong>{{ Session::get('success message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
             </div>
          @endif
        <table class="table table-bordered table-hover">
    <thead  class="bg-primary text-white">
        <tr>
            <th>Food Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($cartItems as $item)
    <tr>
        <td>{{ $item->food_name }}</td>
        <td>₹{{ $item->price }}</td>
        <td><input type="number" class="form-control update-cart" data-id="{{ $item->id }}" value="{{ $item->quantity }}" min="1" style="width: 80px;"></td>
        <td>₹{{ $item->subtotal }}</td>
        <td><button class="btn btn-danger remove-cart" data-id="{{ $item->id }}">Remove</button></td>   
    </tr>
@endforeach
    </tbody>
</table>
<!-- Cart Total & Checkout -->
<div class="d-flex justify-content-between align-items-center">
    <h4>Total: ₹<span id="cart-total"></span></h4>
    <a href="{{ url('/checkout') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
</div>

@endsection