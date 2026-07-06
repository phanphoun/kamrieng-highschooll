<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Kamrieng High School')</title>
    <meta name="description" content="@yield('meta_description', 'Kamrieng High School - Excellence in Education')">
    @yield('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Noto Color Emoji'; }
        .khmer-font { font-family: 'Khmer OS', 'Hanuman', 'Noto Sans Khmer', serif; }
        .nav-blur { backdrop-filter: blur(20px) saturate(180%); -webkit-backdrop-filter: blur(20px) saturate(180%); }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="navbar">
        <div class="nav-blur bg-[#192436] border-b border-[#192436]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16 md:h-20">
                    <!-- Logo -->
                    <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-[#f7b316] to-[#f7b316] rounded-xl flex items-center justify-center shadow-lg shadow-[#f7b316]/20 group-hover:shadow-xl group-hover:shadow-[#f7b316]/30 transition-all duration-300">
                            <span class="text-white font-bold text-lg">K</span>
                        </div>
                        <div class="hidden sm:block">
                            <span class="font-bold text-gray-900 text-lg leading-tight block">Kamrieng</span>
                            <span class="text-xs text-gray-500 font-medium">High School</span>
                        </div>
                    </a>

                    <!-- Desktop Nav Links -->
                    <div class="hidden md:flex items-center gap-1">
                        <a href="{{ url('/') }}" 
                           class="px-4 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-200 {{ request()->is('/') ? 'text-[#f7b316] bg-[#f7b316]/10 hover:bg-[#f7b316]/10 hover:text-[#f7b316]' : '' }}">
                            {{ app()->getLocale() === 'kh' ? 'ទំព័រដើម' : 'Home' }}
                        </a>
                        <a href="{{ route('public.news.index') }}" 
                           class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('public.news.*') ? 'text-[#f7b316] bg-[#f7b316]/10 hover:bg-[#f7b316]/10 hover:text-[#f7b316]' : 'text-gray-300 hover:text-white hover:bg-white/10' }}">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                                {{ app()->getLocale() === 'kh' ? 'ព័ត៌មាន' : 'News' }}
                            </span>
                        </a>
                        <a href="#" 
                           class="px-4 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-200">
                            {{ app()->getLocale() === 'kh' ? 'អំពីសាលា' : 'About' }}
                        </a>
                        <a href="#" 
                           class="px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition-all duration-200">
                            {{ app()->getLocale() === 'kh' ? 'ទំនាក់ទំនង' : 'Contact' }}
                        </a>
                    </div>

                    <!-- Right side -->
                    <div class="flex items-center gap-3">
                        <!-- Locale Switcher -->
                        <div class="relative" id="locale-switcher">
                            <button id="locale-btn"
                                    class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-200 border border-gray-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="hidden sm:inline">{{ app()->getLocale() === 'kh' ? 'ខ្មែរ' : 'EN' }}</span>
                                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div id="locale-dropdown"
                                 class="absolute right-0 mt-2 w-36 bg-white rounded-xl shadow-xl border border-gray-100 py-1 overflow-hidden hidden">
                                <a href="{{ route('locale.switch', 'en') }}" 
                                   class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-[#f7b316]/10 hover:text-[#f7b316] transition-colors {{ app()->getLocale() === 'en' ? 'bg-[#f7b316]/10 text-[#f7b316] font-medium' : '' }}">
                                    <span class="w-6 h-4 rounded-sm bg-gradient-to-r from-[#086fd3] to-red-500 flex-shrink-0"></span>
                                    English
                                </a>
                                <a href="{{ route('locale.switch', 'kh') }}" 
                                   class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-[#f7b316]/10 hover:text-[#f7b316] transition-colors {{ app()->getLocale() === 'kh' ? 'bg-[#f7b316]/10 text-[#f7b316] font-medium' : '' }}">
                                    <span class="w-6 h-4 rounded-sm bg-gradient-to-r from-[#192436] to-red-600 flex-shrink-0"></span>
                                    ភាសាខ្មែរ
                                </a>
                            </div>
                        </div>

                        <!-- Mobile Menu Button -->
                        <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="nav-blur bg-[#192436]/95 border-b border-[#192436] shadow-lg">
                <div class="px-4 py-4 space-y-1">
                    <a href="{{ url('/') }}" 
                       class="block px-4 py-3 rounded-xl text-sm font-medium {{ request()->is('/') ? 'text-[#f7b316] bg-[#f7b316]/10' : 'text-gray-300 hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                        {{ app()->getLocale() === 'kh' ? 'ទំព័រដើម' : 'Home' }}
                    </a>
                    <a href="{{ route('public.news.index') }}" 
                       class="block px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('public.news.*') ? 'text-[#f7b316] bg-[#f7b316]/10' : 'text-gray-300 hover:bg-white/10 hover:text-white' }} transition-all duration-200">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                            {{ app()->getLocale() === 'kh' ? 'ព័ត៌មាន' : 'News' }}
                        </span>
                    </a>
                    <a href="#" 
                       class="block px-4 py-3 rounded-xl text-sm font-medium text-gray-300 hover:bg-white/10 hover:text-white transition-all duration-200">
                        {{ app()->getLocale() === 'kh' ? 'អំពីសាលា' : 'About' }}
                    </a>
                    <a href="#" 
                       class="block px-4 py-3 rounded-xl text-sm font-medium text-gray-300 hover:bg-white/10 hover:text-white transition-all duration-200">
                        {{ app()->getLocale() === 'kh' ? 'ទំនាក់ទំនង' : 'Contact' }}
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16 md:pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#192436] text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#f7b316] to-[#f7b316] rounded-2xl flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-xl">K</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-white text-xl">Kamrieng High School</h3>
                            <p class="text-[#9ca6b4] text-sm">{{ app()->getLocale() === 'kh' ? 'វិទ្យាល័យកំរៀង' : 'Excellence in Education' }}</p>
                        </div>
                    </div>
                    <p class="text-[#9ca6b4] leading-relaxed max-w-md">
                        {{ app()->getLocale() === 'kh' ? 'វិទ្យាល័យកំរៀង ជាសាលារៀនដែលមានគុណភាពខ្ពស់ ផ្តល់ការអប់រំប្រកបដោយគុណភាពដល់សិស្សានុសិស្ស' : 'Kamrieng High School is committed to providing quality education and nurturing future leaders.' }}
                    </p>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4">{{ app()->getLocale() === 'kh' ? 'តំណរភ្ជាប់' : 'Quick Links' }}</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ url('/') }}" class="text-[#9ca6b4] hover:text-white transition-colors text-sm">{{ app()->getLocale() === 'kh' ? 'ទំព័រដើម' : 'Home' }}</a></li>
                        <li><a href="{{ route('public.news.index') }}" class="text-[#9ca6b4] hover:text-white transition-colors text-sm">{{ app()->getLocale() === 'kh' ? 'ព័ត៌មាន' : 'News' }}</a></li>
                        <li><a href="#" class="text-[#9ca6b4] hover:text-white transition-colors text-sm">{{ app()->getLocale() === 'kh' ? 'អំពីសាលា' : 'About Us' }}</a></li>
                        <li><a href="#" class="text-[#9ca6b4] hover:text-white transition-colors text-sm">{{ app()->getLocale() === 'kh' ? 'ទំនាក់ទំនង' : 'Contact' }}</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4">{{ app()->getLocale() === 'kh' ? 'ទំនាក់ទំនង' : 'Contact Info' }}</h4>
                    <ul class="space-y-3 text-sm text-[#9ca6b4]">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 mt-0.5 text-[#f7b316] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Kamrieng, Battambang, Cambodia</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#f7b316] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>info@kamrieng.edu.kh</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#f7b316] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>+855 12 345 678</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-white/10">
                <p class="text-center text-sm text-[#9ca6b4]">
                    &copy; {{ date('Y') }} Kamrieng High School. {{ app()->getLocale() === 'kh' ? 'រក្សាសិទ្ធិគ្រប់យ៉ាង។' : 'All rights reserved.' }}
                </p>
            </div>
        </div>
    </footer>

    <!-- Navbar scroll effect -->
    <script>
        const navbar = document.getElementById('navbar');
        let lastScroll = 0;
        
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            if (currentScroll > 100) {
                navbar.classList.add('shadow-lg');
                if (currentScroll > lastScroll && currentScroll > 200) {
                    navbar.style.transform = 'translateY(-100%)';
                } else {
                    navbar.style.transform = 'translateY(0)';
                }
            } else {
                navbar.classList.remove('shadow-lg');
                navbar.style.transform = 'translateY(0)';
            }
            lastScroll = currentScroll;
        });

        // Mobile menu toggle
        const mobileBtn = document.getElementById('mobile-menu-btn');
        if (mobileBtn) {
            mobileBtn.addEventListener('click', () => {
                const menu = document.getElementById('mobile-menu');
                menu.classList.toggle('hidden');
            });
        }

        // Locale dropdown toggle
        const localeBtn = document.getElementById('locale-btn');
        const localeDropdown = document.getElementById('locale-dropdown');
        if (localeBtn && localeDropdown) {
            localeBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                localeDropdown.classList.toggle('hidden');
            });
            document.addEventListener('click', () => {
                localeDropdown.classList.add('hidden');
            });
            localeDropdown.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        }
    </script>
</body>
</html>
