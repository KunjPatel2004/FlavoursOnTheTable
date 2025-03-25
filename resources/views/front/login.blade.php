@extends('front.layout.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head> <script src="https://cdn.tailwindcss.com"></script></head>
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


<div class="bg-gray-100 d-flex items-center justify-center mt-0">

    <div class="w-full max-w-md p-8 space-y-6 bg-white  ">
        <!-- Logo -->
        <div class="text-center">
            <h1 class="text-4xl font-bold mt-2 " style="color:#FBAF32">Flavors On The Table</h1>
            <h2 class="text-2xl font-bold text-gray-800 mt-2">Welcome Back!</h2>
            <p class="text-gray-800">Login to continue</p>
        </div>

        @if(Session::has('success message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success:</strong>{{ Session::get('success message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif

        @if(Session::has('error message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error:</strong>{{ Session::get('error message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!-- Login Form -->
        <form action="{{route('customer.login')}}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                <input type="email" id="email" name="email" required
                    class="w-full p-3 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full p-3 border border-gray-300 rounded-lg">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" class="mr-2"> Remember me
                </label>
                <a href="#" class="hover:underline text-sm" style="color:#FBAF32">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full p-3 text-white rounded-lg hover:bg-orange-600 transition duration-200" style="background-color:#FBAF32">
                Login
            </button>
        </form>
        <!-- Register -->
        <div class="text-center text-gray-600 text-sm">
            Don't have an account?
            <a href="{{url('/register')}}" class="hover:underline font-semibold" style="color:#FBAF32">Sign Up</a>
        </div>
    </div>

</div>
</html>
@endsection