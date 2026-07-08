<header class="bg-white border-b border-gray-200 h-16 flex items-center px-6">
    <div class="flex-1 flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-900">{{ $siteSettings?->school_name_en ?? 'EduKhmer' }}</h2>

        <div class="flex items-center space-x-4">
            <!-- Language Switcher -->
            <div class="flex items-center space-x-1">
                <a href="{{ route('language.switch', 'en') }}" class="px-2 py-1 text-xs rounded {{ app()->getLocale() === 'en' ? 'bg-primary-100 text-primary-700 font-semibold' : 'text-gray-500 hover:text-gray-700' }}">EN</a>
                <a href="{{ route('language.switch', 'kh') }}" class="px-2 py-1 text-xs rounded {{ app()->getLocale() === 'kh' ? 'bg-primary-100 text-primary-700 font-semibold' : 'text-gray-500 hover:text-gray-700' }}">KH</a>
            </div>

            <!-- View Public Site -->
            <a href="{{ route('home') }}" target="_blank" class="text-gray-500 hover:text-gray-700 transition" title="{{ __('admin.view_public') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
            </a>

            <!-- User Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 text-sm text-gray-700 hover:text-gray-900">
                    <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center">
                        <span class="text-sm font-semibold text-primary-700">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <span class="hidden sm:block">{{ auth()->user()->name }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                    <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('admin.view_site') }}</a>
                    <hr class="border-gray-200">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">{{ __('auth.logout') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
