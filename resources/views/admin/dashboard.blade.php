@extends('layouts.app')

@section('title', 'Dashboard Pengguna')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Selamat datang, {{ Auth::user()->name }}!</h1>

    <!-- Statistik Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <!-- Total Beasiswa Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-amber-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Beasiswa</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalBeasiswa }}</h3>
                </div>
                <div class="bg-amber-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Beasiswa Disetujui Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Beasiswa Disetujui</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $beasiswasdisetujui->count() }}</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Beasiswa Pending Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Beasiswa Pending</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $beasiswabelumdisetujui->count() }}</h3>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Beasiswa Disetujui Section -->
    <div class="mb-10">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Beasiswa yang Sudah Disetujui</h2>
            <a href="{{ route('beasiswa.index') }}" class="text-amber-600 hover:text-amber-700 font-medium flex items-center">
                Lihat Semua
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        @if($beasiswasdisetujui->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($beasiswasdisetujui as $beasiswa)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 border-l-4 border-green-500">
                @if($beasiswa->foto)
                <img src="{{ $beasiswa->foto }}" alt="{{ $beasiswa->judul }}" class="w-full h-48 object-cover">
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
                        <span class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-800">
                            {{ $beasiswa->status }}
                        </span>

                        <a href="{{ route('beasiswa.show', $beasiswa) }}" class="text-amber-600 hover:text-amber-700 font-medium text-sm">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <p class="text-gray-600">Tidak ada beasiswa yang sudah disetujui.</p>
        </div>
        @endif
    </div>

    <!-- Beasiswa Pending Section -->
    <div class="mb-10">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Beasiswa yang Belum Disetujui</h2>
            <a href="{{ route('beasiswa.index') }}" class="text-amber-600 hover:text-amber-700 font-medium flex items-center">
                Lihat Semua
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        @if($beasiswabelumdisetujui->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($beasiswabelumdisetujui as $beasiswa)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 border-l-4 border-yellow-500">
                @if($beasiswa->foto)
                <img src="{{ $beasiswa->foto }}" alt="{{ $beasiswa->judul }}" class="w-full h-48 object-cover">
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
                        <span class="text-xs px-2 py-1 rounded-full bg-yellow-100 text-yellow-800">
                            {{ $beasiswa->status }}
                        </span>

                        <a href="{{ route('beasiswa.show', $beasiswa) }}" class="text-amber-600 hover:text-amber-700 font-medium text-sm">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <p class="text-gray-600">Tidak ada beasiswa yang belum disetujui.</p>
        </div>
        @endif
    </div>
</div>
@endsection
