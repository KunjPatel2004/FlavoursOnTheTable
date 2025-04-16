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
        
              <form name="addfoodform" id="addfoodform" @if(empty($fooditempage->id))
               action="{{url('admin/add-edit-food-item')}}" @else  action="{{url('admin/add-edit-food-item/'.$fooditempage['id'])}}"
               @endif method="post" enctype="multipart/form-data">@csrf
                <div class="card-body">
                  <div class="form-group col-md-6">
                    <label for="cook_id">Cook ID</label>
                    <input type="text" class="form-control" id="cook_id" name="cook_id" placeholder="Enter Cook Id"
                    value="{{$fooditempage['cook_id']}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name" >Food Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter food name"
                     value="{{$fooditempage['name']}}" >
                    
                  </div>
                  <div class="form-group col-md-6">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="3" id="description" name="description">@if(!empty($fooditempage['description'])) {{$fooditempage['description']}} @endif</textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price"
                    value="{{$fooditempage['price']}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="admin_image">Image</label>
                    <input type="file" name="admin_image" class="form-control" id="admin_image">
                    @if(!empty($fooditempage['image']))
                      <a target= "_blank" href="{{url('admin/images/fooditems/'.$fooditempage['image'])}}">View Image</a>
                      <input type="hidden" name="current_image" value="{{$fooditempage['image']}}">
                      @endif 
                  </div> 
                  <div class="form-group col-md-6">
                  <label for="status">Status</label>
                  <select name="status" id="status" class="form-control">
                    <option>Available</option>
                    <option>Unavailable</option>
                  </select>
                  </div>
                  <div class="form-group col-md-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
                <!-- /.card-body -->
                
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