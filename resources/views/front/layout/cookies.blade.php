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
    <h1 class="text-center">Cookies Policy</h1>
    <p>Welcome to <strong>Flavors On The Table</strong>. Your privacy and security are important to us. This Cookies Policy explains how we use cookies and similar technologies when you visit our website.</p>

    <h3>1. What Are Cookies?</h3>
    <p>Cookies are small text files stored on your device (computer, tablet, or smartphone) when you visit a website. They help websites recognize your device and remember information about your visit to improve your experience.</p>

    <p>Cookies allow us to:</p>
    <ul>
        <li>Provide a personalized and efficient browsing experience.</li>
        <li>Save login details and order history for a smoother ordering process.</li>
        <li>Analyze how users interact with our website to improve services.</li>
        <li>Ensure security and prevent fraudulent activities.</li>
    </ul>

    <h3>2. How We Use Cookies</h3>
    <p>We use cookies for several purposes, including:</p>
    <ul>
        <li><strong>Essential Cookies:</strong> Necessary for the website to function properly. These include login authentication, cart management, and security-related features.</li>
        <li><strong>Performance Cookies:</strong> Help us analyze how visitors interact with our website, identifying popular pages and areas that need improvement.</li>
        <li><strong>Functional Cookies:</strong> Remember your preferences, such as saved addresses and selected cooks, to offer a seamless experience.</li>
        <li><strong>Marketing & Advertising Cookies:</strong> Used to display personalized ads based on your interests and previous interactions with our site.</li>
        <li><strong>Third-Party Cookies:</strong> Some external services (like payment gateways and analytics tools) may place cookies on your device to track usage.</li>
    </ul>

    <h3>3. Types of Cookies We Use</h3>
    <p>Below is a breakdown of the types of cookies we use:</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type of Cookie</th>
                <th>Purpose</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Session Cookies</strong></td>
                <td>Ensure the website functions properly while you navigate.</td>
                <td>Deleted after you close your browser.</td>
            </tr>
            <tr>
                <td><strong>Persistent Cookies</strong></td>
                <td>Store preferences and settings for future visits.</td>
                <td>Remain on your device until manually deleted.</td>
            </tr>
            <tr>
                <td><strong>First-Party Cookies</strong></td>
                <td>Set by our website to provide a customized experience.</td>
                <td>Varies depending on the type of cookie.</td>
            </tr>
            <tr>
                <td><strong>Third-Party Cookies</strong></td>
                <td>Used by external services like analytics and payment processors.</td>
                <td>Varies based on provider policies.</td>
            </tr>
        </tbody>
    </table>

    <h3>4. How to Manage or Disable Cookies</h3>
    <p>You have full control over how cookies are used on your device. You can:</p>
    <ul>
        <li>Modify browser settings to accept, reject, or delete cookies.</li>
        <li>Use "Do Not Track" settings in your browser to limit tracking.</li>
        <li>Opt-out of third-party cookies from analytics and advertising networks.</li>
    </ul>

    <p>To manage cookies in popular browsers:</p>
    <ul>
        <li><strong>Google Chrome:</strong> Settings → Privacy & Security → Cookies and other site data</li>
        <li><strong>Mozilla Firefox:</strong> Preferences → Privacy & Security → Cookies and Site Data</li>
        <li><strong>Safari:</strong> Preferences → Privacy → Manage Website Data</li>
        <li><strong>Microsoft Edge:</strong> Settings → Site permissions → Cookies and site data</li>
    </ul>

    <h3>5. Third-Party Services and Cookies</h3>
    <p>We use third-party tools to enhance user experience and improve our services. These services may place cookies on your device, including:</p>
    <ul>
        <li><strong>Google Analytics:</strong> Tracks website usage and visitor insights.</li>
        <li><strong>Payment Processors (e.g., PayPal, Stripe):</strong> Secure transactions and fraud prevention.</li>
        <li><strong>Social Media Plugins (Facebook, Twitter, Instagram):</strong> Enable sharing and engagement.</li>
    </ul>
    <p>We do not control these cookies, and their policies may differ from ours.</p>

    <h3>6. Changes to This Cookies Policy</h3>
    <p>We may update this Cookies Policy to reflect changes in technology, law, or business practices. Any updates will be posted on this page with the latest revision date.</p>

    <h3>7. Contact Us</h3>
    <p>If you have any questions about our Cookies Policy or how we use cookies, feel free to reach out:</p>
    <p><i class="fa fa-envelope"></i> Email: <a href="mailto:admin@gmail.com">admin@gmail.com</a></p>
    <p><i class="fa fa-phone"></i> Phone: +91 9334567890</p>
    <p><i class="fa fa-map-marker-alt"></i> Address: Memnagar, Gujarat, India</p>
</div>
@endsection