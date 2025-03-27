<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Flavors On The Table </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="cook-customer panel" name="keywords">
        <meta content="cook-customer panel" name="description">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Favicon -->
        <link href="{{url('front/img/favicon.ico')}}" rel="icon">
 
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{url('front/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{url('front/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{url('front/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
        <link href="{{url('front/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="{{url('front/css/style.css')}}" rel="stylesheet">
    </head>

    <body>
        <!-- Nav Bar Start -->
        @include('front.layout.header')
        <!-- Nav Bar End -->
       
  
        @yield('content')

        <!-- Footer Start -->
        @include('front.layout.footer')
        <!-- Footer End -->
      
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

       


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('front/lib/easing/easing.min.js')}}"></script>
        <script src="{{url('front/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{url('front/lib/tempusdominus/js/moment.min.js')}}"></script>
        <script src="{{url('front/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
        <script src="{{url('front/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Contact Javascript File -->
        <!-- <script src="{{('front/mail/jqBootstrapValidation.min.js')}}"></script>
        <script src="{{('front/mail/contact.js')}}"></script> -->

        <!-- Template Javascript -->
        <script src="{{url('front/js/main.js')}}"></script>

        <!-- SweetAlert2 CSS & JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="{{url('front/js/cart.js')}}"></script>
        <script src="{{url('front/js/custom.js')}}"></script>
        <script src="{{url('front/js/checkout.js')}}"></script>



    </body>
</html>
