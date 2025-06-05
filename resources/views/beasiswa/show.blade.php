@extends('layouts.app')

@section('title', $beasiswa->judul)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Back Button -->
        <a href="{{ route('beasiswa.index') }}" class="inline-flex items-center text-amber-600 hover:text-amber-700 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Daftar Beasiswa
        </a>

        <!-- Scholarship Header -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            @if($beasiswa->foto)
            <img src="{{ asset('storage/' . $beasiswa->foto) }}" alt="{{ $beasiswa->judul }}" class="w-full h-64 object-cover">
            @else
            <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            @endif

            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="px-3 py-1 text-sm font-semibold rounded-full @if($beasiswa->jenis == 'Penuh') bg-green-100 text-green-800 @else bg-blue-100 text-blue-800 @endif">
                            {{ $beasiswa->jenis }}
                        </span>
                        <span class="ml-2 px-3 py-1 text-sm font-semibold rounded-full @if($beasiswa->status == 'sudah disetujui') bg-green-100 text-green-800 @else bg-amber-100 text-amber-800 @endif">
                            {{ $beasiswa->status }}
                        </span>
                    </div>
                    <span class="text-sm text-gray-500">{{ $beasiswa->created_at->diffForHumans() }}</span>
                </div>

                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">{{ $beasiswa->judul }}</h1>

                <div class="flex flex-wrap items-center text-sm text-gray-500 mb-4">
                    <div class="flex items-center mr-4 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $beasiswa->wilayah }}
                    </div>
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Deadline: {{ date('d M Y', strtotime($beasiswa->deadline)) }}
                    </div>
                </div>

                <p class="text-gray-700 mb-6">{{ $beasiswa->deskripsi_singkat }}</p>

                <div class="prose max-w-none mb-6">
                    {!! nl2br(e($beasiswa->deskripsi)) !!}
                </div>

                <div class="mt-6">
                    <a href="{{ $beasiswa->link_pendaftaran }}" target="_blank" class="inline-block bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-6 rounded-lg transition duration-300">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>

        <!-- Admin Actions -->
        @if(auth()->user() && (auth()->user()->role === 'admin' || auth()->user()->role === 'admin'))
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Admin Actions</h3>
            <div class="flex space-x-4">
                @if(auth()->user() && auth()->user()->role === 'admin')
                <a href="{{ route('beasiswa.edit', $beasiswa->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                    Edit Beasiswa
                </a>
                @endif
                @if(auth()->user() && auth()->user()->role === 'super admin')
                @if($beasiswa->status == 'menunggu persetujuan')
                <form action="{{ route('beasiswa.approve', $beasiswa->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                        Setujui Beasiswa
                    </button>
                </form>
                @endif
                <form action="{{ route('beasiswa.destroy', $beasiswa->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus beasiswa ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                        Hapus Beasiswa
                    </button>
                </form>
                @endif
            </div>
        </div>
        @endif
        <div class="bg-white rounded-lg shadow-md p-6 mb-6 max-w-4xl">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Komentar ({{ $beasiswa->komentar->count() }})</h3>

        @auth
        <!-- Comment Form -->
        <form action="{{ route('comment.store') }}" method="POST" class="mb-6">
            @csrf
            <input type="hidden" name="beasiswa_id" value="{{ $beasiswa->id }}">
            <div class="mb-4">
                <label for="content" class="sr-only">Komentar</label>
                <textarea name="content" id="content" rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500 @error('content') border-red-500 @enderror"
                placeholder="Tulis komentar Anda..." required></textarea>
                @error('content')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                Kirim Komentar
            </button>
        </form>
            @else
            <div class="bg-amber-50 border-l-4 border-amber-400 p-4 mb-6">
                <p class="text-amber-700">Silakan <a href="{{ route('login') }}" class="text-amber-600 hover:text-amber-800 font-medium">login</a> untuk meninggalkan komentar.</p>
            </div>
            @endauth

            <!-- Comments List -->
            <div class="space-y-4">
                @forelse ($beasiswa->komentar as $comment)
                <div class="border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-800 font-semibold">
                                {{ substr($comment->user->name, 0, 1) }}
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h4 class="font-medium text-gray-900">{{ $comment->user->name }}</h4>
                                <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-700 mt-1">{{ $comment->komentar }}</p>

                            @if(auth()->id() === $comment->user_id || auth()->user()?->is_admin)
                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs text-red-500 hover:text-red-700">
                                    Hapus
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-center py-4">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                @endforelse
            </div>
        </div>
    </div>

    </div>
@endsection
