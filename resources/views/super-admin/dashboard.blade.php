@extends('layouts.app')

@section('title', 'Dashboard Super Admin')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6 text-blue-700">Halo, {{ Auth::user()->name }}! 👋</h1>

    <!-- Ringkasan Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <div class="text-blue-600 text-4xl mb-2"><i class="fas fa-database"></i></div>
            <div class="text-2xl font-bold">{{ $totalBeasiswa }}</div>
            <div class="text-gray-600">Total Beasiswa</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <div class="text-green-600 text-4xl mb-2"><i class="fas fa-user-shield"></i></div>
            <div class="text-2xl font-bold">{{ $totalAdmin }}</div>
            <div class="text-gray-600">Total Admin</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <div class="text-amber-600 text-4xl mb-2"><i class="fas fa-users"></i></div>
            <div class="text-2xl font-bold">{{ $totalUser }}</div>
            <div class="text-gray-600">Total Pengguna</div>
        </div>
    </div>

    <!-- Tabel Beasiswa -->
    <div class="bg-white rounded-lg shadow p-6 mb-10">
        <h2 class="text-xl font-semibold mb-4 text-blue-600">Beasiswa Belum Diverifikasi</h2>
        @if($unverifiedBeasiswas->isEmpty())
            <p class="text-gray-500">Semua beasiswa sudah diverifikasi.</p>
        @else
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Judul</th>
                    <th class="px-4 py-2 text-left">Instansi</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($unverifiedBeasiswas as $b)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $b->judul }}</td>
                    <td class="px-4 py-2">{{ $b->instansi }}</td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('beasiswa.verifikasi', $b->id) }}" class="text-green-600 hover:underline">Verifikasi</a>
                        |
                        <form action="{{ route('beasiswa.destroy', $b->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus beasiswa ini?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <!-- Konten Beasiswa -->
    <div class="bg-white rounded-lg shadow p-6 mb-10">
        <h2 class="text-xl font-semibold mb-4 text-blue-600">Konten Beasiswa</h2>
        <div class="mb-4">
            <a href="{{ route('konten.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Konten</a>
        </div>
        @if($kontens->isEmpty())
            <p class="text-gray-500">Belum ada konten beasiswa.</p>
        @else
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Judul</th>
                    <th class="px-4 py-2 text-left">Kategori</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kontens as $konten)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $konten->judul }}</td>
                    <td class="px-4 py-2">{{ $konten->kategori }}</td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('konten.edit', $konten->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        |
                        <form action="{{ route('konten.destroy', $konten->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus konten ini?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <!-- Notifikasi Terbaru -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4 text-blue-600">Notifikasi Terbaru</h2>
        <ul class="divide-y divide-gray-200">
            @forelse($notifikasis as $notif)
            <li class="py-3">
                <strong>{{ $notif->judul }}</strong> <br>
                <span class="text-sm text-gray-500">{{ $notif->created_at->diffForHumans() }}</span>
            </li>
            @empty
            <li class="text-gray-500">Belum ada notifikasi.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
