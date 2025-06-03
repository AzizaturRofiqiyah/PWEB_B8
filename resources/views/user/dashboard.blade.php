@extends('layouts.app')

@section('title', 'Dashboard Pengguna')

@section('navbar')
<nav class="sticky top-0 bg-amber-600 text-white shadow-lg z-50">
    <div class="container mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" class="h-8 w-8" alt="ScholarMate Icon">
                    <span class="text-xl font-bold">ScholarMate</span>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-amber-200 hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-4">
                <div class="relative">
                    <button class="text-amber-200 hover:text-white focus:outline-none" id="notification-btn">
                        <i class="far fa-bell text-xl"></i>
                        @if ($notif > 0)
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                        @endif
                    </button>
                </div>
                <div class="relative">
                    <button id="dropdownToggle" class="flex items-center space-x-2 focus:outline-none">
                        <div class="h-8 w-8 rounded-full bg-amber-200 flex items-center justify-center text-amber-800 font-semibold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="text-amber-200 hover:text-white">{{ Auth::user()->name }}</span>
                    </button>
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50">Profil Saya</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50">Pengaturan</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-amber-50">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation (hidden by default) -->
        <div id="mobile-menu" class="hidden md:hidden bg-amber-700 pb-3 px-2">
            <div class="flex flex-col space-y-2">
                <div class="flex items-center justify-between px-2 py-2">
                    <div class="flex items-center space-x-2">
                        <div class="h-8 w-8 rounded-full bg-amber-200 flex items-center justify-center text-amber-800 font-semibold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="text-amber-200">{{ Auth::user()->name }}</span>
                    </div>
                    <button class="text-amber-200 hover:text-white focus:outline-none">
                        <i class="far fa-bell text-xl"></i>
                        @if ($notif > 0)
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                        @endif
                    </button>
                </div>
                <a href="#" class="block px-3 py-2 text-amber-200 hover:bg-amber-600 rounded">Profil Saya</a>
                <a href="#" class="block px-3 py-2 text-amber-200 hover:bg-amber-600 rounded">Pengaturan</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-3 py-2 text-amber-200 hover:bg-amber-600 rounded">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Desktop dropdown menu
        const toggleButton = document.getElementById('dropdownToggle');
        const dropdownMenu = document.getElementById('dropdownMenu');

        if (toggleButton && dropdownMenu) {
            toggleButton.addEventListener('mouseenter', function () {
                dropdownMenu.classList.remove('hidden');
            });

            toggleButton.addEventListener('mouseleave', function () {
                setTimeout(function () {
                    if (!dropdownMenu.matches(':hover')) {
                        dropdownMenu.classList.add('hidden');
                    }
                }, 100);
            });

            dropdownMenu.addEventListener('mouseleave', function () {
                dropdownMenu.classList.add('hidden');
            });

            dropdownMenu.addEventListener('mouseenter', function () {
                dropdownMenu.classList.remove('hidden');
            });
        }

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
</script>
@endsection

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Selamat datang, {{ Auth::user()->name }}!</h1>

    <div class="mb-10">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Rekomendasi Beasiswa</h2>
            <a href="{{--  --}}" class="text-amber-600 hover:text-amber-700 font-medium flex items-center">
                Lihat Semua Beasiswa
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        @if($rekomendasibeasiswa->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($rekomendasibeasiswa as $daftarbeasiswa)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="bg-amber-500 text-white px-4 py-2">
                    <span class="text-sm font-semibold">{{ $daftarbeasiswa->jenis }}</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $daftarbeasiswa->judul }}</h3>
                    <p class="text-gray-600 mb-4">{{ $daftarbeasiswa->deskripsi_singkat }}</p>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $daftarbeasiswa->wilayah }}
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Deadline: {{ \Carbon\Carbon::parse($daftarbeasiswa->deadline)->format('d M Y') }}
                    </div>
                    <a href="#" class="inline-block bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded transition duration-300">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <p class="text-gray-600">Tidak ada rekomendasi beasiswa saat ini.</p>
        </div>
        @endif
    </div>

    <!-- Rekomendasi Konten Section -->
    <div class="mb-10">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Rekomendasi Artikel</h2>
            <a href="{{ route('konten.index')}}" class="text-amber-600 hover:text-amber-700 font-medium flex items-center">
                Lihat Semua Artikel
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        @if($rekomendasikonten->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($rekomendasikonten as $konten)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('storage/' . $konten->foto) }}" alt="{{ $konten->judul }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $konten->judul }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($konten->deskripsi, 100) }}</p>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Diposting: {{ \Carbon\Carbon::parse($konten->tanggal_upload)->format('d M Y') }}
                    </div>
                    <a href="#" class="inline-block bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded transition duration-300">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <p class="text-gray-600">Tidak ada rekomendasi artikel saat ini.</p>
        </div>
        @endif
    </div>
</div>
@endsection
