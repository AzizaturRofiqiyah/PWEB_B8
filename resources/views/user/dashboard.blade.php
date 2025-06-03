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
            <div class="flex items-center space-x-4">
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
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('dropdownToggle');
        const dropdownMenu = document.getElementById('dropdownMenu');

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
    });
</script>
@endsection

@section('content')
<div class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6 text-amber-600">Selamat Datang di Dashboard, {{ Auth::user()->name }}!</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <div class="text-amber-500 text-4xl mb-2">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="text-2xl font-bold">Beasiswa Aktif</div>
            <div class="text-lg text-gray-600">Lihat dan daftar beasiswa terbaru</div>
            <a href="/school" class="mt-4 bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded transition">Lihat Beasiswa</a>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <div class="text-amber-500 text-4xl mb-2">
                <i class="fas fa-bell"></i>
            </div>
            <div class="text-2xl font-bold">Notifikasi</div>
            <div class="text-lg text-gray-600">Cek pengumuman dan update terbaru</div>
            <a href="#" class="mt-4 bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded transition">Lihat Notifikasi</a>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <div class="text-amber-500 text-4xl mb-2">
                <i class="fas fa-user"></i>
            </div>
            <div class="text-2xl font-bold">Profil Saya</div>
            <div class="text-lg text-gray-600">Kelola data dan dokumen pribadi</div>
            <a href="#" class="mt-4 bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded transition">Edit Profil</a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4 text-amber-600">Beasiswa yang Direkomendasikan</h2>
        <ul class="divide-y divide-gray-200">
            <li class="py-4 flex justify-between items-center">
                <div>
                    <div class="font-bold">Beasiswa LPDP</div>
                    <div class="text-gray-500 text-sm">Deadline: 30 Juni 2025</div>
                </div>
                <a href="#" class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded text-sm">Detail</a>
            </li>
            <li class="py-4 flex justify-between items-center">
                <div>
                    <div class="font-bold">Beasiswa Erasmus+</div>
                    <div class="text-gray-500 text-sm">Deadline: 15 Januari 2025</div>
                </div>
                <a href="#" class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded text-sm">Detail</a>
            </li>
            <li class="py-4 flex justify-between items-center">
                <div>
                    <div class="font-bold">Beasiswa Kemenag</div>
                    <div class="text-gray-500 text-sm">Deadline: 31 Maret 2025</div>
                </div>
                <a href="#" class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded text-sm">Detail</a>
            </li>
        </ul>
    </div>
</div>
@endsection
