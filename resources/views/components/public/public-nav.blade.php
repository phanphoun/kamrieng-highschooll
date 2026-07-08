<nav x-data="{ mobileOpen: false, moreOpen: false }" class="bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">ក</span>
                    </div>
                    <div class="hidden sm:block">
                        <p class="font-bold text-white text-sm leading-tight">វិទ្យាស្ថាន</p>
                        <p class="text-xs text-primary-200 leading-tight">រដ្ឋបាល</p>
                    </div>
                </a>
            </div>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="px-3 py-2 text-sm font-medium text-white hover:text-primary-200 transition relative">
                    {{ __('navigation.home') }}
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-1 w-1 rounded-full bg-yellow-400"></span>
                </a>
                <a href="{{ route('about') }}" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition">{{ __('navigation.about') }}</a>
                <a href="{{ route('news.index') }}" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition">{{ __('navigation.news') }}</a>
                <a href="{{ route('faculty.index') }}" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition">{{ __('navigation.faculty') }}</a>
                <a href="{{ route('achievements.index') }}" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition">{{ __('navigation.achievements') }}</a>
                <a href="{{ route('gallery.index') }}" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition">{{ __('navigation.gallery') }}</a>
                <a href="{{ route('enrollment.apply') }}" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition">{{ __('navigation.enrollment') }}</a>

                <!-- More dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="px-3 py-2 text-sm font-medium text-primary-100 hover:text-white transition inline-flex items-center gap-1">
                        {{ __('navigation.more') }}
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-1 w-40 bg-white text-gray-800 rounded-lg shadow-lg border border-gray-200 z-50">
                        <a href="{{ route('activities.index') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">{{ __('navigation.activities') }}</a>
                        <a href="{{ route('downloads.index') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">{{ __('navigation.downloads') }}</a>
                        <a href="{{ route('calendar.index') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">{{ __('navigation.calendar') }}</a>
                        <a href="{{ route('donate') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">{{ __('navigation.donate') }}</a>
                    </div>
                </div>
            </div>

            <!-- Right Controls -->
            <div class="hidden md:flex items-center space-x-3">
                <a href="{{ route('search') }}" class="p-2 text-primary-100 hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </a>
                <a href="{{ route('language.switch', app()->getLocale() === 'kh' ? 'en' : 'kh') }}" class="px-2 py-1 text-xs font-semibold border border-yellow-400 text-yellow-400 rounded hover:bg-yellow-400 hover:text-slate-900 transition">
                    {{ app()->getLocale() === 'kh' ? 'EN' : 'ខ្មែរ' }}
                </a>
                <a href="{{ route('contact') }}" class="px-5 py-2 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700 transition shadow-sm">
                    {{ __('navigation.contact') }}
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileOpen = !mobileOpen" class="p-2 rounded-md text-primary-100 hover:text-white hover:bg-slate-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': mobileOpen, 'block': !mobileOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'block': mobileOpen, 'hidden': !mobileOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileOpen" @click.away="mobileOpen = false" class="md:hidden border-t border-slate-800 bg-slate-900">
        <div class="px-4 py-3 space-y-1">
            <x-ui.mobile-nav-link href="{{ route('home') }}">{{ __('navigation.home') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('about') }}">{{ __('navigation.about') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('news.index') }}">{{ __('navigation.news') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('faculty.index') }}">{{ __('navigation.faculty') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('achievements.index') }}">{{ __('navigation.achievements') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('gallery.index') }}">{{ __('navigation.gallery') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('enrollment.apply') }}">{{ __('navigation.enrollment') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('activities.index') }}">{{ __('navigation.activities') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('contact') }}">{{ __('navigation.contact') }}</x-ui.mobile-nav-link>
            <x-ui.mobile-nav-link href="{{ route('language.switch', app()->getLocale() === 'kh' ? 'en' : 'kh') }}">{{ app()->getLocale() === 'kh' ? 'EN' : 'ខ្មែរ' }}</x-ui.mobile-nav-link>
        </div>
    </div>
</nav>
