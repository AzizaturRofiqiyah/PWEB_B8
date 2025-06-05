@extends('layouts.app')

@section('title', 'Detail Notifikasi')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header dan tombol kembali -->
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('notifications.index') }}" class="inline-flex items-center text-amber-600 hover:text-amber-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali
            </a>

            <div class="flex space-x-2">
                <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-gray-500 hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Card Notifikasi -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-gray-200 flex items-center space-x-3
                @if($notification->tipe === 'success') bg-green-50
                @elseif($notification->tipe === 'warning') bg-amber-50
                @elseif($notification->tipe === 'danger') bg-red-50
                @else bg-blue-50 @endif">
                <div class="flex-shrink-0">
                    <div class="h-10 w-10 rounded-full flex items-center justify-center
                        @if($notification->tipe === 'success') bg-green-100 text-green-600
                        @elseif($notification->tipe === 'warning') bg-amber-100 text-amber-600
                        @elseif($notification->tipe === 'danger') bg-red-100 text-red-600
                        @else bg-blue-100 text-blue-600 @endif">
                        @if($notification->tipe === 'success')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        @elseif($notification->tipe === 'warning')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        @elseif($notification->tipe === 'danger')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                        </svg>
                        @endif
                    </div>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">{{ $notification->judul }}</h2>
                    <p class="text-sm text-gray-500">Diterima: {{ $notification->created_at->translatedFormat('l, d F Y H:i') }}</p>
                </div>
            </div>

            <!-- Isi Notifikasi -->
            <div class="p-6">
                <div class="prose max-w-none">
                    {!! nl2br(e($notification->isi)) !!}
                </div>

                @if($notification->link)
                <div class="mt-6">
                    <a href="{{ $notification->link }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white
                        @if($notification->tipe === 'success') bg-green-600 hover:bg-green-700
                        @elseif($notification->tipe === 'warning') bg-amber-600 hover:bg-amber-700
                        @elseif($notification->tipe === 'danger') bg-red-600 hover:bg-red-700
                        @else bg-blue-600 hover:bg-blue-700 @endif">
                        Lihat Detail
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
                @endif
            </div>

            <!-- Footer -->
            <div class="px-6 py-3 bg-gray-50 text-right text-sm text-gray-500">
                @if($notification->isreaded)
                <span>Dibaca: {{ $notification->updated_at->diffForHumans() }}</span>
                @else
                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-amber-600 hover:text-amber-700 font-medium">
                        Tandai sudah dibaca
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
