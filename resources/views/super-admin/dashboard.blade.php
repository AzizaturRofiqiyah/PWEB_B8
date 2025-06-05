@extends('layouts.app')

@section('title', 'Dashboard Pengguna')

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
