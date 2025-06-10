@extends('layouts.app')

@section('title', 'Edit Beasiswa')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Beasiswa</h1>
            <a href="{{ route('beasiswa.index') }}" class="text-amber-600 hover:text-amber-700">
                Kembali ke Daftar
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('beasiswa.update', $beasiswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kolom 1 -->
                    <div class="space-y-4">
                        <!-- Judul -->
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Beasiswa*</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $beasiswa->judul) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500 @error('judul') border-red-500 @enderror"
                                   required>
                            @error('judul')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi Singkat -->
                        <div>
                            <label for="deskripsi_singkat" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat*</label>
                            <textarea name="deskripsi_singkat" id="deskripsi_singkat" rows="3"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500 @error('deskripsi_singkat') border-red-500 @enderror"
                                      required>{{ old('deskripsi_singkat', $beasiswa->deskripsi_singkat) }}</textarea>
                            @error('deskripsi_singkat')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jenis Beasiswa -->
                        <div>
                            <label for="jenis" class="block text-sm font-medium text-gray-700 mb-1">Jenis Beasiswa*</label>
                            <select name="jenis" id="jenis"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500 @error('jenis') border-red-500 @enderror"
                                    required>
                                <option value="Penuh" {{ old('jenis', $beasiswa->jenis) == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                                <option value="Parsial" {{ old('jenis', $beasiswa->jenis) == 'Parsial' ? 'selected' : '' }}>Parsial</option>
                            </select>
                            @error('jenis')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Kolom 2 -->
                    <div class="space-y-4">
                        <!-- Wilayah -->
                        <div>
                            <label for="wilayah" class="block text-sm font-medium text-gray-700 mb-1">Wilayah*</label>
                            <select name="wilayah" id="wilayah"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500 @error('wilayah') border-red-500 @enderror"
                                    required>
                                <option value="Dalam Negeri" {{ old('wilayah', $beasiswa->wilayah) == 'Dalam Negeri' ? 'selected' : '' }}>Dalam Negeri</option>
                                <option value="Luar Negeri" {{ old('wilayah', $beasiswa->wilayah) == 'Luar Negeri' ? 'selected' : '' }}>Luar Negeri</option>
                                <option value="Dalam/Luar Negeri" {{ old('wilayah', $beasiswa->wilayah) == 'Dalam/Luar Negeri' ? 'selected' : '' }}>Dalam/Luar Negeri</option>
                            </select>
                            @error('wilayah')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deadline -->
                        <div>
                            <label for="deadline" class="block text-sm font-medium text-gray-700 mb-1">Deadline*</label>
                            <input type="date" name="deadline" id="deadline" value="{{ old('deadline', $beasiswa->deadline->format('Y-m-d')) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500 @error('deadline') border-red-500 @enderror"
                                   min="{{ date('Y-m-d') }}" required>
                            @error('deadline')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Link Pendaftaran -->
                        <div>
                            <label for="link_pendaftaran" class="block text-sm font-medium text-gray-700 mb-1">Link Pendaftaran*</label>
                            <input type="url" name="link_pendaftaran" id="link_pendaftaran" value="{{ old('link_pendaftaran', $beasiswa->link_pendaftaran) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500 @error('link_pendaftaran') border-red-500 @enderror"
                                   placeholder="https://contoh.com/pendaftaran" required>
                            @error('link_pendaftaran')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Deskripsi Lengkap -->
                <div class="mt-6">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Lengkap*</label>
                    <textarea name="deskripsi" id="deskripsi" rows="6"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500 @error('deskripsi') border-red-500 @enderror"
                              required>{{ old('deskripsi', $beasiswa->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Upload Foto -->
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto Saat Ini</label>
                    @if($beasiswa->foto)
                        <div class="mt-2">
                            <img src="{{ $beasiswa->foto) }}" alt="Foto Beasiswa" class="h-32 w-auto rounded-lg">
                        </div>
                    @else
                        <div class="mt-2 h-32 w-32 bg-gray-200 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif

                    <label for="foto" class="block text-sm font-medium text-gray-700 mt-4 mb-1">Ganti Foto</label>
                    <div class="mt-1 flex items-center">
                        <input type="file" name="foto" id="foto"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 @error('foto') border-red-500 @enderror"
                               accept="image/*">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengganti foto</p>
                    @error('foto')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('beasiswa.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-6 rounded-lg transition duration-300">
                        Batal
                    </a>
                    <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-6 rounded-lg transition duration-300">
                        Update Beasiswa
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
