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
<!-- Main Content -->
<div class="container mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card p-3 shadow-sm">
                <h5>Hello, {{ Auth::user()->name }}</h5>
                <ul class="list-unstyled mt-3">
                    <li><a href="{{ url('/customer/account') }}" class="text-decoration-none">My Billing/Contact Address</a></li>
                    <li><a href="{{url('/my-orders')}}" class="text-decoration-none">My Orders</a></li>
                    <li><a href="{{ url('/customer/update_password') }}" class="text-decoration-none fw-bold 
                    {{ Session::get('page') == 'update_password' ? 'active text-success' : '' }}">Update Password</a></li>
                </ul>
            </div>
        </div>

        <!-- Update Password Form -->
        <div class="col-md-9">
            <div class="card p-4 shadow-sm">
                <h3 class="mb-3">Update Password</h3>
                <p class="text-muted">Please enter your current password to update your password.</p>
                <p id="password-error"></p>
                <p id="password-success"></p>
                <form id="passwordForm" action="javascript:;" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Current Password *</label>
                            <input type="password" name="current_password" class="form-control"  placeholder="Enter current password">
                            <p id="password-current_password"></p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">New Password *</label>
                            <input type="password" name="new_password" class="form-control"  placeholder="Enter new password">
                            <p id="password-new_password"></p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confirm Password *</label>
                            <input type="password" name="confirm_password" class="form-control"  placeholder="Confirm new password">
                            <p id="password-confirm_password"></p>
                        </div>
                    </div>

                    <button type="submit" class="btn w-100" style="background-color:#fbaf32; color: white;">Save</button>
                </form>
            </div>
        </div>
    </div>
</div
@endsection