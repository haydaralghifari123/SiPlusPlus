@extends('layouts.user.app')

@section('title', 'Dashboard Mitra')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Tugas Perlu Dinilai</h6>
                <h3>10</h3>
                <small class="text-danger">3 tugas baru</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Rating Rata-Rata</h6>
                <h3>4.5</h3>
                <small class="text-success">↑ 5% meningkat</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Kursus Saya</h6>
                <h3>2</h3>
                <small class="text-success">↑ 1 kursus baru</small>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <h4>Kursus Saya</h4>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5>C++</h5>
                <p>Member: 100</p>
                <p>Rating: 4.5</p>
                <p>Tugas Belum Dinilai: 5</p>

                <a href="#" class="btn btn-primary">Penilaian</a>
                <a href="#" class="btn btn-outline-secondary">Detail</a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5>Python</h5>
                <p>Member: 100</p>
                <p>Rating: 4.5</p>
                <p>Tugas Belum Dinilai: 5</p>

                <a href="#" class="btn btn-primary">Penilaian</a>
                <a href="#" class="btn btn-outline-secondary">Detail</a>
            </div>
        </div>
    </div>
</div>
@endsection
