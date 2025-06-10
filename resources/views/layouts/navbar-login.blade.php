<nav class="sticky top-0 bg-amber-600 text-white shadow-lg z-50">
    <div class="container mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo and Desktop Navigation -->
            <div class="flex items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-graduation-cap text-2xl"></i>
                    <span class="text-xl font-bold">ScholarMate</span>
                </div>
                <div class="hidden md:flex items-center ml-10 space-x-6">
                    <a href="{{ route('dashboard') }}" class="text-amber-200 hover:text-white py-2 rounded-md text-sm font-medium">Dashboard</a>
                    <a href="{{ route('konten.index') }}" class="text-amber-200 hover:text-white py-2 rounded-md text-sm font-medium">Konten</a>
                    <a href="{{ route('beasiswa.index') }}" class="text-amber-200 hover:text-white py-2 rounded-md text-sm font-medium">Beasiswa</a>
                    @if (auth()->user()?->role === 'super admin')
                        <a href="{{ route('institutions.index') }}" class="text-amber-200 hover:text-white py-2 rounded-md text-sm font-medium">Institusi</a>
                    @endif
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-amber-200 hover:text-white hover:bg-amber-700 focus:outline-none">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- User Menu (Desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                <div class="relative">
                    <a href="{{ route('notifications.index') }}" class="text-amber-200 hover:text-white focus:outline-none" id="notification-btn">
                        <i class="far fa-bell text-xl"></i>
                            @if ($notif > 0)
                            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                            @endif
                    </a>
                </div>
                <div class="relative">
                    <button id="dropdownToggle" class="flex items-center space-x-2 focus:outline-none cursor-pointer">
                        <div class="h-8 w-8 rounded-full bg-amber-200 flex items-center justify-center text-amber-800 font-semibold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="text-amber-200 hover:text-white">{{ Auth::user()->name }}</span>
                    </button>
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        <a href="{{ route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 cursor-pointer">Profil Saya</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-amber-50 cursor-pointer">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-amber-700">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-amber-200 hover:text-white hover:bg-amber-600">Konten</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-amber-200 hover:text-white hover:bg-amber-600">Beasiswa</a>
        </div>
        <div class="pt-4 pb-3 border-t border-amber-800">
            <div class="flex items-center px-5">
                <div class="h-10 w-10 rounded-full bg-amber-200 flex items-center justify-center text-amber-800 font-semibold">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                </div>
            </div>
            <div class="mt-3 px-2 space-y-1">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-amber-200 hover:text-white hover:bg-amber-600">Profil Saya</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-amber-200 hover:text-white hover:bg-amber-600">Pengaturan</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-amber-200 hover:text-white hover:bg-amber-600">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('dropdownToggle');
        const dropdownMenu = document.getElementById('dropdownMenu');

        if (toggleButton && dropdownMenu) {
            toggleButton.addEventListener('mouseenter', function () {
                dropdownMenu.classList.remove('hidden');
            });

            toggleButton.addEventListener('mouseleave', function () {
                setTimeout(function () {
                    if (!dropdownMenu.matches(':hover')) {
                        dropdownMenu.classList.add('hidden');
                    }
                }, 1000);
            });

            dropdownMenu.addEventListener('mouseleave', function () {
                dropdownMenu.classList.add('hidden');
            });

            dropdownMenu.addEventListener('mouseenter', function () {
                dropdownMenu.classList.remove('hidden');
            });
        }

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                const isHidden = mobileMenu.classList.contains('hidden');

                // Toggle mobile menu visibility
                mobileMenu.classList.toggle('hidden');

                // Toggle hamburger icon
                const svgIcons = mobileMenuButton.querySelectorAll('svg');
                svgIcons.forEach(icon => icon.classList.toggle('hidden'));
            });
        }
    });
</script>
