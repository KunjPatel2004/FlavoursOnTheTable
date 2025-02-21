 @extends('admin.layout.layout')
@section('content')


<div class="content-wrapper"> 
<div class="container-fluid">
    <h2>Cook Dashboard</h2>
    <a href="{{url('admin/add-edit-food-item')}}" class="btn btn-success">Add New Food Item</a>
  
    @if(Session::has('success message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Success:</strong>{{ Session::get('success message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
             </div>
          @endif
    <h3 class="mt-4">Your Food Listings</h3>
    <div class="card">
    <div class="card-body">
    <table id="ordertable" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Cook ID</th>
            <th>Food Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Availability</th>
        </tr>
       </thead>
       <tbody>
            @foreach($Fooditem as $page)
        <tr>
            <td>{{$page['cook_id']}}</td>
            <td>{{$page['name']}}</td>
            <td>{{$page['image']}}</td>
            <td>{{$page['description']}}</td>
            <td>{{$page['price']}}</td>
            <td>{{$page['status']}}</td>
        </tr>
            @endforeach
    </tbody>
    </table>
   </div>
  </div>
</div>
</div>
@endsection 

