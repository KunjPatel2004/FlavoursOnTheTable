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
    <div class="container row mt-2 ml-4">
        <form method="GET" action="{{url('admin/food_items')}}" class="row mb-4">
        <div class="col-md-4 pl-5">
            <input type="text" name="search" class="form-control" placeholder="Search for food...">
        </div>
        <div class="col-md-4 pl-4">
            <select name="category" class="form-control">
                <option value="">All Categories</option>
                <option value="Pizza">Pizza</option>
                <option value="Burger">Burger</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-warning w-100">Search</button>
        </div>
    </form>
    </div>

    <div class="container-fluid">
       <div class="row mt-2">
            @foreach($cooks as $cook)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm rounded-2xl">
                    <img src="{{ asset('admin/images/carousel-1.jpg') }}"
                     class="card-img-top" style="width: 100%; height: 300px; object-fit: cover;" alt="Food Image">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">{{ $cook->name }}'s Kitchen</h5>
                            <!-- <button class="btn btn-warning add-to-cart">Add to Cart</button> -->
                            <a href="{{route('cooks.menu',$cook->id)}}" style="color:#FBAF32"><span>View Menu</span></a>
                        </div>
                    
                    </div>                
                </div>
            </div>
            @endforeach
        </div>
   </div>
         
@endsection