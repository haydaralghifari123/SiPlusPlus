@extends('layouts.user.app')

@section('content')

<div class="page-content">
    <section class="row">

        {{-- WELCOME CARD --}}
        <div class="col-12">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h4>Hi, {{ auth()->user()->name }}!</h4>
                    <p>
                        Lanjutkan pembelajaranmu untuk mencapai tujuanmu!
                        Kamu telah membuat kemajuan yang luar biasa.
                    </p>

                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-light">
                            ▶ Lanjutkan Belajar
                        </a>
                        <a href="#" class="btn btn-outline-light">
                            📈 Lihat Progres
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- PROGRES PEMBELAJARAN --}}
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Progres Pembelajaran</h4>
                </div>
                <div class="card-body text-center">
                    <h1 class="text-primary">85%</h1>
                    <p class="text-muted">
                        Kamu telah menyelesaikan 25 modul dari 30 modul
                    </p>
                </div>
            </div>
        </div>

        {{-- KURSUS YANG DIAKSES --}}
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>C++</h4>
                    <span class="badge bg-success">Aktif</span>
                </div>
                <div class="card-body">
                    <p>Modul 25 / 30</p>

                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary" style="width:85%"></div>
                    </div>

                    <small class="text-muted">Deadline: 30 Des</small>

                    <div class="mt-3">
                        <button class="btn btn-primary w-100">
                            ▶ Lanjutkan Belajar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- NILAI TERAKHIR --}}
        <div class="col-xl-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Nilai Terakhir</h4>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        <h6>Kuis</h6>
                        <h2>90</h2>
                    </div>
                    <div>
                        <h6>Tugas Akhir</h6>
                        <h2>0</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- TOMBOL BERGABUNG MENJADI MITRA --}}
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5>Ingin menjadi Mitra?</h5>
                    <p class="text-muted">
                        Bergabung sebagai mitra dan mulai mengajar sekarang.
                    </p>

                    <a href="{{ route('frontend.mitra.register.index') }}"
                       class="btn btn-outline-primary">
                        + Bergabung Menjadi Mitra
                    </a>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection
