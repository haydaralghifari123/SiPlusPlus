@extends('layouts.auth')

@section('content')

<div class="min-h-screen flex">
    
    {{-- LEFT PANEL --}}
    <div class="hidden lg:flex w-1/3 bg-[#CFE3FF] flex-col justify-center items-center px-10">
        <img src="{{ asset('mazer/assets/images/logo/logo.png') }}" alt="Logo" class="w-40 mb-8">

        <h1 class="text-3xl font-bold text-center text-[#0A1A33] leading-tight">
            Akses Kursus <br>
            Coding SiPluPlus <br>
            dan Mulai Belajar Sekarang
        </h1>

        <p class="text-center text-[#0A1A33] mt-4 px-4 text-sm">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
        </p>
    </div>

    {{-- RIGHT PANEL --}}
    <div class="flex-1 bg-[#F6F6FA] flex flex-col px-6">

        {{-- TOP NAV --}}
        <div class="flex justify-between items-center py-6">
            <a href="{{ url('/') }}" class="flex items-center gap-2 text-gray-600 hover:text-gray-800">
                <i class="bi bi-arrow-left"></i> Return Home
            </a>

            <p class="text-sm text-gray-600">
                Already a Member?
                <a href="{{ route('login') }}" class="font-bold hover:underline">LOG IN NOW</a>
            </p>
        </div>

        {{-- FORM WRAPPER --}}
        <div class="flex-1 flex items-center justify-center">
            <div class="w-full max-w-md">

                {{-- TITLE --}}
                <h2 class="text-center text-2xl font-bold text-gray-800 mb-10">
                    BECOME AN EXCLUSIVE MEMBERS
                </h2>

                {{-- REGISTER FORM --}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Username --}}
                    <div class="mb-4">
                        <div class="flex items-center border border-gray-300 bg-white rounded-md px-3">
                            <i class="bi bi-person text-gray-500 mr-2"></i>
                            <input 
                                type="text" 
                                name="name"
                                class="w-full py-3 outline-none text-gray-700"
                                placeholder="Username"
                                required
                            >
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <div class="flex items-center border border-gray-300 bg-white rounded-md px-3">
                            <i class="bi bi-envelope text-gray-500 mr-2"></i>
                            <input 
                                type="email" 
                                name="email"
                                class="w-full py-3 outline-none text-gray-700"
                                placeholder="example@email.com"
                                required
                            >
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <div class="flex items-center border border-gray-300 bg-white rounded-md px-3">
                            <i class="bi bi-lock text-gray-500 mr-2"></i>
                            <input 
                                type="password" 
                                name="password"
                                class="w-full py-3 outline-none text-gray-700"
                                placeholder="**********"
                                required
                            >
                        </div>
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-6">
                        <div class="flex items-center border border-gray-300 bg-white rounded-md px-3">
                            <i class="bi bi-lock text-gray-500 mr-2"></i>
                            <input 
                                type="password" 
                                name="password_confirmation"
                                class="w-full py-3 outline-none text-gray-700"
                                placeholder="Confirm password"
                                required
                            >
                        </div>
                    </div>

                    {{-- Submit --}}
                    <button 
                        type="submit" 
                        class="w-full bg-[#1D1D3F] hover:bg-[#141430] transition text-white py-3 rounded-md font-semibold flex items-center justify-center gap-2"
                    >
                        Become a Member
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </form>

            </div>
        </div>

    </div>

</div>

@endsection
