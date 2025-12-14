@extends('layouts.frontend.app')

@section('content')
{{-- Tailwind CSS jika belum ada --}}
<script src="https://cdn.tailwindcss.com"></script>



{{-- HERO SECTION --}}
<section class="w-full bg-[#0B2447] text-white px-8 lg:px-20 py-20 relative">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
        
        {{-- LEFT TEXT --}}
        <div>
            <h2 class="text-4xl lg:text-6xl font-bold mb-6 leading-tight">
                SiPlusPlus <br>
                Kuasai Dunia Teknologi
            </h2>

            <p class="text-lg mb-8 text-gray-300">
                Tingkatkan kemampuan coding dan buka peluang karier baru di industri digital.
            </p>

            <div class="flex gap-4">
                <a href="#kursus" 
                   class="px-6 py-3 bg-white text-[#0B2447] font-semibold rounded shadow hover:bg-gray-200 transition">
                    Lihat Kursus
                </a>

                <a href="#" 
                   class="px-6 py-3 bg-transparent border border-white font-semibold rounded hover:bg-white hover:text-[#0B2447] transition">
                    Daftar Mentor
                </a>
            </div>
        </div>

        {{-- HERO IMAGE --}}
        <div class="flex justify-center">
            <img src="{{ asset('depan/image/support-team.svg') }}" class="w-96 lg:w-[32rem]">
        </div>

    </div>

</section>

{{-- KURSUS POPULER --}}
<section id="kursus" class="px-8 lg:px-20 py-20">

    <div class="flex justify-between items-center mb-10">
        <h2 class="text-3xl font-bold text-gray-800">Kursus Populer</h2>
        <a href="#" class="flex items-center text-blue-800 font-semibold">
            Lihat Semua Kursus &nbsp; →
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach ($data['course'] as $course)
        <div class="border rounded-xl overflow-hidden bg-white shadow hover:shadow-lg transition">
            
            {{-- Gambar --}}
            <img src="{{ $course->image_path }}" class="w-full h-52 object-cover">

            <div class="p-5">
                <h3 class="text-xl font-bold text-gray-800 mb-1">
                    {{ $course['name'] }}
                </h3>

                <p class="text-lg font-semibold mb-4 text-gray-700">
                    {{ $course['price_rupiah'] }}
                </p>

                {{-- Rating / Student --}}
                <div class="flex justify-between text-sm text-gray-500 mb-4">
                    <span>⭐ 4.0</span>
                    <span>👥 100</span>
                </div>

                {{-- Button --}}
                <a href="{{ route('frontend.course.show', [
                        'mitraSlug' => $course['mitra']['slug'],
                        'courseSlug' => $course['slug'],
                    ]) }}" 
                   class="block text-center w-full py-2 bg-blue-800 text-white rounded hover:bg-blue-900 transition">
                    Beli Kursus
                </a>
            </div>
        </div>
        @endforeach

    </div>
</section>

{{-- TESTIMONI --}}
<section class="px-8 lg:px-20 py-20 bg-gray-50">
    
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">
        Testimoni
    </h2>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        {{-- Card Contoh 1 --}}
        <div class="border rounded-xl overflow-hidden bg-white shadow">
            <img src="https://via.placeholder.com/800x400" class="w-full h-64 object-cover">
            
            <div class="p-6">
                <h3 class="text-xl font-bold mb-2">Lalisa M.</h3>
                <p class="text-gray-700 mb-4">Mahasiswa - Member Kelas C++</p>

                <p class="text-gray-600 mb-6">
                    Dulu takut ngoding, sekarang jadi seru dan ketagihan! Lisa dulu bukan dari jurusan IT,
                    tapi ingin beralih karier ke dunia teknologi.
                </p>

                <a href="#" class="px-6 py-2 bg-blue-800 text-white rounded hover:bg-blue-900 transition">
                    Baca Selengkapnya
                </a>
            </div>
        </div>

        {{-- Card Contoh 2 --}}
        <div class="border rounded-xl overflow-hidden bg-white shadow">
            <img src="https://via.placeholder.com/800x400" class="w-full h-64 object-cover">
            
            <div class="p-6">
                <h3 class="text-xl font-bold mb-2">Haydar Alghifari</h3>
                <p class="text-gray-700 mb-4">Mahasiswa - Member Kelas C#</p>

                <p class="text-gray-600 mb-6">
                    Dulu takut ngoding, sekarang jadi seru dan ketagihan! Haydar ingin beralih karier ke dunia teknologi.
                </p>

                <a href="#" class="px-6 py-2 bg-blue-800 text-white rounded hover:bg-blue-900 transition">
                    Baca Selengkapnya
                </a>
            </div>
        </div>

    </div>

    <div class="text-center mt-10">
        <a href="#" class="px-6 py-3 bg-blue-800 text-white rounded hover:bg-blue-900 transition">
            Lihat Selengkapnya →
        </a>
    </div>

</section>

{{-- FOOTER --}}
<footer class="px-8 lg:px-20 py-12 bg-white border-t">

    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

        <div>
            <img src="{{ asset('mazer/assets/images/logo/logo.png') }}" class="w-20 mb-4">
            <p class="text-gray-600 text-sm">
                Platform belajar online untuk mengasah kemampuan coding 
                dan menyiapkan karier di bidang teknologi.
            </p>
        </div>

        <div>
            <h4 class="font-semibold mb-3">Menu</h4>
            <ul class="text-gray-600 space-y-2 text-sm">
                <li><a href="/" class="hover:text-blue-800">Beranda</a></li>
                <li><a href="#kursus" class="hover:text-blue-800">Kursus</a></li>
                <li><a href="#info" class="hover:text-blue-800">Info</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-3">Ikuti Kami</h4>
            <ul class="text-gray-600 space-y-2 text-sm">
                <li><a href="#" class="hover:text-blue-800">Instagram</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-3">Kontak</h4>
            <p class="text-sm text-gray-600 mb-2">Email: cs@siplusplus.com</p>
            <p class="text-sm text-gray-600 mb-2">WhatsApp: +62 123-4567-8990</p>

            <h4 class="font-semibold mt-4 mb-2">Kantor</h4>
            <p class="text-sm text-gray-600">
                Jl. Ring Road Utara, Ngiringin, Condongcatur, Sleman, Yogyakarta 55281
            </p>
        </div>

    </div>

    <p class="text-center text-sm text-gray-500 mt-10">
        © 2025 SiPlusPlus. All Rights Reserved.
    </p>

</footer>

@endsection
