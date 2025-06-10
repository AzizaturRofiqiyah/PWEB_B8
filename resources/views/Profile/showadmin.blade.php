@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="max-w-2xl w-full bg-white rounded-lg shadow-lg overflow-hidden mx-auto my-8">
    <!-- Profile Header -->
    <div class="bg-amber-500 p-6 text-center">
        <div class="h-20 w-20 rounded-full bg-amber-200 flex items-center justify-center text-amber-800 font-bold text-3xl mx-auto">
            {{ substr(Auth::user()->name, 0, 1) }}
        </div>
        <h1 class="mt-4 text-2xl font-bold text-white">{{ $user->name }}</h1>
        <p class="text-amber-100 mt-1">{{ ucfirst($user->role) }}</p>
    </div>

    <!-- Profile Details -->
    <div class="p-6">
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Personal Information -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-2 border-b pb-2">Informasi Pribadi</h2>

                <div>
                    <p class="text-sm text-gray-600">Nama Lengkap</p>
                    <p class="text-gray-800 font-medium">{{ $user->name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Alamat Email</p>
                    <p class="text-gray-800 font-medium">{{ $user->email }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Role</p>
                    <p class="text-gray-800 font-medium">{{ ucfirst($user->role) }}</p>
                </div>
            </div>

            <!-- Institution Information -->
            @if($user->institution)
            <div class="space-y-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-2 border-b pb-2">Informasi Institusi</h2>

                <div>
                    <p class="text-sm text-gray-600">Nama Institusi</p>
                    <p class="text-gray-800 font-medium">{{ $institution->name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Jenis Institusi</p>
                    <p class="text-gray-800 font-medium">{{ ucfirst($institution->type) }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Status</p>
                    <p class="text-gray-800 font-medium">{{ ucfirst($institution->status) }}</p>
                </div>

                @if($institution->address)
                <div>
                    <p class="text-sm text-gray-600">Alamat</p>
                    <p class="text-gray-800 font-medium">{{ $institution->address }}</p>
                </div>
                @endif

                @if($institution->website)
                <div>
                    <p class="text-sm text-gray-600">Website</p>
                    <a href="{{ $institution->website }}" target="_blank" class="text-amber-600 hover:text-amber-700 font-medium">
                        {{ $institution->website }}
                    </a>
                </div>
                @endif
            </div>
            @endif
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200 flex justify-between">
            <a href="{{-- route('profile.edit') --}}" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
                Edit Profil
            </a>
            @if($institution && $institution->document_path)
            <a href="{{ $institution->document_path }}" target="_blank" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-6 rounded-lg transition duration-200">
                Lihat Dokumen
            </a>
            @endif
        </div>
    </div>
</div>
@endsection
