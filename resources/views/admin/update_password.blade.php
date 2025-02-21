@extends('admin.layout.layout')
@section('content')

<div class="content-wrapper">

   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Admin Password</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <div class="col-md-6">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Admin Password</h3>
              </div>
          
    @if(Session::has('error message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong>{{ Session::get('error message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif
    @if(Session::has('success message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success:</strong>{{ Session::get('success message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif
              
              <form method="post" action="{{url('admin/update_password')}}">@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="admin_email">Email address</label>
                    <input  class="form-control" id="admin_email" 
                    value="{{Auth::guard('admin')->user()->email}}" readonly="" style="background-color:white">
                  </div>
                  <div class="form-group">
                    <label for="current_pwd">Current Password</label>
                    <input type="password" class="form-control" name="current_pwd" id="current_pwd" placeholder="Current Password">
                    <span id="verifyCurrentPwd"></span>
                  </div>
                  <div class="form-group">
                    <label for="new_pwd">New Password</label>
                    <input type="password" name="new_pwd" class="form-control" id="new_pwd" placeholder=" New Password">
                  </div>
                 
                  <div class="form-group">
                    <label for="confirm_pwd">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password">
                  </div>
                </div>
               

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            

   
   @endsection