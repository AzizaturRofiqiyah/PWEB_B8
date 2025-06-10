@extends('layouts.app')

@section('title','Profile')

@section('content')
<div class="max-w-md w-full bg-white rounded-lg shadow-lg overflow-hidden mx-auto my-8">
    <!-- Profile Header -->
    <div class="bg-amber-500 p-6 text-center">
        <div class="h-8 w-8 rounded-full bg-amber-200 flex items-center justify-center text-amber-800 font-semibold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
        <h1 class="mt-4 text-2xl font-bold text-white">{{ $user->name }}</h1>
    </div>

    <!-- Profile Details -->
    <div class="p-6">
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Informasi Profil</h2>

            <div class="space-y-4">
                <div>
                    <p class="text-sm text-gray-600">Nama Lengkap</p>
                    <p class="text-gray-800 font-medium">{{ $user->name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-600">Alamat Email</p>
                    <p class="text-gray-800 font-medium">{{ $user->email }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 pt-6 border-t border-gray-200">
            <a href="#" class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200 inline-block text-center">
                Edit Profil
            </a>
        </div>
    </div>
</div>
@endsection
