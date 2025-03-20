
    <div class="main-header navbar navbar-expand navbar-white navbar-light">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="navbar-brand">Flavors On The Table  </a>
            <button type="button" class="navbar-toggler" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" navbar-nav justify-content" >
                <div class="navbar-nav ml-auto">
                    @if(Session::get('page') == "home")
                      @php $active = "active" @endphp
                     @else
                      @php $active = "" @endphp
                    @endif
                    <a href="{{ url('/') }}" class="nav-item nav-link {{$active}}">Home</a>

                    <a href="{{ url('/about') }}" class="nav-item nav-link ">About</a>

                    @if(Session::get('page') == "menu")
                      @php $active = "active" @endphp
                     @else
                      @php $active = "" @endphp
                    @endif
                    <a href="{{url('/available_cooks')}}" class="nav-item nav-link {{$active}}">Menu</a>
                    <a href="{{ url('/login') }}" class="nav-item nav-link">Login</a>
                    <a href="{{ url('/register') }}" class="nav-item nav-link">Signup</a>
                    
                    
                </div>
            </div>
        </div>
        </div>


