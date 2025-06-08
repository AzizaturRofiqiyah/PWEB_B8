<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScholarMate - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-blue-800 text-white w-64 space-y-6 py-7 px-2 fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition duration-200 ease-in-out">
            <div class="text-white flex items-center space-x-2 px-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span class="text-2xl font-extrabold">ScholarMate</span>
            </div>
            <nav>
                @if(auth()->user()->role === 'super admin')
                    <x-dashboard.nav-link href="{{ route('dashboard.super-admin') }}" :active="request()->routeIs('dashboard.super-admin')">
                        <x-icons.dashboard class="w-5 h-5" />
                        Super Admin Dashboard
                    </x-dashboard.nav-link>
                    <x-dashboard.nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                        <x-icons.users class="w-5 h-5" />
                        Kelola Pengguna
                    </x-dashboard.nav-link>
                @endif

                @if(in_array(auth()->user()->role, ['super admin', 'admin']))
                    <x-dashboard.nav-link href="{{ route('konten.index') }}" :active="request()->routeIs('konten.*')">
                        <x-icons.document class="w-5 h-5" />
                        Kelola Konten
                    </x-dashboard.nav-link>
                    <x-dashboard.nav-link href="{{ route('beasiswa.index') }}" :active="request()->routeIs('beasiswa.*')">
                        <x-icons.academic-cap class="w-5 h-5" />
                        Kelola Beasiswa
                    </x-dashboard.nav-link>
                @endif
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-1 md:ml-64">
            <!-- Topbar -->
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h1 class="text-lg font-semibold text-gray-900">
                        @yield('title')
                    </h1>
                    <div class="flex items-center space-x-4">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    Profile
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        Logout
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="py-6 px-4 sm:px-6 lg:px-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
