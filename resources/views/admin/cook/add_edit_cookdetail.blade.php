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
        
              <form name="cookdetailform" id="cookdetailform" @if(empty($cookpage->id))
              action="{{url('admin/add-edit-cook-details')}}" @else  action="{{url('admin/add-edit-cook-details/'.$cookpage['id'])}}"
               @endif method="post">@csrf
                
                <div class="card-body">
                  <div class="form-group col-md-6">
                    <label for="name" >Name</label>
                    <input type="text" class="form-control" id="name" name="name" 
                     value="{{$cookpage['name']}}">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" 
                    value="{{$cookpage['email']}}"
                    @if(!empty($cookpage->email)) readonly="" @endif>
                    
                  </div>
                  
                  @if(!empty($cookpage->role))
                  <div class="form-group col-md-6">
                    <label for="role">Role</label>
                    <input type="text" class="form-control" id="role" name="role" 
                    value="{{$cookpage['role']}}" readonly="" >
                  </div>
                  @elseif(empty($cookpage->role))
                  <div class="form-group col-md-6">
                    <label for="role">Role</label>
                    <input type="text" class="form-control" id="role" name="role" value="cook" readonly="">
                  </div>
                  @endif
           

                  @if(!empty($cookpage->password))
                  <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" 
                    value="{{$cookpage['password']}}"  readonly="">
                  </div>
                  @elseif(empty($cookpage->password))
                  <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                  </div>
                  @endif
                
                  <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" 
                     value="{{$cookpage['mobile']}}" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" 
                     value="{{$cookpage['home_address']}}" >
                  </div>

                  <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" 
                     value="{{$cookpage['status']}}" >
                  </div>

                  <div class="form-group col-md-6">
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