@extends('layouts.auth')

@section('content')
<style>
/* Disable browser built-in password reveal (Edge / IE) */
input[type="password"]::-ms-reveal,
input[type="password"]::-ms-clear {
    display: none;
}
</style>

<div class="min-h-screen flex bg-white">

    {{-- LEFT PANEL --}}
    <div class="hidden lg:flex w-1/2 bg-[#EAF2FF] flex-col justify-center items-center px-16">
        <img src="{{ asset('mazer/assets/images/logo/logo.png') }}" alt="Logo" class="w-40 mb-10">

        <h1 class="text-4xl font-bold text-center text-[#0A1A33] leading-tight">
            Akses Kursus Coding <br>
            SiPlusPlus dan Mulai <br>
            Belajar Sekarang
        </h1>

        <p class="text-center text-[#0A1A33] mt-6 px-6 text-sm max-w-md">
            Platform belajar online untuk mengasah kemampuan coding dan
            mempersiapkan karir di bidang teknologi.
        </p>
    </div>

    {{-- RIGHT SIDE --}}
    <div class="w-full lg:w-1/2 bg-white flex items-center justify-center">

        <div class="w-full max-w-lg bg-white shadow-[0_30px_60px_rgba(0,0,0,0.25)] px-10 py-14 rounded-sm">

            <h2 class="text-3xl font-bold text-gray-900 text-center mb-1">
                LOGIN
            </h2>
            <p class="text-center text-gray-500 text-sm">
                LOG IN TO CONTINUE
            </p>

            <div class="w-full h-px bg-gray-300 my-8"></div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- USERNAME --}}
                <div class="mb-8">
                    <label class="block text-sm font-medium mb-2 text-gray-700">
                        Username
                    </label>
                    <div class="flex items-center border border-gray-300 px-4 py-3">
                        <i class="bi bi-envelope text-gray-500 mr-3"></i>
                        <input
                            type="text"
                            name="email"
                            class="w-full outline-none text-gray-700 bg-transparent"
                            placeholder="Masukkan username"
                        >
                    </div>
                </div>

                {{-- PASSWORD --}}
                <div class="mb-10">
                    <label class="block text-sm font-medium mb-2 text-gray-700">
                        Password
                    </label>
                    <div class="flex items-center border border-gray-300 px-4 py-3">
                        <i class="bi bi-lock text-gray-500 mr-3"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="w-full outline-none text-gray-700 bg-transparent"
                            placeholder="********"
                        >

                        <i
                            id="togglePassword"
                            class="bi bi-eye text-gray-400 ml-2 cursor-pointer"
                        ></i>
                    </div>
                </div>

                {{-- LOGIN BUTTON --}}
                <button
                    type="submit"
                    class="w-full bg-[#1D1D3F] hover:bg-[#141430] transition
                           text-white py-4 font-semibold flex items-center justify-between px-6"
                >
                    <span>Login</span>
                    <i class="bi bi-arrow-right text-lg"></i>
                </button>
            </form>

            <div class="text-center mt-10">
                <a href="{{ route('register') }}"
                   class="text-gray-500 text-sm hover:underline">
                    Belum Punya Akun? Register
                </a>
            </div>

        </div>
    </div>

</div>

{{-- TOGGLE PASSWORD SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        const isPassword = passwordInput.type === 'password';

        passwordInput.type = isPassword ? 'text' : 'password';

        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
});
</script>

@endsection
