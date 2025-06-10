@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Daftar Artikel</h1>
        @if (Auth::user()?->role === 'super admin')
            <a href="{{ route('konten.create')}}" class="bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                + Buat Artikel Baru
            </a>
        @endif
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
        @forelse ($konten as $item)
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
        @empty
        <div class="col-span-full text-center py-12">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada artikel</h3>
            @if (Auth::user()?->role === 'super admin')
            <p class="mt-1 text-sm text-gray-500">Silakan buat artikel pertama Anda.</p>
            @endif
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($konten->hasPages())
    <div class="mt-8">
        {{ $konten->links() }}
    </div>
    @endif
</div>
@endsection
