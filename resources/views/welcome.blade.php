@extends('layouts.app')

@section('title', 'ScholarMate - Teman Perjalanan Menuju Beasiswa Impian')

@section('content')

<section class="bg-gradient-to-b from-amber-500 to-amber-600 text-white py-20">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Temukan Beasiswa Impianmu dengan Mudah</h1>
                <p class="text-xl mb-8">ScholarMate membantu mahasiswa Indonesia menemukan dan mengakses
                    berbagai program beasiswa dalam satu platform terintegrasi.</p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="/register"
                        class="bg-white text-amber-600 hover:bg-amber-50 font-bold py-3 px-6 rounded-lg text-center transition duration-300">
                        Daftar Sekarang
                    </a>
                    <a href="#beasiswa"
                        class="bg-transparent border-2 border-white text-white hover:bg-amber-700 font-bold py-3 px-6 rounded-lg text-center transition duration-300">
                        Lihat Beasiswa
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="{{ asset('images/hero-image.png') }}" alt="Student with laptop"
                    class="w-full max-w-md">
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="p-6">
                <div class="text-4xl font-bold text-amber-600 mb-2">500+</div>
                <div class="text-gray-600">Beasiswa Tersedia</div>
            </div>
            <div class="p-6">
                <div class="text-4xl font-bold text-amber-600 mb-2">50+</div>
                <div class="text-gray-600">Lembaga Mitra</div>
            </div>
            <div class="p-6">
                <div class="text-4xl font-bold text-amber-600 mb-2">10K+</div>
                <div class="text-gray-600">Pengguna Terdaftar</div>
            </div>
            <div class="p-6">
                <div class="text-4xl font-bold text-amber-600 mb-2">1K+</div>
                <div class="text-gray-600">Penerima Beasiswa</div>
            </div>
        </div>
    </div>
</section>

<!-- Problem Section -->
<section class="py-16 bg-amber-100">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Masalah yang Kami Atasi</h2>
            <div class="w-24 h-1 bg-amber-500 mx-auto"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="text-amber-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Informasi Tersebar</h3>
                <p class="text-gray-600">Informasi beasiswa seringkali tersebar di berbagai platform yang tidak
                    terpusat, menyulitkan calon pendaftar.</p>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="text-amber-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Proses Rumit</h3>
                <p class="text-gray-600">Proses pencarian dan pendaftaran beasiswa seringkali rumit dan memakan
                    banyak waktu.</p>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="text-amber-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Kurangnya Literasi Digital</h3>
                <p class="text-gray-600">Tidak semua calon penerima beasiswa memiliki kemampuan literasi
                    digital yang memadai.</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="fitur" class="py-16 bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Fitur Unggulan ScholarMate</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Platform lengkap untuk membantu Anda menemukan
                dan mengelola aplikasi beasiswa</p>
            <div class="w-24 h-1 bg-amber-500 mx-auto mt-4"></div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-amber-50 p-8 rounded-lg border border-amber-200">
                <div class="text-amber-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Pencarian Cerdas</h3>
                <p class="text-gray-600">Temukan beasiswa yang sesuai dengan profil Anda menggunakan filter
                    canggih berdasarkan jurusan, negara, jenjang pendidikan, dan kriteria lainnya.</p>
            </div>

            <div class="bg-amber-50 p-8 rounded-lg border border-amber-200">
                <div class="text-amber-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Manajemen Dokumen</h3>
                <p class="text-gray-600">Simpan dan kelola dokumen-dokumen penting untuk pendaftaran beasiswa
                    dalam satu tempat yang aman.</p>
            </div>

            <div class="bg-amber-50 p-8 rounded-lg border border-amber-200">
                <div class="text-amber-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Pengingat Deadline</h3>
                <p class="text-gray-600">Jangan lewatkan deadline penting dengan sistem notifikasi dan
                    pengingat otomatis kami.</p>
            </div>

            <div class="bg-amber-50 p-8 rounded-lg border border-amber-200">
                <div class="text-amber-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Panduan Langkah Demi Langkah</h3>
                <p class="text-gray-600">Ikuti panduan lengkap untuk setiap beasiswa mulai dari persiapan
                    hingga tahap wawancara.</p>
            </div>

            <div class="bg-amber-50 p-8 rounded-lg border border-amber-200">
                <div class="text-amber-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Komunitas</h3>
                <p class="text-gray-600">Bergabung dengan komunitas penerima beasiswa untuk berbagi pengalaman
                    dan tips.</p>
            </div>

            <div class="bg-amber-50 p-8 rounded-lg border border-amber-200">
                <div class="text-amber-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Analisis Peluang</h3>
                <p class="text-gray-600">Dapatkan rekomendasi beasiswa yang paling cocok dengan profil akademik
                    dan prestasi Anda.</p>
            </div>
        </div>
    </div>
</section>

