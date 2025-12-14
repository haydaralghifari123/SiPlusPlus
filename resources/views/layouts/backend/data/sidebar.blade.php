<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">

        {{-- HEADER SIDEBAR --}}
        <div class="sidebar-header position-relative">

    <div class="text-center py-3">

        {{-- LOGO FIX (TIDAK GEPENG) --}}
        <a href="{{ route('backend.dashboard') }}">
            <img src="{{ asset('mazer/assets/images/logo/logo.png') }}"
                 alt="Logo"
                 style="height: 55px; object-fit: contain;">
        </a>

        {{-- TEXT BRAND KECIL DAN RAPI --}}
        <div class="mt-2">
            <span style="font-size: 14px; font-weight: 700; letter-spacing: 1px; display:block;">
                SIPLUSPLUS
            </span>
            <span style="font-size: 11px; color:#666; letter-spacing: 1px; display:block; margin-top: -2px;">
                CODING COURSE
            </span>
        </div>

    </div>

    {{-- HAPUS THEME TOGGLE & ICON --}}
    <div class="sidebar-toggler x text-center">
        <a href="#" class="sidebar-hide d-xl-none d-block">
            <i class="bi bi-x bi-middle"></i>
        </a>
    </div>

</div>


        {{-- MENU SIDEBAR --}}
        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-title">Menu</li>

                {{-- DASHBOARD --}}
                <li class="sidebar-item">
                    <a href="{{ route('backend.dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- MASTER SIDEBAR (DROPDOWN) --}}
                @include('layouts.backend.data.master-sidebar')

                {{-- FEATURE SIDEBAR (DROPDOWN) --}}
                @include('layouts.backend.data.feature-sidebar')

                {{-- CONFIG --}}
                <li class="sidebar-item">
                    <a href="{{ route('backend.config.index') }}" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>Config</span>
                    </a>
                </li>

            </ul>
        </div>


        {{-- TOMBOL LOGOUT DI BAGIAN PALING BAWAH --}}
        <div class="p-3" style="position: absolute; bottom: 10px; left: 0; width: 100%;">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger w-100 d-flex align-items-center justify-content-center">
                    <i class="bi bi-box-arrow-left me-2"></i> Logout
                </button>
            </form>
        </div>

    </div>
</div>
