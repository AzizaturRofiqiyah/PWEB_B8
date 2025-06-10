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
            <button onclick="openModal()" class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                Edit Profil
            </button>
        </div>
    </div>
</div>

<!-- Modal (Simplified - Only Name and Email) -->
<div id="editProfileModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4">
        <div class="p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Edit Profil</h2>

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ $user->name }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500">
                    </div>
                      <div>
                    <p class="text-sm text-gray-600">Role</p>
                    <p class="text-gray-800 font-medium">{{ ucfirst($user->role) }}</p>
                </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded-md hover:bg-amber-700">
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
    }

    function closeModal() {
        document.getElementById('editProfileModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.getElementById('editProfileModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
@endsection
