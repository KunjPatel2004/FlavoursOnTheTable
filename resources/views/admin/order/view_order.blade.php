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
              <li class="breadcrumb-item"><a href="{{url('admin/manage_order')}}">Home</a></li>
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
        
              <form name="vieworderform" id="vieworderform" @if(empty($orderpage->id))
               action="{{url('admin/view-order-details')}}" @else  action="{{url('admin/view-order-details/'.$orderpage['id'])}}"
               @endif method="post">@csrf
                <div class="card-body">
                  <div class="form-group col-md-6">
                    <label for="customer_name">Customer Name</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name"
                    value="{{$orderpage['customer_name']}}" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="cook_name">Cook Name</label>
                    <input type="text" class="form-control" id="cook_name" name="cook_name"
                    value="{{$orderpage['cook_name']}}" >
                  </div>
        
                  <div class="form-group col-md-6">
                    <label for="totalfooditems">Total Food Items</label>
                    <input type="text" class="form-control" id="totalfooditems" name="totalfooditems"
                    value="{{$orderpage['totalfooditems']}}" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="total_price">Total Price</label>
                    <input type="text" class="form-control" id="total_price" name="total_price" 
                    value="{{$orderpage['total_price']}}">
                  </div>
                  
                  <div class="form-group col-md-6">
                  <label for="status">Status</label>
                  <select name="status-dropdown" id="page-{{$orderpage['id']}}" page_id="{{$orderpage['id']}}" class="form-control">
                      <option value="pending" >Pending</option>
                      <option value="preparing">Preparing</option>
                      <option value="ready">Ready</option>
                      <option value="delivered">Delivered</option>
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