<aside class="w-64 bg-gray-900 text-white hidden md:flex flex-col">
    <!-- Logo -->
    <div class="h-16 flex items-center px-6 border-b border-gray-800">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-sm">E</span>
            </div>
            <span class="font-semibold text-sm">{{ __('admin.admin_panel') }}</span>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            {{ __('admin.dashboard') }}
        </a>

        <div class="pt-4 pb-2">
            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">{{ __('admin.content') }}</p>
        </div>

        <a href="{{ route('admin.news.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.news.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            {{ __('admin.news') }}
        </a>

        <a href="{{ route('admin.activities.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.activities.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            {{ __('admin.activities') }}
        </a>

        <a href="{{ route('admin.achievements.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.achievements.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ __('admin.achievements') }}
        </a>

        <a href="{{ route('admin.gallery.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.gallery.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            {{ __('admin.gallery') }}
        </a>

        <a href="{{ route('admin.events.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.events.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            {{ __('admin.events') }}
        </a>

        <a href="{{ route('admin.notices.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.notices.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
            {{ __('admin.notices') }}
        </a>

        <a href="{{ route('admin.downloads.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.downloads.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            {{ __('admin.downloads') }}
        </a>

        <a href="{{ route('admin.hero-slides.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.hero-slides.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
            {{ __('admin.hero_slides') }}
        </a>

        <a href="{{ route('admin.leadership.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.leadership.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            {{ __('admin.leadership') }}
        </a>

        <a href="{{ route('admin.pages.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.pages.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            {{ __('admin.pages') }}
        </a>

        <div class="pt-4 pb-2">
            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">{{ __('admin.management') }}</p>
        </div>

        <a href="{{ route('admin.enrollments.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.enrollments.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            {{ __('admin.enrollments') }}
        </a>

        <a href="{{ route('admin.messages.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.messages.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            {{ __('admin.messages') }}
        </a>

        <a href="{{ route('admin.statistics.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.statistics.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            {{ __('admin.statistics') }}
        </a>

        <a href="{{ route('admin.users.index') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg>
            {{ __('admin.users') }}
        </a>

        <div class="pt-4 pb-2">
            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">{{ __('admin.system') }}</p>
        </div>

        <a href="{{ route('admin.audit-logs') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.audit-logs') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"/></svg>
            {{ __('admin.audit_logs') }}
        </a>

        <a href="{{ route('admin.settings') }}" class="flex items-center px-3 py-2 text-sm rounded-lg {{ request()->routeIs('admin.settings') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-800' }} transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            {{ __('admin.settings') }}
        </a>
    </nav>
</aside>
