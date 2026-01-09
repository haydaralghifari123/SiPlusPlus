@extends('layouts.frontend.app')

{{-- =========================
|  NAVBAR LOKAL (KHUSUS PAGE INI)
|  TIDAK TERGANTUNG NAVBAR GLOBAL
========================= --}}
@section('navbar')
<nav class="w-full bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

        {{-- LOGO --}}
        <a href="/" class="flex items-center gap-2">
            <img src="{{ asset('mazer/assets/images/logo/logo.png') }}" class="h-8">
        </a>

        {{-- MENU --}}
        <div class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-700">
            <a href="/" class="hover:text-blue-700">Beranda</a>
            <a href="/#kursus" class="hover:text-blue-700">Kursus</a>
            <a href="/info" class="hover:text-blue-700">Info</a>
        </div>

        {{-- ACTION --}}
        <div>
            @auth
                <a href="{{ route('frontend.user.dashboard') }}"
                   class="px-4 py-2 bg-blue-700 text-white rounded text-sm">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="text-sm hover:underline">
                    Login
                </a>
            @endauth
        </div>

    </div>
</nav>
@endsection

{{-- =========================
|  CONTENT
========================= --}}
@section('content')
<div class="container my-5">

    {{-- BREADCRUMB (AMAN, TANPA ROUTE FIKTIF) --}}
    <nav class="mb-4 text-muted text-sm">
        <a href="/" class="text-decoration-none">Beranda</a>
        &nbsp;›&nbsp;
        <a href="/#kursus" class="text-decoration-none">Kursus</a>
        &nbsp;›&nbsp;
        <strong>{{ $data['course']['name'] }}</strong>
    </nav>

    <div class="row g-4">

        {{-- LEFT CONTENT --}}
        <div class="col-lg-8 col-md-7">

            {{-- VIDEO --}}
            <div class="card mb-4 shadow-sm">
                <iframe
                    class="w-100 rounded-top"
                    height="420"
                    src="https://www.youtube.com/embed/{{ $data['course']['detail'][0]['link'] }}"
                    allowfullscreen>
                </iframe>
            </div>

            {{-- TITLE --}}
            <h1 class="fw-bold mb-2">{{ $data['course']['name'] }}</h1>

            <p class="text-muted mb-4">
                {{ $data['course']['short_description'] ?? 'Pelajari materi secara bertahap dan terstruktur.' }}
            </p>

            {{-- INFO --}}
            <div class="row text-center mb-4">
                <div class="col-4">
                    ⭐⭐⭐⭐☆
                    <div class="small text-muted">4.0 / 5.0</div>
                </div>
                <div class="col-4">
                    👥
                    <div class="small text-muted">100 Peserta</div>
                </div>
                <div class="col-4">
                    📈
                    <div class="small text-muted">Pemula</div>
                </div>
            </div>

            {{-- TABS --}}
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#description">
                        Deskripsi
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#materi">
                        Materi
                    </button>
                </li>
            </ul>

            <div class="tab-content border rounded p-4 bg-white">
                <div class="tab-pane fade show active" id="description">
                    {!! $data['course']['description'] !!}
                </div>

                <div class="tab-pane fade" id="materi">
                    <h6 class="mb-3">
                        {{ $data['course']['total_video'] }}
                        ({{ $data['course']['total_duration'] }})
                    </h6>

                    @foreach ($data['course']['detail'] as $detail)
                        <div class="alert alert-secondary mb-2">
                            ▶ {{ $detail->number }}. {{ $detail->name }}
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- RIGHT SIDEBAR --}}
        <div class="col-lg-4 col-md-5">
            <div class="card shadow-sm sticky-top" style="top: 90px">
                <div class="card-body">

                    <h4 class="fw-bold mb-3">Daftar Sekarang</h4>

                    <div class="mb-3">
                        ⏱ <strong>Durasi</strong><br>
                        <small class="text-muted">{{ $data['course']['total_duration'] }}</small>
                    </div>

                    <div class="mb-3">
                        🎓 <strong>Sertifikat</strong><br>
                        <small class="text-muted">Sertifikat penyelesaian</small>
                    </div>

                    <div class="mb-3">
                        🎥 <strong>Format</strong><br>
                        <small class="text-muted">Video, kuis, dan proyek akhir</small>
                    </div>

                    <hr>

                    <h3 class="fw-bold text-primary mb-4">
                        {{ $data['course']['price_rupiah'] }}
                    </h3>

                    {{-- FORM TRANSAKSI (LOGIC ASLI TETAP) --}}
                    <form action="{{ route('user.transaction.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $data['course']['id'] }}">

                        @auth
                            @php
                                $userCourse = auth()->user()
                                    ->UserCourse()
                                    ->pluck('course_id')
                                    ->toArray();
                            @endphp

                            @if (!in_array($data['course']['id'], $userCourse))
                                <button type="submit" class="btn btn-primary w-100 py-3 fw-semibold">
                                    Beli Sekarang
                                </button>
                            @else
                                <a href="{{ route('frontend.user.course.index') }}"
                                   class="btn btn-success w-100 py-3 fw-semibold">
                                    Lanjutkan Belajar
                                </a>
                            @endif
                        @else
                            <button type="submit" class="btn btn-primary w-100 py-3 fw-semibold">
                                Beli Sekarang
                            </button>
                        @endauth
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
