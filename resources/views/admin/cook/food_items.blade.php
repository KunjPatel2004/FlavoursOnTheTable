 @extends('admin.layout.layout')
@section('content')


<div class="content-wrapper"> 
<div class="container-fluid">
    <h2>Cook Dashboard</h2>
   
  
    @if(Session::has('success message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Success:</strong>{{ Session::get('success message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
             </div>
          @endif
   
    <h3 class="mt-4">Your Food Listings
      <a href="{{url('admin/add-edit-food-item')}}" class="btn btn-success float-right">Add New Food Item</a>
    </h3> 

    <div class="card">
    <div class="card-body">
    <table id="ordertable" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Cook ID</th>
            <th>Food Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Availability</th>
            <th>Actions</th>
        </tr>
       </thead>
       <tbody>
            @foreach($Fooditem as $page)
        <tr>
            <td>{{$page['id']}}</td>
            <td>{{$page['cook_id']}}</td>
            <td>{{$page['name']}}</td>
            <td><img style="width:80px; margin:10px;"src="{{asset('admin/images/fooditems/'.$page['image'])}}"></td>
            <td>{{$page['description']}}</td>
            <td>{{$page['price']}}</td>
            <td>{{$page['status']}}</td>
            <td>
              <a href="{{url('admin/add-edit-food-item/'.$page['id'])}}" style="color:#3f6ed3">
                <i class="fas fa-edit"></i></a>
                &nbsp; &nbsp;
              <a style="color:#3f6ed3" class="confirmDelete" name="fooditem" title="delete food Item"
                href="javascript:void(0)" record="fooditem" recordid="{{$page['id']}}">
              <i class="fas fa-trash "></i></a>
            </td>
        </tr>
            @endforeach
    </tbody>
    </table>
   </div>
  </div>
</div>
</div>
@endsection 

