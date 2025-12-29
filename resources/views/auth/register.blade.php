@extends('layouts.auth')

@section('content')

<div class="min-h-screen flex bg-white">

    {{-- LEFT PANEL --}}
    <div class="hidden lg:flex w-1/2 bg-[#EAF2FF] flex-col justify-center items-center px-16">
        <img src="{{ asset('mazer/assets/images/logo/logo.png') }}" alt="Logo" class="w-40 mb-10">

        <h1 class="text-4xl font-bold text-center text-[#0A1A33] leading-tight">
            Akses Kursus Coding <br>
            SiPluPlus dan Mulai <br>
            Belajar Sekarang
        </h1>

        <p class="text-center text-[#0A1A33] mt-6 px-6 text-sm max-w-md">
            Platform belajar online untuk mengasah kemampuan coding dan
            mempersiapkan karir di bidang teknologi.
        </p>
    </div>

    {{-- RIGHT SIDE --}}
    <div class="w-full lg:w-1/2 bg-white flex flex-col">

        {{-- TOP BAR --}}
        <div class="flex items-center px-12 py-8 text-sm text-gray-500">
            <a href="{{ url('/') }}" class="flex items-center gap-2 hover:text-gray-800">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        {{-- FLOATING REGISTER CARD --}}
        <div class="flex-1 flex items-center justify-center">

            <div class="w-full max-w-md bg-white
                        shadow-[0_25px_50px_rgba(0,0,0,0.2)]
                        px-10 py-12">

                {{-- TITLE --}}
                <h2 class="text-2xl font-bold text-center text-gray-900 mb-1">
                    INGIN JADI MEMBER?
                </h2>
                <p class="text-center text-sm text-gray-500 mb-8">
                    Sudah jadi Member?
                    <a href="{{ route('login') }}" class="font-semibold underline">LOG IN</a>
                </p>

                {{-- REGISTER FORM --}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- NAMA --}}
                    <div class="mb-5">
                        <div class="flex items-center border border-gray-300 px-4 py-3">
                            <i class="bi bi-person text-gray-500 mr-3"></i>
                            <input
                                type="text"
                                name="name"
                                class="w-full outline-none text-gray-700"
                                placeholder="Nama Lengkap"
                                required
                            >
                        </div>
                    </div>

                    {{-- EMAIL --}}
                    <div class="mb-5">
                        <div class="flex items-center border border-gray-300 px-4 py-3">
                            <i class="bi bi-envelope text-gray-500 mr-3"></i>
                            <input
                                type="email"
                                name="email"
                                class="w-full outline-none text-gray-700"
                                placeholder="example@email.com"
                                required
                            >
                        </div>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-5">
                        <div class="flex items-center border border-gray-300 px-4 py-3">
                            <i class="bi bi-lock text-gray-500 mr-3"></i>
                            <input
                                type="password"
                                name="password"
                                class="w-full outline-none text-gray-700"
                                placeholder="Password"
                                required
                            >
                        </div>
                    </div>

                    {{-- CONFIRM PASSWORD (WAJIB!) --}}
                    <div class="mb-5">
                        <div class="flex items-center border border-gray-300 px-4 py-3">
                            <i class="bi bi-lock text-gray-500 mr-3"></i>
                            <input
                                type="password"
                                name="password_confirmation"
                                class="w-full outline-none text-gray-700"
                                placeholder="Konfirmasi Password"
                                required
                            >
                        </div>
                    </div>

                    {{-- PHONE (OPSIONAL) --}}
                    <div class="mb-6">
                        <div class="flex items-center border border-gray-300 px-4 py-3">
                            <i class="bi bi-telephone text-gray-500 mr-3"></i>
                            <input
                                type="text"
                                name="phone"
                                class="w-full outline-none text-gray-700"
                                placeholder="Nomor Telepon (Opsional)"
                            >
                        </div>
                    </div>

                    {{-- GENDER (OPSIONAL) --}}
                    <div class="mb-8 space-y-3 text-sm text-gray-700">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="gender" value="male">
                            Laki-laki
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="gender" value="female">
                            Perempuan
                        </label>
                    </div>

                    {{-- SUBMIT --}}
                    <button
                        type="submit"
                        class="w-full bg-[#1D1D3F] hover:bg-[#141430]
                               transition text-white py-4
                               font-semibold flex items-center justify-between px-6"
                    >
                        <span>Jadi Member?</span>
                        <i class="bi bi-arrow-right text-lg"></i>
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
