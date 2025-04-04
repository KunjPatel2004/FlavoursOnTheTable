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


    <div class="container-fluid mt-4">
       <div class="row mt-2">
            @foreach($cooks as $cook)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm rounded-2xl">
                    <img src="{{ asset('admin/images/carousel-1.jpg') }}"
                     class="card-img-top" style="width: 100%; height: 300px; object-fit: cover;" alt="Food Image">
                    <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">{{ $cook->name }}'s Kitchen</h5>
                        <img src="{{ asset('front/img/' . ($cook->food_category == 'veg' ? 'veg.jpg' : ($cook->food_category == 'non-veg' ? 'non-veg.png' : 'both.png'))) }}" 
                            alt="Food Category" width="20" height="20" class="ml-2">
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold">{{ $cook->home_address }}</span>
                        <a href="{{ route('cooks.menu', $cook->id) }}" class="ml-3 text-decoration-none" style="color: #FBAF32; white-space: nowrap;">
                            View Menu
                        </a>
                    </div>

                       
                    </div>                
                </div>
            </div>
            @endforeach
        </div>
   </div>
         
@endsection