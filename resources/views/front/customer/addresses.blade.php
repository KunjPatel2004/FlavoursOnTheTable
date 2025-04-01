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
    <div class="row">
        <div class="col-md-3">
            <div class="card p-3 shadow-sm">
                <h5>Hello, {{ Auth::user()->name }}</h5>
                <ul class="list-unstyled mt-3">
                    <li><a href="{{url('/customer/update_account')}}" class="text-decoration-none">My Contact Details</a></li>
                    <li><a href="{{url('/my-orders')}}" class="text-decoration-none">My Orders</a></li>
                    <li><a href="{{url('/customer/update_password')}}" class="text-decoration-none">Update Password</a></li>
                    <li><a href="{{url('/customer/addresses')}}" class="text-decoration-none">My Billing Address</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card p-4 shadow-sm">
                <h3 class="mb-3">My Addresses</h3>
                <p class="text-muted">Manage your billing/contact details below.</p>

                <!-- If no address exists in the users table -->
                @if (empty($user->address))
                    <p class="text-danger">No address added yet.</p>
                    <a href="{{ route('customer.addAddress') }}" class="btn btn-primary">Add Your Address</a>
                @else
                    <!-- Default Address from users table -->
                    <div class="list-group mb-3">
                        <div class="list-group-item">
                            <p><strong>Address:</strong> {{ $user->address }}</p>
                            <p><strong>City:</strong> {{ $user->city }}</p>
                            <p><strong>State:</strong> {{ $user->state }}</p>
                            <p><strong>Country:</strong> {{ $user->country }}</p>
                            <p><strong>Pincode:</strong> {{ $user->pincode }}</p>
                            <span class="badge bg-success">Default Address</span>
                        </div>
                    </div>

                    <!-- Additional addresses from addresses table -->
                    <div class="list-group">
                        @foreach ($addresses as $address)
                        <div class="list-group-item">
                            <p><strong>Address:</strong> {{ $address->address }}</p>
                            <p><strong>City:</strong> {{ $address->city }}</p>
                            <p><strong>State:</strong> {{ $address->state }}</p>
                            <p><strong>Country:</strong> {{ $address->country }}</p>
                            <p><strong>Pincode:</strong> {{ $address->pincode }}</p>

                            <form action="{{ route('customer.setDefaultAddress', $address->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Set as Default</button>
                            </form>
                        </div>
                        @endforeach
                    </div>

                    <!-- Add Another Address Button -->
                    @if ($addresses->count() < 2)
                        <a href="{{ route('customer.addAddress') }}" class="btn btn-success mt-3">Add Another Address</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
