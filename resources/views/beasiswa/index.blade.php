@extends('layouts.app')

@section('title', 'Daftar Beasiswa')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Daftar Beasiswa</h1>
        @auth
        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'super admin')
            <a href="{{ route('beasiswa.create') }}" class="bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                + Tambah Beasiswa
            </a>
        @endif
    @endauth

    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <!-- Filter Section -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-3">Filter Beasiswa</h2>
        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="jenis" class="block text-sm font-medium text-gray-700 mb-1">Jenis Beasiswa</label>
                <select id="jenis" name="jenis" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-amber-500 focus:border-amber-500">
                    <option value="">Semua Jenis</option>
                    <option value="Penuh" {{ request('jenis') == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                    <option value="Parsial" {{ request('jenis') == 'Parsial' ? 'selected' : '' }}>Parsial</option>
                </select>
            </div>
            <div>
                <label for="wilayah" class="block text-sm font-medium text-gray-700 mb-1">Wilayah</label>
                <select id="wilayah" name="wilayah" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-amber-500 focus:border-amber-500">
                    <option value="">Semua Wilayah</option>
                    <option value="Dalam Negeri" {{ request('wilayah') == 'Dalam Negeri' ? 'selected' : '' }}>Dalam Negeri</option>
                    <option value="Luar Negeri" {{ request('wilayah') == 'Luar Negeri' ? 'selected' : '' }}>Luar Negeri</option>
                    <option value="Dalam/Luar Negeri" {{ request('wilayah') == 'Dalam/Luar Negeri' ? 'selected' : '' }}>Dalam/Luar Negeri</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                    Filter
                </button>
                <a href="{{ route('beasiswa.index') }}" class="ml-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-300">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Scholarship List -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($beasiswas as $beasiswa)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 border-l-4 @if($beasiswa->status == 'sudah disetujui' && auth()->user()->role === "admin") border-green-500 @else border-amber-500 @endif">
            @if($beasiswa->foto)
            <img src="{{ asset('storage/' . $beasiswa->foto) }}" alt="{{ $beasiswa->judul }}" class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            @endif

            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full @if($beasiswa->jenis == 'Penuh') bg-green-100 text-green-800 @else bg-blue-100 text-blue-800 @endif">
                        {{ $beasiswa->jenis }}
                    </span>
                    <span class="text-xs text-gray-500">{{ $beasiswa->created_at->diffForHumans() }}</span>
                </div>

                <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $beasiswa->judul }}</h2>
                <p class="text-gray-600 mb-4">{{ $beasiswa->deskripsi_singkat }}</p>

                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $beasiswa->wilayah }}
                </div>

                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                        Deadline: {{ date('d M Y', strtotime($beasiswa->deadline)) }}
                </div>

                <div class="flex justify-between items-center">
                    @if($beasiswa->status == 'menunggu persetujuan' && auth()->user() && auth()->user()->role === "super admin")
                    <form action="{{ route('beasiswa.approve', $beasiswa) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs bg-green-500 hover:bg-green-600 text-white font-medium py-1 px-3 rounded transition duration-300">
                            Setujui
                        </button>
                    </form>
                    @else
                        @if(auth()->user()->role !== 'user')
                            <span class="text-xs px-2 py-1 rounded-full @if($beasiswa->status == 'sudah disetujui') bg-green-100 text-green-800 @else bg-amber-100 text-amber-800 @endif">
                                {{ $beasiswa->status }}
                            </span>
                        @endif
                    @endif

                    <a href="{{ route('beasiswa.show', $beasiswa) }}" class="text-amber-600 hover:text-amber-700 font-medium text-sm">
                        Lihat Detail →
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Tidak ada beasiswa ditemukan</h3>
            <p class="mt-1 text-sm text-gray-500">Silakan coba dengan filter yang berbeda.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($beasiswas->hasPages())
    <div class="mt-8">
        {{ $beasiswas->links() }}
    </div>
    @endif
</div>
@endsection
