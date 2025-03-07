@extends('admin.layout.layout')
@section('content')

<div class="content-wrapper"> 
    <div class="content-header">
        <div class="container-fluid">
        <h1 class="mt-3">Manage Customer
            <a href="{{url('admin/add-edit-customer-details')}}" class="btn btn-success float-right">Add Customer</a>
            </h1>   
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
                    <table id="managecustomerpage" class="table table-bordered table-striped">
                        <thead>
    
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($customerdetails as $detail)
                            <tr>
                                <td>{{$detail['id']}}</td>
                                <td>{{$detail['name']}}</td>
                                <td>{{$detail['email']}}</td>
                                <td>{{$detail['mobile']}}</td>
                                <td>{{$detail['home_address']}}</td>
                                <td>
                      
                                @if($detail['status']==1)   
                                    <a class="updateCustomerStatus" id="page-{{ $detail['id'] }}"
                                    page_id="{{ $detail['id'] }}" style="color:#3f6ed3" href="javascript:void(0)">
                                    <i class="fas fa-toggle-on" status="Active"></i></a>
                                @else
                                <a class="updateCustomerStatus" id="page-{{ $detail['id'] }}"
                                    page_id="{{ $detail['id'] }}" style="color:grey" href="javascript:void(0)">
                                    <i class="fas fa-toggle-off" status="Inactive"></i></a>
                                @endif
                               
                                &nbsp; &nbsp;
                                <a style="color:#3f6ed3" class="confirmDelete" name="customer" title="delete customer"
                                 href="javascript:void(0)" record="customer" recordid="{{$detail['id']}}" 
                              <?php  /* href="{{url('admin/delete-customer/'.$detail['id'])}}"*/?>>
                                <i class="fas fa-trash "></i>&nbsp; Delete</a>
                                
                                &nbsp; &nbsp; 
                                <a href="{{url('admin/add-edit-customer-details/'.$detail['id'])}}" style="color:#3f6ed3">View details</a>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                
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