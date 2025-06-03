@extends('layouts.app')

@section('title', 'Buat Artikel Baru')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Buat Artikel Baru</h1>

        <form action="{{ route('konten.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
            @csrf

            <div class="mb-6">
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Artikel</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500 @error('judul') border-red-500 @enderror"
                       required>
                @error('judul')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="6"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500 @error('deskripsi') border-red-500 @enderror"
                          required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Gambar Artikel</label>
                <input type="file" name="foto" id="foto"
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 @error('foto') border-red-500 @enderror"
                       accept="image/*" required>
                @error('foto')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Format: JPEG, PNG, JPG (Maksimal 2MB)</p>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('konten.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-300">
                    Batal
                </a>
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                    Simpan Artikel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
