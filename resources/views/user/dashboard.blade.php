@extends('layouts.app')

@section('title', 'Dashboard - ScholarMate')

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
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="text-amber-200 hover:text-white focus:outline-none" id="notification-btn">
                        <i class="far fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
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
                        <form method="POST" action="#">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-amber-50">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
@endsection

@section('content')
<div class="bg-amber-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Dashboard -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Selamat datang, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-600">Mulai jelajahi beasiswa yang sesuai dengan profil Anda</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-amber-100 text-amber-600 mr-4">
                        <i class="fas fa-graduation-cap text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Beasiswa Diajukan</p>
                        <p class="text-2xl font-bold">12</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Beasiswa Diterima</p>
                        <p class="text-2xl font-bold">3</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Dalam Proses</p>
                        <p class="text-2xl font-bold">5</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-600 mr-4">
                        <i class="fas fa-exclamation-circle text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Deadline Dekat</p>
                        <p class="text-2xl font-bold">2</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Rekomendasi Beasiswa -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="bg-amber-600 px-6 py-4">
                        <h2 class="text-xl font-semibold text-white">Rekomendasi Beasiswa Untuk Anda</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            {{-- @foreach($recommendedScholarships as $scholarship) --}}
                            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-300">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-lg text-amber-700">{{--  --}}nama</h3>
                                        <p class="text-gray-600">{{--  --}}nama univ</p>
                                    </div>
                                    <span class="px-2 py-1 bg-amber-100 text-amber-800 text-xs font-semibold rounded">
                                        {{--  --}} type
                                    </span>
                                </div>
                                <div class="mt-3 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    Deadline: {{--  --}}
                                </div>
                                <div class="mt-3 flex justify-between items-center">
                                    <div class="flex items-center">
                                        <i class="fas fa-money-bill-wave mr-2 text-green-500"></i>
                                        <span class="text-sm font-medium">Rp 1000{{--  --}}</span>
                                    </div>
                                    <a href="{{--  --}}"
                                       class="text-sm font-medium text-amber-600 hover:text-amber-700">
                                        Lihat Detail <i class="fas fa-chevron-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 text-center">
                            <a href="{{--  --}}"
                               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-amber-600 hover:bg-amber-700">
                                Lihat Semua Beasiswa
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Dokumen Saya -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="bg-amber-600 px-6 py-4">
                        <h2 class="text-xl font-semibold text-white">Dokumen Saya</h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="border border-gray-200 rounded-lg p-4 text-center hover:shadow-md transition duration-300">
                                <div class="mx-auto h-12 w-12 bg-amber-100 rounded-full flex items-center justify-center text-amber-600 mb-3">
                                    <i class="fas fa-file-pdf text-xl"></i>
                                </div>
                                <h4 class="font-medium text-gray-800">CV Terbaru.pdf</h4>
                                <p class="text-xs text-gray-500">Diunggah 2 hari lalu</p>
                                <div class="mt-2">
                                    <button class="text-xs text-amber-600 hover:text-amber-700">Unduh</button>
                                    <span class="mx-1 text-gray-300">|</span>
                                    <button class="text-xs text-amber-600 hover:text-amber-700">Ganti</button>
                                </div>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-4 text-center hover:shadow-md transition duration-300">
                                <div class="mx-auto h-12 w-12 bg-amber-100 rounded-full flex items-center justify-center text-amber-600 mb-3">
                                    <i class="fas fa-file-word text-xl"></i>
                                </div>
                                <h4 class="font-medium text-gray-800">Surat Rekomendasi.docx</h4>
                                <p class="text-xs text-gray-500">Diunggah 1 minggu lalu</p>
                                <div class="mt-2">
                                    <button class="text-xs text-amber-600 hover:text-amber-700">Unduh</button>
                                    <span class="mx-1 text-gray-300">|</span>
                                    <button class="text-xs text-amber-600 hover:text-amber-700">Ganti</button>
                                </div>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-4 text-center hover:shadow-md transition duration-300">
                                <div class="mx-auto h-12 w-12 bg-amber-100 rounded-full flex items-center justify-center text-amber-600 mb-3">
                                    <i class="fas fa-file-image text-xl"></i>
                                </div>
                                <h4 class="font-medium text-gray-800">Transkrip Nilai.jpg</h4>
                                <p class="text-xs text-gray-500">Diunggah 3 minggu lalu</p>
                                <div class="mt-2">
                                    <button class="text-xs text-amber-600 hover:text-amber-700">Unduh</button>
                                    <span class="mx-1 text-gray-300">|</span>
                                    <button class="text-xs text-amber-600 hover:text-amber-700">Ganti</button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button class="w-full py-2 px-4 border-2 border-dashed border-gray-300 rounded-md text-gray-500 hover:text-amber-600 hover:border-amber-400 transition duration-300">
                                <i class="fas fa-plus mr-2"></i> Tambah Dokumen Baru
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Timeline Aplikasi -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="bg-amber-600 px-6 py-4">
                        <h2 class="text-xl font-semibold text-white">Timeline Aplikasi</h2>
                    </div>
                    <div class="p-6">
                        <div class="flow-root">
                            <ul class="-mb-8">
                                <li>
                                    <div class="relative pb-8">
                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                                    <i class="fas fa-check text-white text-sm"></i>
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-800">Beasiswa LPDP</p>
                                                    <p class="text-xs text-gray-500">Diterima pada 15 Mei 2023</p>
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Sukses</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="relative pb-8">
                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                                    <i class="fas fa-spinner text-white text-sm"></i>
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-800">Beasiswa Erasmus+</p>
                                                    <p class="text-xs text-gray-500">Tahap wawancara</p>
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">Proses</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="relative pb-8">
                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-8 w-8 rounded-full bg-yellow-500 flex items-center justify-center ring-8 ring-white">
                                                    <i class="fas fa-clock text-white text-sm"></i>
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-800">Beasiswa Kemenristek</p>
                                                    <p class="text-xs text-gray-500">Menunggu pengumuman</p>
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Pending</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="relative pb-8">
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                    <i class="fas fa-times text-white text-sm"></i>
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-800">Beasiswa AAS</p>
                                                    <p class="text-xs text-gray-500">Tidak memenuhi syarat</p>
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Gagal</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="text-sm font-medium text-amber-600 hover:text-amber-700">
                                Lihat Semua Aplikasi <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Deadline Mendekati -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="bg-amber-600 px-6 py-4">
                        <h2 class="text-xl font-semibold text-white">Deadline Mendekati</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 pt-0.5">
                                    <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                                        <i class="fas fa-exclamation"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">Beasiswa LPDP Gelombang 2</h4>
                                    <p class="text-xs text-gray-500">Tersisa 3 hari</p>
                                    <div class="mt-1">
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-red-600 h-1.5 rounded-full" style="width: 90%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 pt-0.5">
                                    <div class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">Beasiswa Kemenag 2023</h4>
                                    <p class="text-xs text-gray-500">Tersisa 7 hari</p>
                                    <div class="mt-1">
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-yellow-400 h-1.5 rounded-full" style="width: 70%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 pt-0.5">
                                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">Beasiswa Erasmus Mundus</h4>
                                    <p class="text-xs text-gray-500">Tersisa 14 hari</p>
                                    <div class="mt-1">
                                        <div class="w-full bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-blue-500 h-1.5 rounded-full" style="width: 50%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="text-sm font-medium text-amber-600 hover:text-amber-700">
                                Lihat Kalender Deadline <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tips & Artikel -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="bg-amber-600 px-6 py-4">
                        <h2 class="text-xl font-semibold text-white">Tips & Artikel</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="group">
                                <h4 class="text-sm font-medium text-gray-900 group-hover:text-amber-600">
                                    <a href="#">5 Tips Menulis Essay Beasiswa yang Menarik</a>
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">2 hari lalu - 5 min read</p>
                            </div>

                            <div class="group">
                                <h4 class="text-sm font-medium text-gray-900 group-hover:text-amber-600">
                                    <a href="#">Cara Memilih Rekomendator yang Tepat</a>
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">1 minggu lalu - 3 min read</p>
                            </div>

                            <div class="group">
                                <h4 class="text-sm font-medium text-gray-900 group-hover:text-amber-600">
                                    <a href="#">Persiapan Wawancara Beasiswa LPDP</a>
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">2 minggu lalu - 7 min read</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="text-sm font-medium text-amber-600 hover:text-amber-700">
                                Lihat Semua Artikel <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('dropdownToggle');
        const dropdownMenu = document.getElementById('dropdownMenu');

        toggleButton.addEventListener('click', function (e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!dropdownMenu.classList.contains('hidden')) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
@endsection