<!-- Scholarship Section -->
<section id="beasiswa" class="py-16 bg-amber-100">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Beasiswa Terbaru</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Temukan berbagai program beasiswa dalam dan luar
                negeri</p>
            <div class="w-24 h-1 bg-amber-500 mx-auto mt-4"></div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Scholarship Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-amber-500 text-white px-4 py-2">
                    <span class="text-sm font-semibold">Beasiswa Penuh</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Beasiswa LPDP</h3>
                    <p class="text-gray-600 mb-4">Beasiswa S2/S3 dalam dan luar negeri dari pemerintah
                        Indonesia</p>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Dalam/Luar Negeri
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Deadline: 30 Juni 2023
                    </div>
                    <a href="#"
                        class="inline-block bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded transition duration-300">
                        Lihat Detail
                    </a>
                </div>
            </div>

            <!-- Scholarship Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-amber-400 text-white px-4 py-2">
                    <span class="text-sm font-semibold">Beasiswa Parsial</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Beasiswa Erasmus+</h3>
                    <p class="text-gray-600 mb-4">Beasiswa studi di Eropa untuk mahasiswa internasional</p>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Eropa
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Deadline: 15 Januari 2023
                    </div>
                    <a href="#"
                        class="inline-block bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded transition duration-300">
                        Lihat Detail
                    </a>
                </div>
            </div>

            <!-- Scholarship Card 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-amber-500 text-white px-4 py-2">
                    <span class="text-sm font-semibold">Beasiswa Penuh</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Beasiswa Kemenag</h3>
                    <p class="text-gray-600 mb-4">Beasiswa untuk studi keagamaan di dalam negeri</p>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Dalam Negeri
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Deadline: 31 Maret 2023
                    </div>
                    <a href="#"
                        class="inline-block bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded transition duration-300">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="#"
                class="inline-block bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                Lihat Semua Beasiswa
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="tentang" class="py-16 bg-amber-100">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0 md:pr-10">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Tentang ScholarMate</h2>
                <div class="w-24 h-1 bg-amber-500 mb-6"></div>
                <p class="text-gray-700 mb-4">ScholarMate lahir dari keprihatinan akan kesulitan yang dihadapi
                    mahasiswa Indonesia dalam mengakses informasi beasiswa yang tersebar di berbagai platform.
                </p>
                <p class="text-gray-700 mb-4">Kami berkomitmen untuk menjadi jembatan antara calon penerima
                    beasiswa dengan penyedia beasiswa, baik dari dalam maupun luar negeri.</p>
                <p class="text-gray-700">Dengan tim yang terdiri dari para penerima beasiswa berpengalaman,
                    kami memahami betul tantangan yang dihadapi dan berusaha memberikan solusi terbaik.</p>
            </div>
            <div class="md:w-1/2">
                <img src="{{ asset('images/about-image.jpg') }}" alt="Team meeting"
                    class="rounded-lg shadow-lg w-full">
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="py-16 bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Pertanyaan yang Sering Diajukan</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Temukan jawaban atas pertanyaan Anda</p>
            <div class="w-24 h-1 bg-amber-500 mx-auto mt-4"></div>
        </div>

        <div class="max-w-3xl mx-auto">
            <div class="border border-gray-200 rounded-lg mb-4">
                <button
                    class="faq-question flex justify-between items-center w-full p-6 text-left bg-amber-50 hover:bg-amber-100 transition duration-300">
                    <span class="font-medium text-lg">Apa itu ScholarMate?</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-amber-600 transform transition-transform duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden p-6">
                    <p class="text-gray-700">ScholarMate adalah platform informasi beasiswa terintegrasi yang
                        membantu mahasiswa Indonesia menemukan dan mengakses berbagai program beasiswa dari
                        dalam maupun luar negeri dalam satu tempat. Kami menyediakan informasi terupdate,
                        panduan pendaftaran, dan alat bantu untuk mempermudah proses aplikasi beasiswa.</p>
                </div>
            </div>
            <div class="border border-gray-200 rounded-lg mb-4">
                <button
                    class="faq-question flex justify-between items-center w-full p-6 text-left bg-amber-50 hover:bg-amber-100 transition duration-300">
                    <span class="font-medium text-lg">Apakah menggunakan ScholarMate berbayar?</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-amber-600 transform transition-transform duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden p-6">
                    <p class="text-gray-700">Tidak! ScholarMate sepenuhnya gratis untuk digunakan oleh
                        mahasiswa dan calon penerima beasiswa. Kami berkomitmen untuk tetap menyediakan layanan
                        ini secara gratis sebagai bentuk kontribusi kami terhadap pendidikan di Indonesia.</p>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg mb-4">
                <button
                    class="faq-question flex justify-between items-center w-full p-6 text-left bg-amber-50 hover:bg-amber-100 transition duration-300">
                    <span class="font-medium text-lg">Bagaimana cara mendaftar beasiswa melalui
                        ScholarMate?</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-amber-600 transform transition-transform duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden p-6">
                    <p class="text-gray-700">ScholarMate adalah platform informasi, bukan penyelenggara
                        beasiswa. Setelah menemukan beasiswa yang sesuai di ScholarMate, Anda akan diarahkan ke
                        situs resmi penyelenggara untuk proses pendaftaran. Namun, kami menyediakan panduan
                        lengkap dan checklist dokumen yang diperlukan untuk mempermudah proses pendaftaran Anda.
                    </p>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg mb-4">
                <button
                    class="faq-question flex justify-between items-center w-full p-6 text-left bg-amber-50 hover:bg-amber-100 transition duration-300">
                    <span class="font-medium text-lg">Bagaimana cara memastikan informasi beasiswa di
                        ScholarMate valid?</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-amber-600 transform transition-transform duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden p-6">
                    <p class="text-gray-700">Tim ScholarMate selalu memverifikasi informasi beasiswa langsung
                        dari sumber resmi sebelum mempublikasikannya. Kami juga menyertakan link ke situs resmi
                        penyelenggara pada setiap informasi beasiswa. Jika Anda menemukan informasi yang
                        mencurigakan, Anda bisa melaporkannya melalui fitur 'Lapor' yang tersedia di setiap
                        halaman beasiswa.</p>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg mb-4">
                <button
                    class="faq-question flex justify-between items-center w-full p-6 text-left bg-amber-50 hover:bg-amber-100 transition duration-300">
                    <span class="font-medium text-lg">Apakah ScholarMate menyediakan konsultasi
                        beasiswa?</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-amber-600 transform transition-transform duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="faq-answer hidden p-6">
                    <p class="text-gray-700">Saat ini ScholarMate menyediakan panduan umum dan tips melalui
                        artikel-artikel di platform kami. Untuk konsultasi personal, kami memiliki forum
                        komunitas dimana Anda bisa berdiskusi dengan penerima beasiswa lainnya. Kami juga secara
                        berkala mengadakan webinar gratis dengan para ahli dan penerima beasiswa.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-amber-600 text-white">
    <div class="container mx-auto px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-6">Siap Memulai Perjalanan Beasiswa Anda?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">Bergabunglah dengan ribuan mahasiswa lainnya yang telah
            menemukan beasiswa impian melalui ScholarMate</p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="/register"
                class="bg-white text-amber-600 hover:bg-amber-50 font-bold py-3 px-8 rounded-lg transition duration-300">
                Daftar Gratis
            </a>
            <a href="#beasiswa"
                class="bg-transparent border-2 border-white text-white hover:bg-amber-700 font-bold py-3 px-8 rounded-lg transition duration-300">
                Jelajahi Beasiswa
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="mb-8 md:mb-0">
                <div class="flex items-center space-x-2 mb-4">
                    <img src="{{ asset('images/logo-white.png') }}" class="h-8 w-8" alt="ScholarMate Icon">
                    <span class="text-xl font-bold">ScholarMate</span>
                </div>
                <p class="text-gray-400">Platform informasi beasiswa terintegrasi untuk membantu mahasiswa
                    Indonesia mencapai impian akademis mereka.</p>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                <ul class="space-y-2">
                    <li><a href="#"
                            class="text-gray-400 hover:text-amber-400 transition duration-300">Beranda</a></li>
                    <li><a href="#fitur"
                            class="text-gray-400 hover:text-amber-400 transition duration-300">Fitur</a></li>
                    <li><a href="#beasiswa"
                            class="text-gray-400 hover:text-amber-400 transition duration-300">Beasiswa</a>
                    </li>
                    <li><a href="#tentang"
                            class="text-gray-400 hover:text-amber-400 transition duration-300">Tentang Kami</a>
                    </li>
                    <li><a href="#faq"
                            class="text-gray-400 hover:text-amber-400 transition duration-300">FAQ</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Kontak Kami</h3>
                <ul class="space-y-2 text-gray-400">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        info@scholarmate.id
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        +62 21 1234 5678
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Jl. Pendidikan No. 123, Jakarta
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Ikuti Kami</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-amber-400 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-amber-400 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-amber-400 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-amber-400 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
            <p>&copy; 2023 ScholarMate. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const answer = question.nextElementSibling;
            const icon = question.querySelector('svg');

            answer.classList.toggle('hidden');

            if (answer.classList.contains('hidden')) {
                icon.classList.remove('rotate-180');
            } else {
                icon.classList.add('rotate-180');
            }

            faqQuestions.forEach(q => {
                if (q !== question) {
                    q.nextElementSibling.classList.add('hidden');
                    q.querySelector('svg').classList.remove('rotate-180');
                }
            });
        });
    });
</script>
@endsection
