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
    <h1 class="text-center">Privacy Policy</h1>
    <p>Welcome to <strong>Flavors On The Table</strong>. Your privacy is important to us. This Privacy Policy explains how we collect, use, disclose, and protect your personal information.</p>

    <h3>1. Information We Collect</h3>
    <p>We collect the following types of information:</p>
    <ul>
        <li><strong>Personal Information:</strong> Name, email, mobile number, and address when you register or place an order.</li>
        <li><strong>Order Details:</strong> Items ordered, payment preferences (COD only), and delivery address.</li>
        <li><strong>Technical Data:</strong> IP address, browser type, and device information for security and analytics.</li>
    </ul>

    <h3>2. How We Use Your Information</h3>
    <p>Your data is used to:</p>
    <ul>
        <li>Process and deliver food orders efficiently.</li>
        <li>Provide customer support and resolve issues.</li>
        <li>Enhance user experience with personalized recommendations.</li>
        <li>Improve website performance and security.</li>
        <li>Send order status notifications and loyalty rewards updates.</li>
    </ul>

    <h3>3. Data Security</h3>
    <p>We implement security measures to protect your data. However, while we strive for safety, no system is completely foolproof.</p>

    <h3>4. Sharing Your Information</h3>
    <p>We do not sell your personal data. We may share it with:</p>
    <ul>
        <li><strong>Cooks:</strong> To fulfill orders.</li>
        <li><strong>Delivery Agents:</strong> To complete the delivery process.</li>
        <li><strong>Legal Authorities:</strong> If required by law.</li>
    </ul>

    <h3>5. Your Rights</h3>
    <p>You have the right to access, update, or delete your data. Contact us for any requests.</p>

    <h3>6. Contact Us</h3>
    <p>Email: <a href="mailto:admin@gmail.com">admin@gmail.com</a></p>
    <p>Phone: +91 9334567890</p>
</div>
@endsection