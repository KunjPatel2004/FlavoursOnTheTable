<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flavours On The Table| Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('admin/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Register</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new account</p>

      <form id="cookForm" action="javascript:;" method="POST">
      @csrf
      <div class="mb-3">
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
          <p id="cook-name"></p>
      </div>

      
      <div class="mb-3">
          <select name="food_category"  id="food_category" name="food_category" class="form-control" >
              <option value="">Select Category</option>
              <option value="veg" >Veg</option>
              <option value="non-veg">Non-Veg</option>
              <option value="both">Both</option>
          </select>   
      </div>
      <div class="mb-3">
          <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
          <p id="cook-email"></p>
      </div>

      <div class="mb-3">
          <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile Number">
          <p id="cook-mobile"></p>
      </div>

      <div class="mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
          <p id="cook-password"></p>
      </div>

      <button type="submit" class="btn btn-primary w-100">Sign up</button>
      </form>

      <div class="text-center mt-3">
          <p class="text-muted">Already have an account? 
              <a href="{{ url('/admin/login') }}" class="text text-decoration-none fw-bold">Login</a>
          </p>
      </div>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{url('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('admin/js/adminlte.min.js')}}"></script>
</body>
</html>
