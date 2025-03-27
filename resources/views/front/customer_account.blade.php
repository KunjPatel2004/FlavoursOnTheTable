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

<div class="container mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card p-3 shadow-sm">
                <h5>Hello, {{ Auth::user()->name }}</h5>
                <ul class="list-unstyled mt-3">
                    <li><a href="#" class="text-decoration-none">My Billing/Contact Address</a></li>
                    <li><a href="#" class="text-decoration-none">My Orders</a></li>
                    <li><a href="#" class="text-decoration-none">Update Password</a></li>
                </ul>
            </div>
        </div>

        <!-- Account Details Form -->
        <div class="col-md-9">
            <div class="card p-4 shadow-sm">
                <h3 class="mb-3">My Billing/Contact Address</h3>
                <p class="text-muted">Please add your Billing/Contact details.</p>
                
                <form action="{{ url('/account/update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name *</label>
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Address *</label>
                            <input type="text" name="address" class="form-control" value="{{ Auth::user()->home_address }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">City *</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">State *</label>
                            <input type="text" name="state" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Country *</label>
                            <select name="country" class="form-control">
                                <option>Choose Country</option>
                                <option>India</option>
                                <option>USA</option>
                                <option>UK</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pincode *</label>
                            <input type="text" name="pincode" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mobile *</label>
                            <input type="text" name="mobile" class="form-control" value="{{ Auth::user()->mobile }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn w-100" style="background-color:#fbaf32; color: white;">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection