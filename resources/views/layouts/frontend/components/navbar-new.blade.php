{{-- NAVBAR LANDING PAGE --}}
<nav class="w-full bg-white shadow px-8 lg:px-20 py-4 flex items-center justify-between">

    {{-- LOGO --}}
    <a href="{{ route('frontend.index') }}" class="flex items-center gap-2">
        <img src="{{ asset('mazer/assets/images/logo/logo.png') }}" class="w-24">
    </a>

    {{-- MENU --}}
    <div class="hidden md:flex items-center gap-8 font-medium text-gray-700">
        <a href="{{ route('frontend.index') }}"
           class="hover:text-blue-800 transition">
            Beranda
        </a>

        <a href="#kursus"
           class="hover:text-blue-800 transition">
            Kursus
        </a>

        <a href="{{ route('frontend.info') }}"
           class="hover:text-blue-800 transition">
            Info
        </a>
    </div>

    {{-- AUTH BUTTON --}}
    <div class="flex items-center gap-4">
        @auth
            <a href="{{ route('frontend.user.dashboard') }}"
               class="px-4 py-2 bg-blue-800 text-white rounded font-semibold hover:bg-blue-900 transition">
                Dashboard
            </a>
        @else
            <a href="{{ route('login') }}"
               class="px-4 py-2 text-blue-800 font-semibold hover:underline">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="px-4 py-2 bg-blue-800 text-white rounded font-semibold hover:bg-blue-900 transition">
                Registrasi
            </a>
        @endauth
    </div>

</nav>
