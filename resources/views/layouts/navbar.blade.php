<nav class="sticky top-0 bg-amber-600 text-white shadow-lg">
    <div class="container mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-graduation-cap text-2xl"></i>
                    <span class="text-xl font-bold">ScholarMate</span>
                </div>
            </div>

            <div class="flex items-center space-x-5">
                <div class="hidden md:flex">
                    <a href="#" class="hover:text-amber-200 font-medium px-3 py-2">Beranda</a>
                    <a href="#fitur" class="hover:text-amber-200 font-medium px-3 py-2">Fitur</a>
                    <a href="#beasiswa" class="hover:text-amber-200 font-medium px-3 py-2">Daftar Beasiswa</a>
                    <a href="#tentang" class="hover:text-amber-200 font-medium px-3 py-2">Tentang Kami</a>
                    <a href="#faq" class="hover:text-amber-200 font-medium px-3 py-2">FAQ</a>
                </div>

                <div class="hidden md:block">
                    <a href="{{ route('login') }}" class="whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-amber-600 bg-white hover:bg-amber-50 transition duration-300">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="ml-2 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-700 hover:bg-amber-800 transition duration-300">
                        Daftar
                    </a>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-amber-200 hover:text-white hover:bg-amber-500 focus:outline-none transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-menu hidden md:hidden bg-amber-700 px-4 py-2 gap-2">
        <a href="#" class="block px-3 py-2 hover:text-amber-200">Beranda</a>
        <a href="#fitur" class="block px-3 py-2 hover:text-amber-200">Fitur</a>
        <a href="#beasiswa" class="block px-3 py-2 hover:text-amber-200">Daftar Beasiswa</a>
        <a href="#tentang" class="block px-3 py-2 hover:text-amber-200">Tentang Kami</a>
        <a href="#faq" class="block px-3 py-2 hover:text-amber-200">FAQ</a>
        <div class="flex space-x-2 mt-2">
            <a href="/login" class="block w-1/2 text-center px-3 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-amber-600 bg-white hover:bg-amber-50 transition duration-300">Masuk</a>
            <a href="/register" class="block w-1/2 text-center px-3 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-800 hover:bg-amber-900 transition duration-300">Daftar</a>
        </div>
    </div>
</nav>

<script>
    const btn = document.querySelector('.mobile-menu-button');
    const menu = document.querySelector('.mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
