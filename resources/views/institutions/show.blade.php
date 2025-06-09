@extends('layouts.app')

@section('title', $institution->name)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('institutions.index') }}" class="inline-flex items-center text-amber-600 hover:text-amber-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali ke Daftar
            </a>

            @if($institution->status == 'menunggu persetujuan' && auth()->user()->role === 'super admin')
            <form action="{{ route('institutions.approve', $institution->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                    Setujui Institusi
                </button>
            </form>
            @endif
        </div>

        <!-- Card Institusi -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header Card -->
            <div class="bg-amber-50 px-6 py-4 border-b border-amber-200">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="h-16 w-16 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 text-2xl font-bold">
                            {{ substr($institution->name, 0, 1) }}
                        </div>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">{{ $institution->name }}</h2>
                        <div class="flex items-center mt-1">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                @if($institution->status == 'sudah disetujui') bg-green-100 text-green-800
                                @else bg-amber-100 text-amber-800 @endif">
                                {{ $institution->status }}
                            </span>
                            <span class="ml-2 text-sm text-gray-500">Terdaftar: {{ $institution->created_at->translatedFormat('d F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Body Card -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Informasi Utama -->
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Email</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $institution->user()->first()->email }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Jenis Institusi</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $institution->type }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Alamat</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $institution->address }}</p>
                        </div>
                    </div>

                    <!-- Informasi Tambahan -->
                    <div class="space-y-4">
                        @if($institution->website)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Website</h3>
                            <a href="{{ $institution->website }}" target="_blank" class="mt-1 text-sm text-amber-600 hover:text-amber-700">
                                {{ $institution->website }}
                            </a>
                        </div>
                        @endif

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Dokumen Pendukung</h3>
                            <a href="{{  $institution->document_path }}" target="_blank" class="mt-1 inline-flex items-center text-sm text-amber-600 hover:text-amber-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                Lihat Dokumen
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
