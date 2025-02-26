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
        
              <form name="customerdetailform" id="customerdetailform" 
               action="{{url('admin/edit-customer-details/'.$customerpage['id'])}}" method="post">@csrf
                
                <div class="card-body">
                  <div class="form-group col-md-6">
                    <label for="name" >Name</label>
                    <input type="text" class="form-control" id="name" name="name" 
                     value="{{$customerpage['name']}}" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" readonly=""
                    value="{{$customerpage['email']}}">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" 
                     value="{{$customerpage['mobile']}}" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="home_address">Home Address</label>
                    <input type="text" class="form-control" id="home_address" name="home_address" 
                     value="{{$customerpage['home_address']}}" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="work_address">Work Address</label>
                    <input type="text" class="form-control" id="work_address" name="work_address" 
                     value="{{$customerpage['work_address']}}" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="address_1">Address_1</label>
                    <input type="text" class="form-control" id="address_1" name="address_1" 
                     value="{{$customerpage['address_1']}}" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="address_2">Address_2</label>
                    <input type="text" class="form-control" id="address_2" name="address_2" 
                     value="{{$customerpage['address_2']}}" >
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