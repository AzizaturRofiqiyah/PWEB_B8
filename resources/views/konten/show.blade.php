@extends('layouts.app')

@section('title', $konten->judul)

@section('content')
<div class="container mx-auto px-4 py-8">
    <article class="max-w-4xl mx-auto">
        <!-- Back Button -->
        <a href="{{ route('konten.index')}}" class="inline-flex items-center text-amber-600 hover:text-amber-700 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Daftar Artikel
        </a>

        <!-- Article Header -->
        <header class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ $konten->judul }}</h1>
            <div class="flex items-center text-sm text-gray-500">
                <div class="flex items-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    {{ $konten->user->name }}
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $konten->created_at->translatedFormat('d F Y') }}
                </div>
            </div>
        </header>

        <!-- Article Image -->
        <figure class="mb-8">
            <img src="{{ asset('storage/' . $konten->foto) }}" alt="{{ $konten->judul }}" class="w-full rounded-lg shadow-md">
        </figure>

        <!-- Article Content -->
        <div class="prose max-w-none mb-8">
            {!! nl2br(e($konten->deskripsi)) !!}
        </div>

        <!-- Action Buttons (for article owner) -->
        @if(auth()->check() && auth()->user()->id === $konten->user_id || auth()->user()->role === 'super admin')
        <div class="flex space-x-4 mt-8 pt-6 border-t border-gray-200">
            <a href="{{--  --}}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                Edit Artikel
            </a>
            <form id="delete-form" action="{{--  --}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" id="delete-button" class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                    Hapus Artikel
                </button>
            </form>
        </div>
        @endif
    </article>
</div>
<script>
document.getElementById('delete-button').addEventListener('click', function (e) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Artikel akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e3342f',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form').submit();
        }
    });
});
</script>

@endsection
