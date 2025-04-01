<div class="main-header navbar navbar-expand-lg bg-light navbar-light">
    <div class="container-fluid">
        <a href="{{ url('/') }}" class="navbar-brand">Flavors On The Table</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{ url('/') }}" class="nav-item nav-link {{ Session::get('page') == 'home' ? 'active text-warning' : '' }}">Home</a>
                <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                <a href="{{ url('/available_cooks') }}" class="nav-item nav-link {{ Session::get('page') == 'menu' ? 'active text-warning' : '' }}">Menu</a>
                <a href="#" class="nav-link d-flex align-items-center"
                 id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-1"></i>@if(Auth::check()){{Auth::user()->name}} @endif
                    </a>
              
                <div class="nav-item dropdown">
                   
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 animate__animated animate__fadeIn  rounded-3">
                        
                        <li><hr class="dropdown-divider"></li>
                        
                        @if(Auth::check())
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{url('/customer/update_account')}}">
                            <i class="fas fa-user-circle me-2 text-primary"></i>My Account
                            </a>
                               
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center text-danger" href="{{url('/customer/logout')}}">
                                <i class="fas fa-sign-out-alt me-2"></i> Signout
                            </a>
                        </li>
                        @else
                     
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('/customer/register') }}">
                                    <i class="fas fa-user-plus me-2 text-success"></i> Signup
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('/customer/login') }}">
                                    <i class="fas fa-sign-in-alt me-2 text-info"></i> Signin
                                </a>
                            </li>
                     @endif
                    </ul>
                </div>

                <!-- Cart Icon with Badge -->
                <a href="{{ route('cart') }}" class="nav-item nav-link position-relative">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
                </a>
            </div>
        </div>
    </div>
</div>
