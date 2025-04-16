@extends('front.layout.layout')

@section('content')

<!-- Page Header Start -->
<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>About</h2>
                    </div>
                    <div class="col-12">
                        <a href="{{url('/')}}">Home</a>
                        <a href="{{url('/available_cooks')}}">Menu</a>
                    </div>
                </div>
            </div>
        </div>


<!-- Features Start -->
<div class="feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-header">
                        <p>Why Choose Us</p>
                        <h2>Our Key Features</h2>
                    </div>
                    <div class="feature-text">
                        <div class="feature-img">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ asset('front/img/feature-1.jpg')}}" alt="Fresh Ingredients">
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('front/img/feature-2.jpg')}}" alt="Delicious Dishes">
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('front/img/feature-3.jpg')}}" alt="Quality Cooking">
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('front/img/feature-4.jpg')}}" alt="Quick Delivery">
                                </div>
                            </div>
                        </div>
                        <p>
                            Experience the best home-cooked meals made with fresh ingredients, prepared by skilled cooks, and delivered straight to your doorstep.
                        </p>
                        <a class="btn custom-btn" href="{{url('/available_cooks')}}">Order Now</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-cooking"></i>
                                <h3>Top Home Cooks</h3>
                                <p>
                                    Our talented cooks bring the finest homemade flavors to your table, ensuring delicious and authentic meals.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-vegetable"></i>
                                <h3>Fresh & Natural Ingredients</h3>
                                <p>
                                    We use only the freshest and most natural ingredients, free from preservatives and artificial flavors.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-medal"></i>
                                <h3>High-Quality Standards</h3>
                                <p>
                                    Our meals meet the highest quality standards, ensuring you get the best taste and nutrition in every bite.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-meat"></i>
                                <h3>Fresh Vegetables</h3>
                                <p>
                                    Every dish is prepared using fresh vegetables.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-courier"></i>
                                <h3>Fast & Reliable Delivery</h3>
                                <p>
                                    Enjoy quick and hassle-free delivery right to your doorstep, ensuring your food arrives hot and fresh.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-fruits-and-vegetables"></i>
                                <h3>Healthy & Low-Fat Options</h3>
                                <p>
                                    We offer nutritious meals with balanced ingredients to keep you healthy without compromising on taste.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

@endsection