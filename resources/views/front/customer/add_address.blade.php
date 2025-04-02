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
           
    <div class="card p-4 shadow-sm">
        <h3 class="mb-3">Edit Address</h3>
        <form method="POST" action="{{ url('/customer/addresses/update/'.$address->id) }}">
            @csrf
            <div class="mb-3">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $address->address) }}">
            </div>
            <div class="mb-3">
                <label>City</label>
                <input type="text" name="city" class="form-control" value="{{ old('city', $address->city) }}">
            </div>
            <div class="mb-3">
                <label>State</label>
                <input type="text" name="state" class="form-control" value="{{ old('state', $address->state) }}">
            </div>
            <div class="mb-3">
                <label>Country</label>
                <input type="text" name="country" class="form-control" value="{{ old('country', $address->country) }}">
            </div>
            <div class="mb-3">
                <label>Pincode</label>
                <input type="text" name="pincode" class="form-control" value="{{ old('pincode', $address->pincode) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Address</button>
            <a href="{{ url('/customer/addresses') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection