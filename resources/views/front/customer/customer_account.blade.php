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
                    <li><a href="{{url('/customer/update_account')}}" class="text-decoration-none">My Contact Details</a></li>
                    <li><a href="{{url('/my-orders')}}" class="text-decoration-none">My Orders</a></li>
                    <li><a href="{{url('/customer/update_password')}}" class="text-decoration-none">Update Password</a></li>
                    <li><a href="{{url('/customer/addresses')}}" class="text-decoration-none">My Billing Address </a></li>
                </ul>
            </div>
        </div>

        <!-- Account Details Form -->
        <div class="col-md-9">
            <div class="card p-4 shadow-sm">
                <h3 class="mb-3">Contact Details</h3>
                <p class="text-muted">Please add your Contact details.</p>
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