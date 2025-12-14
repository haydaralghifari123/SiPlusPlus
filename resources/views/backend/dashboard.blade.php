@extends('layouts.backend.app')

@section('content')

<style>
    .dashboard-card {
        background: #0F1A44;
        color: white;
        padding: 25px;
        border-radius: 10px;
        text-align: center;
        font-weight: 600;
    }

    .dashboard-card h2 {
        font-size: 45px;
        font-weight: 700;
        margin: 0;
    }

    .dashboard-card span {
        font-size: 18px;
        opacity: 0.9;
    }

    .chart-box {
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0px 2px 8px rgba(0,0,0,0.05);
        margin-bottom: 30px;
    }
</style>

<div class="container-fluid">

    {{-- JUDUL DASHBOARD --}}
    <h2 class="fw-bold mb-4" style="font-size:32px;">Dashboard</h2>

    {{-- STATISTIK MAIN --}}
    <div class="row g-3 mb-4">

        <div class="col-lg-4 col-md-6">
            <div class="dashboard-card">
                <span>Total Kursus</span>
                <h2>{{ $data['total_course'] }}</h2>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="dashboard-card">
                <span>Total Member</span>
                <h2>{{ $data['total_user'] }}</h2>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="dashboard-card">
                <span>Total Mentor</span>
                <h2>{{ $data['total_mitra'] }}</h2>
            </div>
        </div>

    </div>

    {{-- CHART MEMBERSHIP --}}
    <div class="chart-box">
        <h5 class="fw-bold mb-3 text-center">Data Membership</h5>
        <canvas id="membershipChart" height="120"></canvas>
    </div>

    <div class="row">
        {{-- CHART AKSES KURSUS --}}
        <div class="col-lg-6">
            <div class="chart-box">
                <h5 class="fw-bold mb-3 text-center">Data Akses Kursus</h5>
                <canvas id="courseAccessChart" height="120"></canvas>
            </div>
        </div>

        {{-- CHART AKSES MATERI --}}
        <div class="col-lg-6">
            <div class="chart-box">
                <h5 class="fw-bold mb-3 text-center">Data Akses Materi</h5>
                <canvas id="materialAccessChart" height="120"></canvas>
            </div>
        </div>
    </div>

</div>

@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Chart Dummy (boleh diganti data asli)
    const ctx1 = document.getElementById('membershipChart');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
            datasets: [
                { label: 'Dataset 1', backgroundColor: '#FFEFAA', borderColor: '#FFDD55', data: [300, 500, 800, 600, 900, 400] },
                { label: 'Dataset 2', backgroundColor: '#C5C4FF', borderColor: '#6765FF', data: [200, 700, 900, 800, 200, 300] }
            ]
        }
    });

    // Chart Pie 1
    new Chart(document.getElementById('courseAccessChart'), {
        type: 'pie',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{ data: [12, 19, 3, 5, 2, 3] }]
        }
    });

    // Chart Pie 2
    new Chart(document.getElementById('materialAccessChart'), {
        type: 'pie',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{ data: [10, 14, 6, 3, 5, 4] }]
        }
    });
</script>
@endpush
