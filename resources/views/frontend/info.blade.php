<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Info | SiPlusPlus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

{{-- ================= NAVBAR ================= --}}
<nav class="bg-white shadow px-8 lg:px-20 py-4 flex justify-between items-center">
    <div class="flex items-center gap-2">
        <img src="{{ asset('mazer/assets/images/logo/logo.png') }}" class="w-10">
        <span class="font-bold text-blue-800">SiPlusPlus</span>
    </div>

    <div class="hidden md:flex gap-8 font-medium">
        <a href="{{ route('frontend.index') }}" class="hover:text-blue-800">Beranda</a>
        <a href="{{ route('frontend.index') }}#kursus" class="hover:text-blue-800">Kursus</a>
        <a href="{{ route('frontend.info') }}" class="text-blue-800 font-semibold">Info</a>
    </div>

    <div class="flex gap-3">
        <a href="{{ route('login') }}" class="px-4 py-2 border rounded">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-800 text-white rounded">Registrasi</a>
    </div>
</nav>

{{-- ================= HERO ================= --}}
<section class="bg-white py-20 px-8 lg:px-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <img src="https://illustrations.popsy.co/gray/student-at-computer.svg" class="w-full max-w-md mx-auto">

        <div>
            <h1 class="text-4xl lg:text-5xl font-bold mb-6">
                Bangun Skill Coding Bersama SiPlusPlus
            </h1>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Platform belajar pemrograman interaktif dengan mentor profesional,
                latihan real-time, dan sertifikat digital.
            </p>
            <a href="#" class="inline-block px-6 py-3 bg-blue-800 text-white rounded font-semibold">
                Mulai Belajar Sekarang
            </a>
        </div>
    </div>
</section>

{{-- ================= FEATURE ================= --}}
<section class="bg-[#162238] py-20 px-8 lg:px-20">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @php
        $features = [
            ['Belajar Fleksibel','Akses materi kapan saja dan di mana saja.','⏰'],
            ['Latihan Interaktif','Simulasi coding & tugas real-time.','💻'],
            ['Mentor Profesional','Dibimbing langsung mentor IT.','👨‍🏫'],
            ['Sertifikat Digital','Sertifikat resmi setelah kursus.','📜'],
        ];
        @endphp

        @foreach($features as $item)
        <div class="bg-white rounded-xl p-6 shadow">
            <div class="text-3xl mb-4">{{ $item[2] }}</div>
            <h3 class="font-bold text-lg mb-2">{{ $item[0] }}</h3>
            <p class="text-gray-600 text-sm">{{ $item[1] }}</p>
        </div>
        @endforeach

        <div class="bg-white rounded-xl overflow-hidden shadow">
            <img src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e" class="w-full h-48 object-cover">
            <div class="p-6 grid grid-cols-3 text-center">
                <div>
                    <h4 class="text-2xl font-bold">15+</h4>
                    <p class="text-sm text-gray-500">Kursus</p>
                </div>
                <div>
                    <h4 class="text-2xl font-bold">10+</h4>
                    <p class="text-sm text-gray-500">Mentor</p>
                </div>
                <div>
                    <h4 class="text-2xl font-bold">126+</h4>
                    <p class="text-sm text-gray-500">Member</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= FAQ ================= --}}
<section class="bg-gray-100 py-20 px-8 lg:px-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
        <div>
            <h2 class="text-3xl font-bold mb-4">FAQs</h2>
            <p class="text-gray-600 mb-6">
                Kami telah mengumpulkan jawaban dari pertanyaan yang sering diajukan.
            </p>
            <a href="#" class="inline-block px-5 py-3 bg-blue-800 text-white rounded">
                Hubungi Admin
            </a>
        </div>

        <div class="space-y-4">
            @foreach([
                'Apa itu SiPlusPlus?',
                'Bagaimana cara mengikuti kursus?',
                'Apakah cocok untuk pemula?',
                'Apakah ada sertifikat?'
            ] as $q)
            <div class="bg-white p-4 rounded shadow flex justify-between items-center">
                <span class="font-medium">{{ $q }}</span>
                <span>⌄</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= FOOTER ================= --}}
<footer class="bg-white border-t py-16 px-8 lg:px-20">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
        <div>
            <h3 class="font-bold text-blue-800 mb-2">SiPlusPlus</h3>
            <p class="text-sm text-gray-600">
                Platform belajar coding untuk masa depan digital.
            </p>
        </div>

        <div>
            <h4 class="font-semibold mb-2">Menu</h4>
            <ul class="text-sm text-gray-600 space-y-1">
                <li>Beranda</li>
                <li>Kursus</li>
                <li>Info</li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-2">Ikuti Kami</h4>
            <p class="text-sm">Instagram</p>
        </div>

        <div>
            <h4 class="font-semibold mb-2">Kantor</h4>
            <p class="text-sm text-gray-600">
                Bogor, Jawa Barat
            </p>
        </div>
    </div>

    <p class="text-center text-xs text-gray-400 mt-10">
        © 2025 SiPlusPlus. All Rights Reserved.
    </p>
</footer>

</body>
</html>
