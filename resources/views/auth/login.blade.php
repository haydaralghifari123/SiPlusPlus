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
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt.
        </p>
    </div>

    {{-- RIGHT PANEL --}}
    <div class="flex-1 bg-[#F6F6FA] flex items-center justify-center px-6">
        <div class="w-full max-w-md">

            {{-- Title --}}
            <h2 class="text-center text-2xl font-bold text-gray-800 mb-1">
                LOGIN ADMIN
            </h2>
            <p class="text-center text-gray-500 mb-8 text-sm">
                LOG IN TO CONTINUE
            </p>

            {{-- LOGIN FORM --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <div class="flex items-center border border-gray-300 bg-white rounded-md px-3">
                        <i class="bi bi-envelope text-gray-500 mr-2"></i>
                        <input 
                            type="text" 
                            name="email"
                            class="w-full py-3 outline-none text-gray-700"
                            placeholder="Username"
                        >
                    </div>
                </div>

                {{-- Password --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <div class="flex items-center border border-gray-300 bg-white rounded-md px-3">
                        <i class="bi bi-lock text-gray-500 mr-2"></i>
                        <input 
                            type="password" 
                            name="password"
                            class="w-full py-3 outline-none text-gray-700"
                            placeholder="**********"
                        >
                    </div>
                </div>

                {{-- Login Button --}}
                <button 
                    type="submit" 
                    class="w-full bg-[#1D1D3F] hover:bg-[#141430] transition text-white py-3 rounded-md font-semibold flex items-center justify-center gap-2"
                >
                    Login
                    <i class="bi bi-arrow-right"></i>
                </button>

            </form>

            {{-- FOOTER LINKS --}}
            <div class="text-center mt-8">
                <a href="{{ route('password.request') }}" class="text-gray-500 text-sm hover:underline">
                    Lupa Password?
                </a>

                <p class="text-gray-600 mt-4 text-sm">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-[#1D1D3F] font-bold hover:underline">
                        Daftar Sekarang
                    </a>
                </p>
            </div>

        </div>
    </div>

</div>

@endsection
