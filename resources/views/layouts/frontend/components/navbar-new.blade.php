<script src="https://cdn.tailwindcss.com"></script>

<nav class="w-full px-8 lg:px-20 py-5 bg-white shadow flex justify-between items-center">

    {{-- LOGO --}}
    <div class="flex items-center gap-3">
        <img src="{{ asset('mazer/assets/images/logo/logo.png') }}" class="w-12">
        <h1 class="font-bold text-xl text-gray-800">SiPlusPlus</h1>
    </div>

    {{-- MENU --}}
    <ul class="hidden md:flex gap-10 font-medium text-gray-700">

        <li><a href="{{ url('/') }}" class="hover:text-blue-600">Beranda</a></li>

        {{-- Kategori Dropdown --}}
        <li class="relative group">
            <span class="hover:text-blue-600 flex items-center gap-1 cursor-pointer">
                Kategori
                <i class="bi bi-caret-down-fill text-xs"></i>
            </span>

            <ul class="absolute hidden group-hover:block bg-white shadow rounded-md mt-2 py-2 w-40 z-50">
                @foreach ($global_category as $category)
                <li>
                    <a href="{{ route('frontend.category.show', $category->slug) }}" 
                       class="block px-4 py-2 hover:bg-gray-100">
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </li>

        

    </ul>

    {{-- AUTH BUTTONS --}}
    <div class="flex items-center gap-3">
        @auth
            <a href="{{ route('frontend.user.dashboard') }}" 
               class="px-5 py-2 bg-blue-800 text-white font-semibold rounded hover:bg-blue-900">
               Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" 
               class="px-5 py-2 border border-blue-800 text-blue-800 font-semibold rounded hover:bg-blue-800 hover:text-white">
               Login
            </a>

            <a href="{{ route('register') }}" 
               class="px-5 py-2 bg-blue-800 text-white font-semibold rounded hover:bg-blue-900">
               Registrasi
            </a>
        @endauth
    </div>

</nav>
