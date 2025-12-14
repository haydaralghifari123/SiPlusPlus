
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $app_name }}</title>

    <!-- Load Vite CSS and JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Favicon -->
    <link
      rel="shortcut icon"
      href="{{ asset('mazer') }}/assets/images/logo/favicon.svg"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="{{ asset('mazer') }}/assets/images/logo/favicon.png"
      type="image/png"
    />
    
    <!-- Additional CSS -->
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/shared/iconly.css" />
  </head>

  <body>
    <div id="app">
      @include('layouts.frontend.components.navbar-new')
      <div id="main" class="layout-horizontal">
        <!-- <header class="mb-5">
          <div class="header-top">
            <div class="container">
              <div class="logo">
                <a href="index.html"
                  ><img src="{{ $app_logo }}" alt="Logo"
                /></a>
              </div>
              <div class="header-top-right">
                @auth
                <div class="dropdown">
                  <a
                    href="#"
                    id="topbarUserDropdown"
                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <div class="avatar avatar-md2">
                      <img src="{{ asset('mazer') }}/assets/images/faces/1.jpg" alt="Avatar" />
                    </div>
                    <div class="text">
                      <h6 class="user-dropdown-name">{{ auth()->user()->name }}</h6>
                      <p class="user-dropdown-status text-sm text-muted text-capitalize">
                       Member
                      </p>
                    </div>
                  </a>
                  <ul
                    class="dropdown-menu dropdown-menu-end shadow-lg"
                    aria-labelledby="topbarUserDropdown"
                  >
                    <li><a class="dropdown-item" href="{{ route('frontend.user.dashboard') }}">My Dashboard</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    
                    @auth
                    <li>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="#"  href="{{ route('logout')  }}" onclick="event.preventDefault();
                        this.closest('form').submit();">
                        <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    </form>
                    </li>
                    @endauth
                  </ul>
                </div>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                @endauth

              
                <a href="#" class="burger-btn d-block d-xl-none">
                  <i class="bi bi-justify fs-3"></i>
                </a>
              </div>
            </div>
          </div>
          <nav class="main-navbar">
            <div class="container">
              <ul>
                <li class="menu-item">
                  <a href="{{ url('/') }}" class="menu-link">
                    <span><i class="bi bi-grid-fill"></i> Home</span>
                  </a>
                </li>

                <li class="menu-item active has-sub">
                  <a href="#" class="menu-link">
                    <span><i class="bi bi-grid-1x2-fill"></i> {{ __('sidebar.category') }}</span>
                  </a>
                  <div class="submenu">
                  
                    <div class="submenu-group-wrapper">
                      <ul class="submenu-group">
                        @foreach ($global_category as $category)
                        <li class="submenu-item">
                          <a href="{{ route('frontend.category.show',$category->slug) }}" class="submenu-link">{{ $category->name }}</a>
                        </li>
                        @endforeach                         
                      </ul>
                    </div>
                  </div>
                </li>

              </ul>
            </div>
          </nav>
        </header> -->

        @if(request()->is('/'))
    {{-- LANDING PAGE TANPA CONTAINER --}}
    <div class="content-wrapper w-full px-0">
        <div class="page-content px-0">
            @yield('content')
        </div>
    </div>
@else
    {{-- HALAMAN LAIN MASIH PAKAI BOOTSTRAP CONTAINER --}}
    <div class="content-wrapper container">
        <div class="page-content">
            @yield('content')
        </div>
    </div>
@endif

        
      </div>
    </div>
    <script src="{{ asset('mazer') }}/assets/js/bootstrap.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/app.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/pages/horizontal-layout.js"></script>

    <script src="{{ asset('mazer') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('mazer') }}/assets/js/pages/dashboard.js"></script>
  </body>
</html>
