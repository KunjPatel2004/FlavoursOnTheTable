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
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card p-3 shadow-sm">
                <h5>Hello, {{ Auth::user()->name }}</h5>
                <ul class="list-unstyled mt-3">
                    <li><a href="{{url('/customer/update_account')}}" class="text-decoration-none  {{ Session::get('page') == 'update_account' ? 'active text-success' : '' }}">My Billing/Contact Address</a></li>
                    <li><a href="#" class="text-decoration-none">My Orders</a></li>
                    <li><a href="{{url('/customer/update_password')}}" class="text-decoration-none">Update Password</a></li>
                </ul>
            </div>
        </div>

        <!-- Account Details Form -->
        <div class="col-md-9">
            <div class="card p-4 shadow-sm">
                <h3 class="mb-3">My Billing/Contact Address</h3>
                <p class="text-muted">Please add your Billing/Contact details.</p>
                <p id="account-error"></p>
                <p id="account-success"></p>
                <form id="accountForm" action="javascript:;" method="POST">@csrf
                    <div class="row">
                    <div class="col-md-6 mb-3">
                            <label class="form-label">Email *</label>
                            <input style="background-color:#ccc" type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                            <p id="account-email"></p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name *</label>
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                            <p id="account-name"></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Address *</label>
                            <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">
                            <p id="account-address"></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">City *</label>
                            <input type="text" name="city" class="form-control" value="{{ Auth::user()->city }}">
                            <p id="account-city"></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">State *</label>
                            <input type="text" name="state" class="form-control" value="{{ Auth::user()->state }}">
                            <p id="account-state"></p>
                        </div>
                        <!-- <div class="col-md-6 mb-3">
                            <label class="form-label">Country *</label>
                            <select name="country" class="form-control">
                                <option>Choose Country</option>
                                <option>India</option>
                            </select>
                        </div> -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pincode *</label>
                            <input type="text" name="pincode" class="form-control" value="{{ Auth::user()->pincode }}">
                            <p id="account-pincode"></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mobile *</label>
                            <input type="text" name="mobile" class="form-control" value="{{ Auth::user()->mobile }}">
                            <p id="account-mobile"></p>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn w-100" style="background-color:#fbaf32; color: white;">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection