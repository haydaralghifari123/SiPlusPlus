<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">

        {{-- ================= LOGO (STYLE SAMA SEPERTI USER) ================= --}}
        <div class="sidebar-header text-center py-3">
            <a href="{{ route('backend.dashboard') }}" class="d-inline-block">
                <img
                    src="{{ asset('mazer/assets/images/logo/logo.png') }}"
                    alt="SIPLUSPLUS"
                    style="height:120px; object-fit:contain;"
                >
            </a>

            
        </div>

        {{-- ================= ADMIN INFO ================= --}}
        <div class="px-3 mb-3 text-center">
            <strong>Halo, {{ auth()->user()->name }}!</strong>
        </div>

        {{-- ================= MENU ================= --}}
        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-title">Menu</li>

                {{-- DASHBOARD --}}
                <li class="sidebar-item">
                    <a href="{{ route('backend.dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- MASTER --}}
                @include('layouts.backend.data.master-sidebar')

                {{-- FEATURE --}}
                @include('layouts.backend.data.feature-sidebar')

                {{-- ================= LOGOUT (STYLE SAMA USER) ================= --}}
                <li class="sidebar-item">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="sidebar-link text-danger">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
