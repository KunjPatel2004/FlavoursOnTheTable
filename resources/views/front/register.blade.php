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
                <h2 class="text-dark">Create an Account</h2>
                <p class="text-muted">Register to start ordering delicious food</p>
            </div>

            @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form id="registerForm" action="javascript:;" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
                    <p id="register-name"></p>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
                    <p id="register-email"></p>
                </div>

                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile Number">
                    <p id="register-mobile"></p>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
                    <p id="register-password"></p>
                </div>

                <button type="submit" class="btn w-100" style="background-color:#fbaf32">Register</button>
            </form>

            <div class="text-center mt-3">
                <p class="text-muted">Already have an account? 
                    <a href="{{ url('/login') }}" class="text text-decoration-none fw-bold" style="color:#fbaf32">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>  

</body>
</html>
@endsection