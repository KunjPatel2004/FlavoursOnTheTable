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

<div class="container-fluid mt-5">
    <h1 class="text-center mb-4">{{ $selectedCook->name }}'s Menu</h1>

    <div class="row">
        @foreach($menuItems as $food)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('admin/images/fooditems/'.$food->image) }}" class="card-img-top" alt="{{ $food->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $food->name }}</h5>
                    <p class="card-text">{{ $food->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-success mb-0">{{ $food->price }}</h6>
                       <!-- Quantity Control -->
                    </div>
                    <div class="justify-content-between align-items-center">
                        <button class="btn btn-success add-to-cart" data-id="{{ $food->id }}">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection