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
            <button onclick="openModal()" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
                Edit Profil
            </button>
            @if($institution && $institution->document_path)
            <a href="{{ $institution->document_path }}" target="_blank" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-6 rounded-lg transition duration-200">
                Lihat Dokumen
            </a>
            @endif
        </div>
    </div>
</div>
<!-- Edit Profile Modal -->
<div id="editProfileModal" class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl mx-4">
        <div class="p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Edit Profil</h2>

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Personal Information Section -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-700 border-b pb-2">Informasi Pribadi</h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ $user->name }}"
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}"
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500">
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-1">Role</p>
                            <p class="text-gray-800">{{ ucfirst($user->role) }}</p>
                        </div>
                    </div>

                    <!-- Institution Information Section -->
                    @if($user->institution)
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-700 border-b pb-2">Informasi Institusi</h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Institusi</label>
                            <input type="text" value="{{ $institution->name }}"
                                   class="w-full rounded-md border-gray-300 shadow-sm bg-gray-100" disabled>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Institusi</label>
                            <input type="text" value="{{ ucfirst($institution->type) }}"
                                   class="w-full rounded-md border-gray-300 shadow-sm bg-gray-100" disabled>
                        </div>

                        @if($institution->address)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                            <textarea class="w-full rounded-md border-gray-300 shadow-sm bg-gray-100" disabled>{{ $institution->address }}</textarea>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>

                <div class="mt-8 pt-4 border-t border-gray-200 flex justify-between">
                    <button type="button" onclick="closeModal()"
                            class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition duration-200">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-6 py-2 bg-amber-600 text-white rounded-md hover:bg-amber-700 transition duration-200">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('editProfileModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal() {
        document.getElementById('editProfileModal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Close modal when clicking outside or pressing ESC
    document.addEventListener('click', function(e) {
        if (e.target === document.getElementById('editProfileModal')) {
            closeModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('editProfileModal').classList.contains('hidden')) {
            closeModal();
        }
    });
</script>
@endsection
