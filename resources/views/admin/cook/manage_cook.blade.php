@extends('admin.layout.layout')
@section('content')

<div class="content-wrapper"> 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Cook</h1>
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
                    <table id="managecook" class="table table-bordered table-striped">
                        <thead>
    
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th colspan=2>Actions</th>
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