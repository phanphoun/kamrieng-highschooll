@extends('layouts.app')

@section('title', "Search: {$query} - Kamrieng High School")

@section('content')
<div class="min-h-screen bg-slate-50">
    <!-- Search Hero -->
    <div class="bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-950">
        <div class="mx-auto max-w-4xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                    <span class="lang-km">ស្វែងរក</span>
                    <span class="lang-en">Search</span>
                </h1>
                <p class="mt-2 text-sm text-slate-400">
                    <span class="lang-km">ស្វែងរកព័ត៌មាន សកម្មភាព និងឯកសាររបស់សាលា</span>
                    <span class="lang-en">Search for school news, activities, and documents</span>
                </p>

                <!-- Search form -->
                <div class="mx-auto mt-8 max-w-xl">
                    <form action="{{ route('search') }}" method="GET" class="relative">
                        <div class="relative flex">
                            <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            <input
                                type="text"
                                name="q"
                                value="{{ $query }}"
                                placeholder="Search news, activities, achievements..."
                                class="w-full rounded-xl border-0 bg-white/10 py-4 pl-12 pr-32 text-base text-white placeholder-slate-400 shadow-lg ring-1 ring-white/10 backdrop-blur-sm transition-all duration-200 focus:bg-white/15 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                autocomplete="off"
                            />
                            <button
                                type="submit"
                                class="absolute right-1.5 top-1/2 -translate-y-1/2 inline-flex items-center gap-1.5 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            >
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                <span class="lang-km">ស្វែងរក</span>
                                <span class="lang-en">Search</span>
                            </button>
                        </div>
                    </form>
                </div>

                @if (!empty($query) && $totalResults > 0)
                    <div class="mt-4">
                        <p class="text-sm text-slate-400">
                            <span class="lang-km">បានរកឃើញ</span>
                            <span class="lang-en">Found</span>
                            <span class="font-semibold text-white">{{ $totalResults }}</span>
                            <span class="lang-km">លទ្ធផលសម្រាប់</span>
                            <span class="lang-en">results for</span>
                            "<span class="font-semibold text-white">{{ $query }}</span>"
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Search Results -->
    <div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">
        @if ($showPrompt)
            <!-- Empty Query Prompt -->
            <div class="text-center py-16">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-50 shadow-sm ring-1 ring-blue-100">
                    <svg class="h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>
                <h3 class="mt-4 text-lg font-semibold text-slate-900 lang-km">
                    សូមបញ្ចូលពាក្យស្វែងរក
                </h3>
                <h3 class="mt-4 text-lg font-semibold text-slate-900 lang-en">
                    Enter a search term
                </h3>
                <p class="mt-2 text-sm text-slate-500 lang-km">
                    វាយបញ្ចូលពាក្យគន្លឹះខាងលើ ដើម្បីស្វែងរកព័ត៌មាន សកម្មភាព និងឯកសាររបស់សាលា
                </p>
                <p class="mt-1 text-sm text-slate-400 lang-en">
                    Enter a keyword above to search for news, activities, documents, and more.
                </p>
            </div>
        @elseif ($totalResults === 0)
            <!-- No Results -->
            <div class="text-center py-16">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-white shadow-sm ring-1 ring-slate-200">
                    <svg class="h-8 w-8 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>
                <h3 class="mt-4 text-lg font-semibold text-slate-900 lang-km">
                    មិនមានលទ្ធផលទេ
                </h3>
                <h3 class="mt-4 text-lg font-semibold text-slate-900 lang-en">
                    No results found
                </h3>
                <p class="mt-2 text-sm text-slate-500 lang-km">
                    សូមព្យាយាមស្វែងរកជាមួយពាក្យគន្លឹះផ្សេងទៀត
                </p>
                <p class="mt-1 text-sm text-slate-400 lang-en">
                    No results found. Try different keywords.
                </p>
            </div>
        @else
            <!-- Results by Type -->
            <div class="space-y-5" id="search-results">
                @foreach ($resultsets as $type => $items)
                    <div class="search-section overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
                        <!-- Section Header (clickable toggle) -->
                        <button
                            onclick="toggleSection(this)"
                            class="search-section-toggle flex w-full items-center justify-between px-6 py-4 text-left transition-colors hover:bg-slate-50"
                            aria-expanded="true"
                        >
                            <div class="flex items-center gap-3">
                                <span class="inline-flex items-center rounded-lg bg-blue-50 px-3 py-1 text-sm font-medium text-blue-700">
                                    <span class="lang-km">{{ $items->first()['type_label'] }}</span>
                                    <span class="lang-en">{{ $items->first()['type_label_en'] }}</span>
                                </span>
                                <span class="text-sm text-slate-400">
                                    ({{ $items->count() }})
                                </span>
                            </div>
                            <svg
                                class="search-section-chevron h-5 w-5 text-slate-400 transition-transform duration-200"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>

                        <!-- Results Items -->
                        <div class="search-section-body border-t border-slate-100">
                            <div class="divide-y divide-slate-100">
                                @foreach ($items as $item)
                                    <div
                                        @if ($item['url'])
                                            onclick="window.location.href='{{ $item['url'] }}'"
                                            class="block cursor-pointer"
                                        @else
                                            class="block"
                                        @endif
                                    >
                                        <div class="px-6 py-4 transition-colors hover:bg-slate-50">
                                            <div class="flex items-start gap-4">
                                                @if ($item['image'] ?? false)
                                                    <div class="h-14 w-14 flex-shrink-0 overflow-hidden rounded-lg bg-slate-100">
                                                        <img
                                                            src="{{ asset('storage/' . $item['image']) }}"
                                                            alt=""
                                                            class="h-full w-full object-cover"
                                                            loading="lazy"
                                                        >
                                                    </div>
                                                @endif

                                                <div class="min-w-0 flex-1">
                                                    <h3 class="text-base font-medium text-slate-900">
                                                        <span class="lang-km">{{ $item['title_km'] }}</span>
                                                        <span class="lang-en">{{ $item['title_en'] }}</span>
                                                    </h3>

                                                    @if ($item['subtitle_km'] ?? false)
                                                        <p class="mt-0.5 text-sm text-slate-500">
                                                            <span class="lang-km">{{ $item['subtitle_km'] }}</span>
                                                            <span class="lang-en">{{ $item['subtitle_en'] }}</span>
                                                        </p>
                                                    @endif

                                                    @if (isset($item['excerpt_km']) || isset($item['excerpt_en']))
                                                        <p class="mt-1 text-sm text-slate-500 line-clamp-2">
                                                            <span class="lang-km">{{ $item['excerpt_km'] ?? '' }}</span>
                                                            <span class="lang-en">{{ $item['excerpt_en'] ?? '' }}</span>
                                                        </p>
                                                    @endif

                                                    <div class="mt-2 flex flex-wrap items-center gap-2 text-xs text-slate-400">
                                                        @if ($item['date'] ?? false)
                                                            <span class="inline-flex items-center gap-1">
                                                                <svg class="h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                                                </svg>
                                                                {{ $item['date'] }}
                                                            </span>
                                                        @endif

                                                        @if ($item['location'] ?? false)
                                                            <span class="inline-flex items-center gap-1">
                                                                <svg class="h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                                                </svg>
                                                                {{ $item['location'] }}
                                                            </span>
                                                        @endif

                                                        @if ($item['category'] ?? false)
                                                            <span class="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-xs font-medium text-slate-600">
                                                                {{ $item['category'] }}
                                                            </span>
                                                        @endif

                                                        @if ($item['is_urgent'] ?? false)
                                                            <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-0.5 text-xs font-medium text-red-700">
                                                                <svg class="h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                                                </svg>
                                                                <span class="lang-km">បន្ទាន់</span>
                                                                <span class="lang-en">Urgent</span>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Result count -->
            <div class="mt-8 text-center">
                <p class="text-xs text-slate-400">
                    <span class="lang-km">បានបង្ហាញ {{ $totalResults }} លទ្ធផល</span>
                    <span class="lang-en">Showing {{ $totalResults }} results</span>
                </p>
            </div>
        @endif
    </div>
</div>

<script>
function toggleSection(button) {
    const section = button.closest('.search-section');
    const body = section.querySelector('.search-section-body');
    const chevron = section.querySelector('.search-section-chevron');
    const isExpanded = button.getAttribute('aria-expanded') === 'true';

    button.setAttribute('aria-expanded', !isExpanded);

    if (isExpanded) {
        body.style.display = 'none';
        chevron.style.transform = 'rotate(0deg)';
    } else {
        body.style.display = '';
        chevron.style.transform = 'rotate(180deg)';
    }
}
</script>
@endsection
