@extends('admin.layout.layout')
@section('content')

<div class="content-wrapper"> 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order Management</h1>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            @if(Session::has('success message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success:</strong>{{ Session::get('success message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <table id="manageorder" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Cook Name</th>
                            <th>Food Items</th>
                            <th>Total Price</th>
                            <th>Ordered On</th>
                            <th>Status</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($manageorder as $manage)   
                            <tr>
                            <td>{{$manage['id']}}</td>
                            <td>{{$manage['customer_name']}}</td>
                            <td>{{$manage['cook_name']}}</td>
                            <td>{{$manage['totalfooditems']}}</td>
                            <td>{{$manage['total_price']}}</td>
                            <td>{{ $newDate = date("F j, Y, g:i a", strtotime( $manage->created_at ));}}</td>
                            <td><select  class="Ustatus"  data-id="{{$manage['id']}}">
                                <option value="pending" {{ $manage->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="preparing" {{ $manage->status == 'preparing' ? 'selected' : '' }}>Preparing</option>
                                <option value="ready" {{ $manage->status == 'ready' ? 'selected' : '' }}>Ready</option>
                                <option value="delivered" {{ $manage->status == 'delivered' ? 'selected' : '' }}>Delivered</option>

                                </select>    
                                </td>
                            <td>
                                <a style="color:#3f6ed3" class="confirmDelete" name="order" title="delete order detail"
                                    href="javascript:void(0)" record="orderdetail" recordid="{{$manage['id']}}">
                                <i class="fas fa-trash "></i></a>

                                &nbsp; &nbsp; 
                                <a href="{{url('admin/view-order-details/'.$manage['id'])}}" style="color:#3f6ed3">View details</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection