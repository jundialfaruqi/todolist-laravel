<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TodoList App - Kelola Tugas Anda dengan Mudah</title>
    <meta name="description"
        content="Aplikasi manajemen tugas yang membantu Anda tetap produktif dan terorganisir. Buat, kelola, dan selesaikan tugas dengan mudah.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-primary-600">TodoList</h1>
                    </div>
                </div>

                <!-- Navigation Links (Desktop) -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#features"
                            class="text-gray-600 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Fitur</a>
                        <a href="#how-it-works"
                            class="text-gray-600 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Cara
                            Kerja</a>
                        <a href="#contact"
                            class="text-gray-600 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Kontak</a>
                    </div>
                </div>

                <!-- Auth Links -->
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="text-gray-600 hover:text-primary-600 px-3 py-2 text-sm font-medium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-gray-600 hover:text-primary-600 px-3 py-2 text-sm font-medium">Masuk</a>
                        <a href="{{ route('register') }}" class="btn-primary">Daftar Gratis</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-20 pb-16 bg-gradient-to-br from-primary-50 to-indigo-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                    Kelola Tugas Anda dengan
                    <span class="text-primary-600">Mudah</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                    TodoList App membantu Anda tetap produktif dan terorganisir. Buat, kelola, dan selesaikan tugas
                    dengan antarmuka yang intuitif dan fitur-fitur canggih.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @guest
                        <a href="{{ route('register') }}" class="btn-primary text-lg px-8 py-3">
                            Mulai Gratis Sekarang
                        </a>
                        <a href="{{ route('login') }}" class="btn-secondary text-lg px-8 py-3">
                            Sudah Punya Akun?
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn-primary text-lg px-8 py-3">
                            Buka Dashboard
                        </a>
                    @endguest
                </div>
            </div>

            <!-- Hero Image/Illustration -->
            <div class="mt-16 relative">
                <div class="bg-white rounded-lg shadow-2xl p-8 max-w-4xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Sample Task Cards -->
                        <div class="space-y-4">
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-yellow-800">Rapat Tim Marketing</p>
                                        <p class="text-xs text-yellow-600">Prioritas: Tinggi</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-lg">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-blue-800">Review Proposal</p>
                                        <p class="text-xs text-blue-600">Prioritas: Sedang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-800 line-through">Update Website</p>
                                        <p class="text-xs text-green-600">Selesai</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded-r-lg">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-purple-800">Presentasi Klien</p>
                                        <p class="text-xs text-purple-600">Besok, 14:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="bg-gray-50 border-l-4 border-gray-400 p-4 rounded-r-lg">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-800">Baca Buku Baru</p>
                                        <p class="text-xs text-gray-600">Prioritas: Rendah</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-r-lg">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-red-800">Deadline Laporan</p>
                                        <p class="text-xs text-red-600">Terlambat 2 hari</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Fitur-Fitur Unggulan
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    TodoList App dilengkapi dengan fitur-fitur canggih yang membantu Anda mengelola tugas dengan lebih
                    efektif dan efisien.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6 rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Manajemen Tugas Mudah</h3>
                    <p class="text-gray-600">Buat, edit, dan hapus tugas dengan mudah. Atur prioritas dan tenggat waktu
                        untuk setiap tugas.</p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center p-6 rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Filter & Pencarian</h3>
                    <p class="text-gray-600">Temukan tugas dengan cepat menggunakan fitur pencarian dan filter
                        berdasarkan status atau prioritas.</p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center p-6 rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Responsif Mobile</h3>
                    <p class="text-gray-600">Akses tugas Anda dari mana saja dengan desain yang responsif dan
                        mobile-friendly.</p>
                </div>

                <!-- Feature 4 -->
                <div class="text-center p-6 rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Manajemen Role</h3>
                    <p class="text-gray-600">Sistem role dan permission yang fleksibel untuk mengatur akses pengguna
                        yang berbeda.</p>
                </div>

                <!-- Feature 5 -->
                <div class="text-center p-6 rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Real-time Updates</h3>
                    <p class="text-gray-600">Perubahan data langsung terlihat tanpa perlu refresh halaman berkat
                        teknologi Livewire.</p>
                </div>

                <!-- Feature 6 -->
                <div class="text-center p-6 rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Keamanan Terjamin</h3>
                    <p class="text-gray-600">Data Anda aman dengan sistem autentikasi Laravel dan enkripsi yang kuat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Cara Kerja
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Mulai menggunakan TodoList App hanya dalam 3 langkah sederhana.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-primary-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">1</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Daftar Akun</h3>
                    <p class="text-gray-600">Buat akun gratis dengan email Anda. Proses pendaftaran hanya membutuhkan
                        waktu kurang dari 1 menit.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-primary-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">2</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Buat Tugas</h3>
                    <p class="text-gray-600">Tambahkan tugas-tugas Anda dengan detail lengkap seperti deskripsi,
                        prioritas, dan tenggat waktu.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-primary-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">3</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Kelola & Selesaikan</h3>
                    <p class="text-gray-600">Kelola tugas Anda dengan mudah, tandai yang sudah selesai, dan pantau
                        progress Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Siap Meningkatkan Produktivitas Anda?
            </h2>
            <p class="text-xl text-primary-100 mb-8 max-w-3xl mx-auto">
                Bergabunglah dengan ribuan pengguna yang sudah merasakan manfaat TodoList App untuk mengelola tugas
                mereka.
            </p>
            @guest
                <a href="{{ route('register') }}"
                    class="inline-flex items-center px-8 py-3 border border-transparent text-lg font-medium rounded-md text-primary-600 bg-white hover:bg-gray-50 transition-colors duration-200">
                    Mulai Gratis Sekarang
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            @else
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center px-8 py-3 border border-transparent text-lg font-medium rounded-md text-primary-600 bg-white hover:bg-gray-50 transition-colors duration-200">
                    Buka Dashboard
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            @endguest
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold text-white mb-4">TodoList App</h3>
                    <p class="text-gray-300 mb-4">
                        Aplikasi manajemen tugas yang membantu Anda tetap produktif dan terorganisir. Dibuat dengan
                        teknologi modern untuk pengalaman pengguna yang optimal.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#features"
                                class="text-gray-300 hover:text-white transition-colors duration-200">Fitur</a></li>
                        <li><a href="#how-it-works"
                                class="text-gray-300 hover:text-white transition-colors duration-200">Cara Kerja</a>
                        </li>
                        @guest
                            <li><a href="{{ route('login') }}"
                                    class="text-gray-300 hover:text-white transition-colors duration-200">Masuk</a></li>
                            <li><a href="{{ route('register') }}"
                                    class="text-gray-300 hover:text-white transition-colors duration-200">Daftar</a></li>
                        @else
                            <li><a href="{{ route('dashboard') }}"
                                    class="text-gray-300 hover:text-white transition-colors duration-200">Dashboard</a>
                            </li>
                        @endguest
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Kontak</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-300">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            support@todolist.app
                        </li>
                        <li class="text-gray-300">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            +62 123 456 7890
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-800 text-center">
                <p class="text-gray-400">
                    &copy; {{ date('Y') }} TodoList App. Dibuat dengan ❤️ menggunakan Laravel & Livewire.
                </p>
            </div>
        </div>
    </footer>

    <!-- Smooth Scrolling Script -->
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navigation
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.classList.add('shadow-lg');
            } else {
                nav.classList.remove('shadow-lg');
            }
        });
    </script>
</body>

</html>
