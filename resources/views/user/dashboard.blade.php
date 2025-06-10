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


        @if($beasiswas->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($beasiswas as $beasiswa)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 border-l-4 @if($beasiswa->status == 'sudah disetujui' && auth()->user()?->role === "admin") border-green-500 @else border-amber-500 @endif">
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
                    @if($beasiswa->status == 'menunggu persetujuan' && auth()->user() && auth()->user()->role === "super admin")
                    <form action="{{ route('beasiswa.approve', $beasiswa) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs bg-green-500 hover:bg-green-600 text-white font-medium py-1 px-3 rounded transition duration-300">
                            Setujui
                        </button>
                    </form>
                    @else
                        @if(auth()->user()?->role !== 'user' && auth()->user() !== null)
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
            @foreach ($rekomendasikonten as $item)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <img src="{{ $item->foto }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover">
            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-xl font-bold text-gray-800">{{ $item->judul }}</h2>
                    <span class="text-sm text-gray-500">{{ $item->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-gray-600 mb-4">{{ Str::limit($item->deskripsi, 100) }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500">Oleh: {{ $item->user->name }}</span>
                    <a href="{{ route('konten.show', $item) }}" class="text-amber-600 hover:text-amber-700 font-medium">
                        Baca Selengkapnya →
                    </a>
                </div>
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
