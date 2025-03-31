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
    <h1 class="text-center">Terms & Conditions</h1>
    <p>By using <strong>Flavors On The Table</strong>, you agree to the following terms and conditions.</p>

    <h3>1. Account Registration</h3>
    <p>Users must provide accurate personal details when signing up. Multiple accounts per person are not allowed.</p>

    <h3>2. Ordering & Payments</h3>
    <ul>
        <li>Orders can be placed as a guest or a registered user.</li>
        <li>Only <strong>Cash on Delivery (COD)</strong> is supported.</li>
        <li>Once an order is placed, it cannot be canceled.</li>
    </ul>

    <h3>3. Delivery & Refunds</h3>
    <ul>
        <li>Delivery times may vary depending on the cook and location.</li>
        <li>Refunds are only available if an order is undelivered or incorrect.</li>
    </ul>

    <h3>4. User Conduct</h3>
    <p>Users must not:</p>
    <ul>
        <li>Misuse the website or attempt unauthorized access.</li>
        <li>Leave false reviews or spam.</li>
        <li>Engage in fraudulent activities.</li>
    </ul>

    <h3>5. Changes to Terms</h3>
    <p>We reserve the right to update these terms at any time. Continued use of our platform implies acceptance.</p>

    <h3>6. Contact Us</h3>
    <p>Email: <a href="mailto:admin@gmail.com">admin@gmail.com</a></p>
    <p>Phone: +91 9334567890</p>
</div>
@endsection
