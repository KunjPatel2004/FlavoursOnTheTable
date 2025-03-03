<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="font-weight-light">Flavours On The Table</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb  -3 mb-3 d-flex">
        <div class="image">
        @if(!empty(Auth::guard('admin')->user()->image))
          <img src="{{asset('admin/images/photos/'.Auth::guard('admin')->user()->image) }}"
          class="img-circle" alt="User Image">
        @else
          <img src="{{asset('admin/images/no-image.png') }}" class="img-circle elevation-2" 
          alt="User Image">
        @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
        </div>
      </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Session::get('page')=="dashboard")
             @php $active = "active" @endphp
          @else
             @php $active = "" @endphp
        @endif
        <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{$active
            }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
        </li>

        @if(Session::get('page')=="update_password" || Session::get('page')=="update_details" )
             @php $active = "active" @endphp
          @else
             @php $active = "" @endphp
        @endif

        <li class="nav-item menu-open">
            <a href="#" class="nav-link {{$active}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
            @if(Session::get('page')=="update_password")
                @php $active = "active" @endphp
             @else
                @php $active = "" @endphp
            @endif
           <li class="nav-item">
              <a href="{{url('admin/update_password')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Password</p>
              </a>
            </li>
            @if(Session::get('page')=="update_details")
                @php $active = "active" @endphp
             @else
                @php $active = "" @endphp
            @endif
              <li class="nav-item">
                <a href="{{url('admin/update-details')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Details</p>
                </a>
              </li>
            </ul>
          </li>

          @if(Session::get('page')=="cook_details")
              @php $active = "active" @endphp
            @else
              @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="{{url('admin/cook-details')}}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Manage Cooks
              </p>
            </a>
        </li>

          @if(Session::get('page')=="customer_details")
              @php $active = "active" @endphp
            @else
              @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="{{url('admin/customer-details')}}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Manage Customers
              </p>
            </a>
        </li>

        @if(Session::get('page')=="manage_orders")
              @php $active = "active" @endphp
            @else
              @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="{{url('admin/manage_order')}}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Manage Orders
              </p>
            </a>
        </li>

        @if(Session::get('page')=="food_item")
              @php $active = "active" @endphp
            @else
              @php $active="" @endphp
          @endif
          <li class="nav-item">
            <a href="{{url('admin/food_items')}}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Food Items
              </p>
            </a>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>