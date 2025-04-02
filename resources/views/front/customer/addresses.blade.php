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
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                <strong>Success:</strong> {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>    
        @endif

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

                
                @if (empty($user->address))
                    <p class="text-danger">No address added yet.</p>
                    <a href="{{ url('/customer/add-address')  }}" class="btn btn-primary">Add Your Address</a>
                @else
                    
                    <div class="list-group mb-3">
                        <div class="list-group-item">
                            <p><strong>Address:</strong> {{ $user->address }}</p>
                            <p><strong>City:</strong> {{ $user->city }}</p>
                            <p><strong>State:</strong> {{ $user->state }}</p>
                            <p><strong>Country:</strong> {{ $user->country }}</p>
                            <p><strong>Pincode:</strong> {{ $user->pincode }}</p>
                            <span class="badge bg-success">Default Address</span>
                            &nbsp;
                            <a class="btn btn-warning" href="{{ url('/customer/addresses/edit/'.$user->id) }}">Edit</a>
                        </div>
                    </div>

                    
                    <div class="list-group">
                        @foreach ($addresses as $address)
                        <div class="list-group-item">
                            <p><strong>Address:</strong> {{ $address->address }}</p>
                            <p><strong>City:</strong> {{ $address->city }}</p>
                            <p><strong>State:</strong> {{ $address->state }}</p>
                            <p><strong>Country:</strong> {{ $address->country }}</p>
                            <p><strong>Pincode:</strong> {{ $address->pincode }}</p>
                            
                            <div class="d-flex">
                                @if (!$address->is_default)
                                    <form action="{{ url('/customer/set-default-address', $address->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm me-2">Set as Default</button>
                                    </form>
                                @endif

                                <a class="btn btn-warning" href="{{ url('/customer/addresses/edit/'.$address->id) }}">Edit</a>
                                &nbsp;
                                &nbsp;
                                <!-- Delete Address Button with SweetAlert -->
                                <button class="btn btn-danger btn-sm delete-address" recordid="{{$address->id}}">
                                    Delete</button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Add Another Address Button -->
                    @if ($addresses->count() < 2)
                        <a href="{{ url('/customer/add-address') }}" class="btn btn-success mt-3">Add Another Address</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
