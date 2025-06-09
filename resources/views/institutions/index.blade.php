@extends('layouts.app')

@section('title', 'Daftar Institusi')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Institusi</h1>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <!-- Filter Section -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Jenis Institusi</label>
                <select id="type" name="type" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-amber-500 focus:border-amber-500">
                    <option value="">Semua Jenis</option>
                    <option value="Yayasan" {{ request('type') == 'Yayasan' ? 'selected' : '' }}>Yayasan</option>
                    <option value="Universitas" {{ request('type') == 'Universitas' ? 'selected' : '' }}>Universitas</option>
                    <option value="Pemerintah" {{ request('type') == 'Pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                    <option value="Lainnya" {{ request('type') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="status" name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-amber-500 focus:border-amber-500">
                    <option value="">Semua Status</option>
                    <option value="menunggu persetujuan" {{ request('status') == 'menunggu persetujuan' ? 'selected' : '' }}>Menunggu Persetujuan</option>
                    <option value="sudah disetujui" {{ request('status') == 'sudah disetujui' ? 'selected' : '' }}>Sudah Disetujui</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                    Filter
                </button>
                <a href="{{ route('institutions.index') }}" class="ml-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-300">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Institusi Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Institusi
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Jenis
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($institutions as $institution)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 bg-amber-100 rounded-full flex items-center justify-center text-amber-600">
                                    {{ substr($institution->name, 0, 1) }}
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $institution->name }}</div>
                                    @if($institution->website)
                                    <div class="text-sm text-gray-500">
                                        <a href="{{ $institution->website }}" target="_blank" class="text-amber-600 hover:text-amber-700">
                                            {{ parse_url($institution->website, PHP_URL_HOST) }}
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $institution->type }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 max-w-xs truncate">
                                {{ $institution->user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                @if($institution->status == 'sudah disetujui') bg-green-100 text-green-800
                                @else bg-amber-100 text-amber-800 @endif">
                                {{ $institution->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('institutions.show', $institution->id) }}" class="text-amber-600 hover:text-amber-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                @if($institution->status == 'menunggu persetujuan' && auth()->user()->role === 'super admin')
                                <form action="{{ route('institutions.approve', $institution->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:text-green-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data institusi ditemukan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($institutions->hasPages())
    <div class="mt-4">
        {{ $institutions->links() }}
    </div>
    @endif
</div>
@endsection
