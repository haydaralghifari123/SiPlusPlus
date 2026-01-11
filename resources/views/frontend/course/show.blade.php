@extends('layouts.frontend.app')

@section('content')

<style>
/* ================= RESET RINGAN ================= */
.course-wrapper * {
    box-sizing: border-box;
    font-family: Inter, Arial, sans-serif;
}

.course-wrapper {
    max-width: 1200px;
    margin: 30px auto;
    padding: 0 20px;
}

/* ================= BREADCRUMB ================= */
.breadcrumb {
    font-size: 14px;
    color: #666;
    margin-bottom: 20px;
}

/* ================= LAYOUT ================= */
.course-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
}

@media (max-width: 900px) {
    .course-grid {
        grid-template-columns: 1fr;
    }
}

/* ================= VIDEO ================= */
.video-box iframe {
    width: 100%;
    height: 420px;
    border-radius: 10px;
    border: none;
}

/* ================= TITLE ================= */
.course-title {
    font-size: 26px;
    font-weight: 700;
    margin: 15px 0 5px;
}

.course-desc {
    color: #555;
    margin-bottom: 20px;
}

/* ================= STATS ================= */
.course-stats {
    display: flex;
    gap: 30px;
    margin-bottom: 25px;
    font-size: 14px;
}

.course-stats div {
    text-align: center;
    color: #444;
}

/* ================= TABS ================= */
.tabs {
    display: flex;
    gap: 20px;
    border-bottom: 1px solid #ddd;
    margin-bottom: 15px;
}

.tab {
    padding: 10px 0;
    cursor: pointer;
    font-weight: 600;
    color: #555;
}

.tab.active {
    color: #1e40af;
    border-bottom: 2px solid #1e40af;
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

/* ================= MATERI ================= */
.materi-item {
    padding: 10px 15px;
    background: #f3f4f6;
    border-radius: 6px;
    margin-bottom: 8px;
    font-size: 14px;
}

/* ================= SIDEBAR ================= */
.sidebar {
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 20px;
    position: sticky;
    top: 80px;
}

.sidebar h3 {
    margin-bottom: 15px;
}

.sidebar-info {
    font-size: 14px;
    margin-bottom: 12px;
}

.price {
    font-size: 26px;
    font-weight: 700;
    color: #1e40af;
    margin: 20px 0;
}

.btn {
    display: block;
    width: 100%;
    padding: 14px;
    text-align: center;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
}

.btn-primary {
    background: #1e40af;
    color: white;
}

.btn-success {
    background: #16a34a;
    color: white;
}
</style>

<div class="course-wrapper">

    <div class="breadcrumb">
        Beranda › Kursus › <strong>{{ $data['course']['name'] }}</strong>
    </div>

    <div class="course-grid">

        {{-- ================= LEFT ================= --}}
        <div>

            <div class="video-box">
                <iframe
                    src="https://www.youtube.com/embed/{{ $data['course']['detail'][0]['link'] }}"
                    allowfullscreen>
                </iframe>
            </div>

            <div class="course-title">{{ $data['course']['name'] }}</div>

            <div class="course-desc">
                {{ $data['course']['short_description'] ?? 'Pelajari materi secara bertahap dan terstruktur.' }}
            </div>

            <div class="course-stats">
                <div>⭐ 4.0 / 5.0</div>
                <div>👥 100 Peserta</div>
                <div>📘 Pemula</div>
            </div>

            {{-- TABS --}}
            <div class="tabs">
                <div class="tab active" onclick="openTab('desc')">Deskripsi</div>
                <div class="tab" onclick="openTab('materi')">Materi</div>
            </div>

            <div id="desc" class="tab-content active">
                {!! $data['course']['description'] !!}
            </div>

            <div id="materi" class="tab-content">
                @foreach ($data['course']['detail'] as $detail)
                    <div class="materi-item">
                        ▶ {{ $detail->number }}. {{ $detail->name }}
                    </div>
                @endforeach
            </div>

        </div>

        {{-- ================= RIGHT ================= --}}
        <div class="sidebar">

            <h3>Informasi Kursus</h3>

            <div class="sidebar-info">⏱ {{ $data['course']['total_duration'] }}</div>
            <div class="sidebar-info">🎓 Sertifikat tersedia</div>
            <div class="sidebar-info">🎥 Video pembelajaran</div>

            <div class="price">
                {{ $data['course']['price_rupiah'] }}
            </div>

            @auth
                @php
                    $userCourse = auth()->user()->UserCourse()->pluck('course_id')->toArray();
                @endphp

                @if (!in_array($data['course']['id'], $userCourse))
                    <form action="{{ route('user.transaction.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $data['course']['id'] }}">
                        <button class="btn btn-primary">Beli Sekarang</button>
                    </form>
                @else
                    <a href="{{ route('frontend.user.course.index') }}" class="btn btn-success">
                        Lanjutkan Belajar
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Beli</a>
            @endauth

        </div>
    </div>
</div>

<script>
function openTab(id) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

    event.target.classList.add('active');
    document.getElementById(id).classList.add('active');
}
</script>

@endsection
