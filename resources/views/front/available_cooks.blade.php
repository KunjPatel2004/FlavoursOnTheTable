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
            <div class="card shadow-sm rounded-2xl h-100">
                <img src="{{ asset('admin/images/carousel-1.jpg') }}"
                     class="card-img-top" 
                     style="width: 100%; height: 300px; object-fit: cover;" 
                     alt="Food Image">
                <div class="card-body d-flex flex-column justify-content-between">
                    
                    <!-- Name + Category icon -->
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title mb-0">{{ $cook->name }}'s Kitchen</h5>
                        <img src="{{ asset('front/img/' . ($cook->food_category == 'veg' ? 'veg.jpg' : ($cook->food_category == 'non-veg' ? 'non-veg.png' : 'both.png'))) }}" 
                             alt="Food Category" width="24" height="24" class="ms-2">
                    </div>

                    <!-- Address + View Menu button -->
                    <div class="d-flex justify-content-between align-items-center">
                        <p style="font-family:color: #333; font-size: 16px; margin-bottom: 0;">
                            {{ $cook->home_address }}
                        </p>
                        <a href="{{ route('cooks.menu', $cook->id) }}" 
                           class="btn btn-outline-warning btn-sm px-3 py-2" 
                           style="white-space:nowrap; font-weight: 500;">
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