@extends('admin.layout.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
          @if ($errors->any())
           <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
           </div>
          @endif
              <form name="addfoodform" id="addfoodform" @if(empty($fooditempage['id']))
               action="{{url('admin/add-edit-food-item')}}" @else  action="{{url('admin/add-edit-food-item/'.$fooditempage['id'])}}"
               @endif method="post">@csrf
                <div class="card-body">
                  <div class="form-group col-md-6">
                    <label for="cook_id">Cook ID</label>
                    <input type="text" class="form-control" id="cook_id" name="cook_id" placeholder="Enter Cook Id"
                    @if(!empty($fooditempage['cook_id'])) value="{{$fooditempage['cook_id']}}" @endif>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Food Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter food name"
                    @if(!empty($fooditempage['name'])) value="{{$fooditempage['name']}}" @endif>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter Description">
                    @if(!empty($fooditempage['description'])) {{$fooditempage['description']}} @endif</textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price"
                     @if(!empty($fooditempage['price'])) value="{{$fooditempage['price']}}" @endif>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    <!-- @if(!empty(Auth::guard('food_item')->user()->image))
                      <a target= "_blank" href="{{url('admin/images/fooditems/'.Auth::guard('food_item')->user()->image)}}">View Image</a>
                      <input type="hidden" name="current_image" value="{{Auth::guard('food_item')->user()->image}}">
                      @endif -->
                  </div> 
                  <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" placeholder=""
                    @if(!empty($fooditempage['status'])) value="{{$fooditempage['status']}}" @endif>
                  </div>
                </div>
                <!-- /.card-body -->

                <div >
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer"></div>
        </div>
        <!-- /.card -->   
          
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection