<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">

        {{-- LOGO (KLIK → LANDING PAGE) --}}
        <div class="sidebar-header text-center py-3">
            <a href="{{ route('frontend.index') }}" class="d-inline-block">
                <img
                    src="{{ asset('images/logoo.png') }}"
                    alt="SIPLUSPLUS"
                    style="height:120px; object-fit:contain;"
                >
            </a>
        </div>

        {{-- USER INFO --}}
        <div class="px-3 mb-3 text-center">
            <strong>Halo, {{ auth()->user()->name }}!</strong>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-title">Menu</li>

                {{-- ================= USER ================= --}}
                @role('user')
                    <li class="sidebar-item">
                        <a href="{{ route('frontend.user.dashboard') }}" class="sidebar-link">
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('frontend.user.course.index') }}" class="sidebar-link">
                            <i class="bi bi-book-fill"></i>
                            <span>Kursus Saya</span>
                        </a>
                    </li>

                    {{-- DUMMY: NILAI --}}
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-bar-chart-fill"></i>
                            <span>Nilai</span>
                        </a>
                    </li>

                    {{-- DUMMY: SERTIFIKAT --}}
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-patch-check-fill"></i>
                            <span>Sertifikat</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('frontend.user.transaction.index') }}" class="sidebar-link">
                            <i class="bi bi-cash"></i>
                            <span>Riwayat Transaksi</span>
                        </a>
                    </li>
                @endrole

                {{-- ================= MITRA ================= --}}
                @role('mitra')
                    <li class="sidebar-item">
                        <a href="{{ route('mitra.dashboard') }}" class="sidebar-link">
                            <i class="bi bi-briefcase-fill"></i>
                            <span>Dashboard Mitra</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('mitra.course.index') }}" class="sidebar-link">
                            <i class="bi bi-book-fill"></i>
                            <span>Kursus</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('mitra.transaction.index') }}" class="sidebar-link">
                            <i class="bi bi-receipt"></i>
                            <span>Transaksi</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('mitra.wallet.index') }}" class="sidebar-link">
                            <i class="bi bi-wallet2"></i>
                            <span>Wallet</span>
                        </a>
                    </li>
                @endrole

                {{-- LOGOUT --}}
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
