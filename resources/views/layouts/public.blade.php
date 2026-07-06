<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Kamrieng High School')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --school-navy: #192436;
            --school-navy-soft: #223149;
            --school-blue: #086fd3;
            --school-blue-deep: #0757a8;
            --school-amber: #f7b316;
            --school-muted: #9ca6b4;
        }
    </style>
</head>
<body class="bg-white text-gray-800 font-sans antialiased">

    <!-- Header / Navbar -->
    <header x-data="{ mobileOpen: false }" class="sticky top-0 z-50 bg-[#192436]/95 shadow-[0_10px_30px_-24px_rgba(0,0,0,0.8)] border-b border-white/5 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#fbbf24] to-[#f59e0b] rounded-xl flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-amber-950/20">
                        KHS
                    </div>
                    <div class="leading-tight">
                        <span class="text-lg font-bold text-[#f7b316] block">Kamrieng</span>
                        <span class="text-xs text-white/75 font-medium -mt-1 block">High School</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center gap-1">
                    <a href="{{ url('/') }}" class="px-4 py-2 text-sm font-medium text-white/75 hover:text-[#f7b316] rounded-lg hover:bg-white/5 transition-all">Home</a>
                    <a href="{{ route('about.index') }}" class="relative px-4 py-2 text-sm font-semibold text-[#f7b316] rounded-lg after:absolute after:left-1/2 after:-bottom-1 after:h-1 after:w-1 after:-translate-x-1/2 after:rounded-full after:bg-[#f7b316]">About School</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-white/75 hover:text-[#f7b316] rounded-lg hover:bg-white/5 transition-all">News</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-white/75 hover:text-[#f7b316] rounded-lg hover:bg-white/5 transition-all">Activities</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-white/75 hover:text-[#f7b316] rounded-lg hover:bg-white/5 transition-all">Achievements</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-white/75 hover:text-[#f7b316] rounded-lg hover:bg-white/5 transition-all">Gallery</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-white/75 hover:text-[#f7b316] rounded-lg hover:bg-white/5 transition-all">Contact</a>
                </nav>

                <!-- Enroll Now Button -->
                <div class="flex items-center gap-3">
                    <a href="#" class="hidden sm:inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-[#0879e8] to-[#086fd3] text-white text-sm font-semibold rounded-full hover:from-[#086fd3] hover:to-[#0757a8] shadow-lg shadow-blue-950/20 hover:shadow-blue-950/30 transition-all">
                        Enroll Now
                    </a>
                    <!-- Mobile Menu Button (Alpine.js) -->
                    <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 rounded-lg text-white/80 hover:bg-white/10 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Alpine.js) -->
        <div x-show="mobileOpen" x-cloak @click.outside="mobileOpen = false" class="lg:hidden border-t border-white/10 bg-[#192436]/98 backdrop-blur-xl">
            <div class="max-w-7xl mx-auto px-4 py-3 space-y-1">
                <a href="{{ url('/') }}" class="block px-3 py-2 text-sm font-medium text-white/75 hover:text-[#f7b316] hover:bg-white/5 rounded-lg">Home</a>
                <a href="{{ route('about.index') }}" class="block px-3 py-2 text-sm font-semibold text-[#f7b316] bg-white/5 rounded-lg">About School</a>
                <a href="#" class="block px-3 py-2 text-sm font-medium text-white/75 hover:text-[#f7b316] hover:bg-white/5 rounded-lg">News</a>
                <a href="#" class="block px-3 py-2 text-sm font-medium text-white/75 hover:text-[#f7b316] hover:bg-white/5 rounded-lg">Activities</a>
                <a href="#" class="block px-3 py-2 text-sm font-medium text-white/75 hover:text-[#f7b316] hover:bg-white/5 rounded-lg">Achievements</a>
                <a href="#" class="block px-3 py-2 text-sm font-medium text-white/75 hover:text-[#f7b316] hover:bg-white/5 rounded-lg">Gallery</a>
                <a href="#" class="block px-3 py-2 text-sm font-medium text-white/75 hover:text-[#f7b316] hover:bg-white/5 rounded-lg">Contact</a>
                <a href="#" class="block px-3 py-2 text-sm font-semibold text-white bg-[#086fd3] rounded-lg text-center mt-2">Enroll Now</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#192436] text-[#9ca6b4]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

                <!-- School Info -->
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-[#fbbf24] to-[#f59e0b] rounded-xl flex items-center justify-center text-white font-bold text-sm">
                            KHS
                        </div>
                        <div class="leading-tight">
                            <span class="text-lg font-bold text-[#f7b316] block">Kamrieng</span>
                            <span class="text-xs text-white/65 font-medium -mt-1 block">High School</span>
                        </div>
                    </div>
                    <p class="text-sm text-[#9ca6b4] leading-relaxed mb-4">
                        Committed to academic excellence and the holistic development of every student in our care.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-[#f7b316] font-semibold text-sm uppercase tracking-wider mb-4">Quick Links</h3>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('about.index') }}" class="text-sm text-[#9ca6b4] hover:text-white transition-colors">About School</a></li>
                        <li><a href="{{ route('about.leadership') }}" class="text-sm text-[#9ca6b4] hover:text-white transition-colors">Leadership</a></li>
                        <li><a href="#" class="text-sm text-[#9ca6b4] hover:text-white transition-colors">Academic Programs</a></li>
                        <li><a href="#" class="text-sm text-[#9ca6b4] hover:text-white transition-colors">News</a></li>
                        <li><a href="#" class="text-sm text-[#9ca6b4] hover:text-white transition-colors">Activities</a></li>
                        <li><a href="#" class="text-sm text-[#9ca6b4] hover:text-white transition-colors">Achievements</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h3 class="text-[#f7b316] font-semibold text-sm uppercase tracking-wider mb-4">Resources</h3>
                    <ul class="space-y-2.5">
                        <li><a href="#" class="text-sm text-[#9ca6b4] hover:text-white transition-colors">Gallery</a></li>
                        <li><a href="#" class="text-sm text-[#9ca6b4] hover:text-white transition-colors">Downloads</a></li>
                        <li><a href="#" class="text-sm text-[#9ca6b4] hover:text-white transition-colors">School Calendar</a></li>
                        <li><a href="#" class="text-sm text-[#9ca6b4] hover:text-white transition-colors">Enrollment</a></li>
                        <li><a href="#" class="text-sm text-[#9ca6b4] hover:text-white transition-colors">Faculty</a></li>
                        <li><a href="#" class="text-sm text-[#9ca6b4] hover:text-white transition-colors">Site Map</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-[#f7b316] font-semibold text-sm uppercase tracking-wider mb-4">Contact Us</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#f7b316] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-sm text-[#9ca6b4]">Kamrieng, Battambang, Cambodia</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#f7b316] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="text-sm text-[#9ca6b4]">+855 00 000 000</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#f7b316] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-sm text-[#9ca6b4]">info@kamrieng-highschool.edu.kh</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="border-t border-white/5 mt-10 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-white/35">
                    &copy; {{ date('Y') }} Kamrieng High School. All rights reserved.
                </p>
                <div class="flex items-center gap-6">
                    <a href="#" class="text-sm text-white/35 hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="text-sm text-white/35 hover:text-white transition-colors">Careers</a>
                    <a href="#" class="text-sm text-white/35 hover:text-white transition-colors">Admin</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
