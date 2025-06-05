@extends('layouts.app')

@section('title', 'Dashboard Pengguna')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Selamat datang, {{ Auth::user()->name }}!</h1>

    <div class="mb-10">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-700">Rekomendasi Beasiswa</h2>
            <a href="{{ route('beasiswa.index')}}" class="text-amber-600 hover:text-amber-700 font-medium flex items-center">
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
