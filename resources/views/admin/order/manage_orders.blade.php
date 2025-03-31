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
            @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success:</strong> {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <table id="orders-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Food Items</th>
                                <th>Total Price</th>
                                <th>Ordered On</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($manageorder as $order)   
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    @if($order->customer)
                                        {{ $order->customer->name }} (Registered)
                                    @else
                                        {{ $order->customer_name }} (Guest)
                                    @endif
                                </td>
                                <td>{{ $order->mobile }}</td>
                                <td>{{ $order->address }}</td>
                                <td>
                                    @foreach($order->orderItems as $item)
                                        {{ $item->foodItem->name }} (x{{ $item->quantity }}) <br>
                                    @endforeach
                                </td>
                                <td>₹{{ number_format($order->total_price, 2) }}</td>
                                <td>{{ date("F j, Y, g:i a", strtotime($order->created_at)) }}</td>
                                <td>
                                <select class="status-dropdown" data-id="{{ $order->id }}">
                                    <option value="order placed" {{ $order->status == 'order placed' ? 'selected' : '' }}>Order Placed</option>
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="preparing" {{ $order->status == 'preparing' ? 'selected' : '' }}>Preparing</option>
                                    <option value="ready" {{ $order->status == 'ready' ? 'selected' : '' }}>Ready</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                </select>
                                
                                </td>
                                <td>
                                    <a style="color:#3f6ed3" class="confirmDelete" name="order" title="Delete order"
                                        href="javascript:void(0)" record="order" recordid="{{ $order->id }}">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    &nbsp; &nbsp; 
                                    <a href="{{ url('admin/view-order-details/'.$order->id) }}" style="color:#3f6ed3">
                                        View details
                                    </a>
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