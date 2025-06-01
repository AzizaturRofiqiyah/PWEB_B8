@extends('layouts.app')

@section('title', 'Registrasi Admin - ScholarMate')

@section('navbar')
<nav class="sticky top-0 bg-amber-600 text-white shadow-lg z-50">
    <div class="container mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" class="h-8 w-8" alt="ScholarMate Icon">
                    <span class="text-xl font-bold">ScholarMate</span>
                </div>
            </div>
            <div class="flex items-center">
                <a href="/login" class="text-amber-200 hover:text-white font-medium">Sudah punya akun? Masuk</a>
            </div>
        </div>
    </div>
</nav>
@endsection

@section('content')
<div class="min-h-screen bg-amber-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Registrasi Admin Lembaga
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Formulir pendaftaran khusus untuk petugas/operator lembaga penyelenggara beasiswa
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-3xl">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="{{ route('register-admin') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Informasi Pribadi -->
                <div class="border-b border-gray-200 pb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pribadi</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1">
                                <input id="name" name="name" type="text" autocomplete="name" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                            </div>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1">
                                <input id="phone" name="phone" type="tel" autocomplete="tel" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                            </div>
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="position" class="block text-sm font-medium text-gray-700">
                                Jabatan <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1">
                                <input id="position" name="position" type="text" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                            </div>
                            @error('position')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Informasi Lembaga -->
                <div class="border-b border-gray-200 pb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Lembaga</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="institution_name" class="block text-sm font-medium text-gray-700">
                                Nama Lembaga <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1">
                                <input id="institution_name" name="institution_name" type="text" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                            </div>
                            @error('institution_name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="institution_type" class="block text-sm font-medium text-gray-700">
                                Jenis Lembaga <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1">
                                <select id="institution_type" name="institution_type" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                                    <option value="">Pilih Jenis Lembaga</option>
                                    <option value="government">Pemerintah</option>
                                    <option value="university">Perguruan Tinggi</option>
                                    <option value="private">Swasta</option>
                                    <option value="foundation">Yayasan</option>
                                    <option value="international">Lembaga Internasional</option>
                                </select>
                            </div>
                            @error('institution_type')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="institution_address" class="block text-sm font-medium text-gray-700">
                                Alamat Lembaga <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1">
                                <textarea id="institution_address" name="institution_address" rows="2" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm"></textarea>
                            </div>
                            @error('institution_address')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="institution_website" class="block text-sm font-medium text-gray-700">
                                Website Lembaga
                            </label>
                            <div class="mt-1">
                                <input id="institution_website" name="institution_website" type="url"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                            </div>
                            @error('institution_website')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="institution_document" class="block text-sm font-medium text-gray-700">
                                Dokumen Legal Lembaga <span class="text-red-500">*</span>
                                <span class="text-xs text-gray-500">(Surat Keputusan/Akta Notaris)</span>
                            </label>
                            <div class="mt-1">
                                <input id="institution_document" name="institution_document" type="file" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                            </div>
                            @error('institution_document')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Keamanan Akun -->
                <div class="pb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Keamanan Akun</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Password <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1 relative">
                                <input id="password" name="password" type="password" autocomplete="new-password" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 cursor-pointer hover:text-gray-600" onclick="togglePassword('password')">
                                    <i class="far fa-eye" id="togglePasswordIcon"></i>
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">Minimal 8 karakter, kombinasi huruf dan angka</p>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                Konfirmasi Password <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1 relative">
                                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 cursor-pointer hover:text-gray-600" onclick="togglePassword('password_confirmation')">
                                    <i class="far fa-eye" id="togglePasswordConfirmationIcon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Persetujuan -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" name="terms" type="checkbox" required
                            class="focus:ring-amber-500 h-4 w-4 text-amber-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="font-medium text-gray-700">
                            Saya menyatakan bahwa semua informasi yang diberikan adalah benar
                        </label>
                        <p class="text-gray-500">Dengan mendaftar, saya menyetujui <a href="#" class="text-amber-600 hover:text-amber-500">Syarat & Ketentuan</a> dan <a href="#" class="text-amber-600 hover:text-amber-500">Kebijakan Privasi</a> ScholarMate</p>
                    </div>
                    @error('terms')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-6">
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                        Daftarkan Akun Admin
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = document.getElementById(fieldId === 'password' ? 'togglePasswordIcon' : 'togglePasswordConfirmationIcon');

        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endsection
