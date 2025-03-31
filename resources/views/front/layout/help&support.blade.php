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

<div class="container mt-5">
    <h1 class="text-center">Help & Support</h1>
    <p>If you have any questions or issues while using <strong>Flavors On The Table</strong>, we are here to help!</p>

    <h3>1. How to Place an Order?</h3>
    <ul>
        <li>Browse through the available food items.</li>
        <li>Click "Add to Cart" for your desired dishes.</li>
        <li>Go to the cart page, review your selections, and proceed to checkout.</li>
    </ul>

    <h3>2. Payment Methods</h3>
    <p>We currently support <strong>Cash on Delivery (COD)</strong> only.</p>

    <h3>3. How to Track My Order?</h3>
    <ul>
        <li>After placing an order, go to the "My Orders" section.</li>
        <li>A real-time progress bar will show your order status.</li>
    </ul>

    <h3>4. Can I Cancel My Order?</h3>
    <p>No, once an order is placed, it cannot be canceled. However, in case of an issue, contact our support team immediately.</p>

    <h3>5. Rewards & Loyalty Points</h3>
    <ul>
        <li>You earn <strong>1 point for every ₹100</strong> spent.</li>
        <li>On every 5th order from the same cook, you get a discount on your 6th order.</li>
        <li>Track your rewards in the "My Rewards" section.</li>
    </ul>

    <h3>6. Contact Customer Support</h3>
    <p>If you need further assistance, reach out to us:</p>
    <p>Email: <a href="mailto:admin@gmail.com">admin@gmail.com</a></p>
    <p>Phone: +91 9334567890</p>
</div>
@endsection