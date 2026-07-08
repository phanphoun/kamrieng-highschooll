<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="flex items-center space-x-1 px-3 py-2 text-sm font-medium text-gray-700 hover:text-primary-600 transition rounded-md hover:bg-gray-100">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span>{{ app()->getLocale() === 'kh' ? 'ភាសាខ្មែរ' : 'EN' }}</span>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </button>
    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-1 w-36 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
        <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-t-lg {{ app()->getLocale() === 'en' ? 'font-bold text-primary-600' : '' }}">
            🇬🇧 English
        </a>
        <a href="{{ route('language.switch', 'kh') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-b-lg {{ app()->getLocale() === 'kh' ? 'font-bold text-primary-600' : '' }}">
            🇰🇭 ភាសាខ្មែរ
        </a>
    </div>
</div>
