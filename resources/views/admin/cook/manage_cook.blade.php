@extends('admin.layout.layout')
@section('content')

<div class="content-wrapper"> 
    <div class="container-fluid">
        <div class="content-header">      
            <h1 class="mt-3">Manage Cook
            <a href="{{url('admin/add-edit-cook-details')}}" class="btn btn-success float-right">Add Cook</a>
            </h1>           
        </div>
    
        <!-- Main content -->
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
                        <table id="managecook" class="table table-bordered table-striped">
                        <thead>

                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($cookdetails as $detail)
                            <tr>
                                <td>{{$detail['id']}}</td>
                                <td>{{$detail['name']}}</td>
                                <td>{{$detail['mobile']}}</td>
                                <td>{{$detail['email']}}</td>
                                <td>{{$detail['home_address']}}</td>
                                <td>
                                    <a href="{{url('admin/add-edit-cook-details/'.$detail['id'])}}" style="color:#3f6ed3">
                                        <i class="fas fa-edit"></i></a>
                                        &nbsp; &nbsp;
                                    <a style="color:#3f6ed3" class="confirmDelete" name="cook" title="delete cook detail"
                                        href="javascript:void(0)" record="cookdeatil" recordid="{{$detail['id']}}">
                                    <i class="fas fa-trash "></i></a>
                                </td>
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
        <!-- Main Content -->           
    </div><!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection