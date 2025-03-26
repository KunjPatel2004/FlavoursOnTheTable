@extends('front.layout.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">

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

<body>

<div class="container d-flex justify-content-center align-items-center mt-4" style="min-height: 60vh;">
        <div class="col-md-5">
            <div class="card shadow-lg p-4">
                <div class="text-center mb-3">
                    <h1 class="text fw-bold" style="color:#fbaf32">Flavors On The Table</h1>
                    <h2 class="text-dark">Welcome Back!</h2>
                    <p class="text-muted">Login to continue</p>
                </div>

                @if(Session::has('success message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success:</strong> {{ Session::get('success message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(Session::has('error message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> {{ Session::get('error message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ url('/customer/login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <a href="#" class="text text-decoration-none" style="color:#fbaf32">Forgot password?</a>
                    </div>

                    <button type="submit" class="btn w-100" style="background-color:#fbaf32">Login</button>
                </form>

                <div class="text-center mt-3">
                    <p class="text-muted">Don't have an account? 
                        <a href="{{ url('/customer/register') }}" class="text-decoration-none fw-bold" style="color:#fbaf32">Sign Up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection