@extends('front.layout.layout')

@section('content')

<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('/customer/account')}}">My Account</a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h3>Add New Address</h3>
    <form action="{{ route('customer.storeAddress') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="state">State</label>
            <input type="text" name="state" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pincode">Pincode</label>
            <input type="text" name="pincode" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Address</button>
    </form>
</div>
@endsection
