@extends('admin.layout.layout')
@section('content')

<div class="content-wrapper">

   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
          </div>
        </div>
      </div>
    </div>
      
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-6">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Admin Details</h3>
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
            @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
              @endif
            
              <form method="post" action="{{url('admin/update-details')}}" enctype="multipart/form-data">@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="admin_email">Email address</label>
                    <input  class="form-control" id="admin_email" 
                    value="{{Auth::guard('admin')->user()->email}}" readonly="" style="background-color: white">
                  </div>
                  <div class="form-group">
                    <label for="admin_name">Name</label>
                    <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="Name"
                    value= "{{Auth::guard('admin')->user()->name}}">
                    
                  </div>
                  <div class="form-group">
                    <label for="admin_mobile">Phone Number</label>
                    <input type="text" name="admin_mobile" class="form-control" id="admin_mobile" placeholder="Mobile"
                    value= "{{Auth::guard('admin')->user()->mobile}}">
                  </div>
 
                  <div class="form-group">
                    <label for="admin_image">Image</label>
                    <input type="file" name="admin_image" class="form-control" id="admin_image">
                    @if(!empty(Auth::guard('admin')->user()->image))
                      <a target= "_blank" href="{{url('admin/images/photos/'.Auth::guard('admin')->user()->image)}}">View Image</a>
                      <input type="hidden" name="current_image" value="{{Auth::guard('admin')->user()->image}}">
                      @endif
                  </div>

                  <div class="form-group">
                    <label for="admin_address">Address</label>
                    <input type="text" name="admin_address" class="form-control" id="admin_address" placeholder="Address"
                    value= "{{Auth::guard('admin')->user()->home_address}}">
                  </div>
                

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            

   
   @endsection