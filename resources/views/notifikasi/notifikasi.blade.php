@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Notifikasi</h1>
            @if($notifications->count() > 0)
            <form action="{{ route('notifications.markAllAsRead') }}" method="POST">
                @csrf
                <button type="submit" class="text-amber-600 hover:text-amber-700 text-sm font-medium">
                    Tandai Semua Sudah Dibaca
                </button>
            </form>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @forelse ($notifications as $notification)
            <div class="border-b border-gray-200 last:border-0">
                <a href="{{ route("notifications.show",$notification)}}" class="block hover:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="p-4 flex items-start space-x-3 @if(!$notification->isreaded) bg-amber-50 @endif">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-center">
                                <h3 class="text-sm font-medium text-gray-900">{{ $notification->judul }}</h3>
                                <span class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">{{ $notification->isi }}</p>
                        </div>
                        @if(!$notification->isreaded)
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                            Baru
                        </span>
                        @endif
                    </div>
                </a>
            </div>
            @empty
            <div class="p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada notifikasi</h3>
                <p class="mt-1 text-sm text-gray-500">Anda belum memiliki notifikasi saat ini.</p>
            </div>
            @endforelse
        </div>

        @if($notifications->hasPages())
        <div class="mt-4">
            {{ $notifications->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
