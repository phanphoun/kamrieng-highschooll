@php
    $locale = app()->getLocale();
    $isKhmer = $locale === 'kh';
@endphp

@extends('layouts.app')

@section('title', $isKhmer ? 'ព័ត៌មាន - វិទ្យាល័យកំរៀង' : 'News - Kamrieng High School')

@section('content')
<!-- Hero Section -->
<section class="relative bg-[#192436] overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('storage/news/news-banner.jpg') }}" 
             alt="News banner" 
             class="w-full h-full object-cover opacity-30"
             loading="eager">
        <div class="absolute inset-0 bg-gradient-to-r from-[#192436]/75 via-[#192436]/55 to-[#192436]/35"></div>
    </div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.04\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="text-center">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white/90 rounded-full px-4 py-1.5 text-sm font-medium mb-6 border border-white/10">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                {{ $isKhmer ? 'ព័ត៌មាន និងព្រឹត្តិការណ៍' : 'News & Events' }}
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                {{ $isKhmer ? 'ព័ត៌មាន និង​ព្រឹត្តិការណ៍' : 'News & Events' }}
            </h1>
            <p class="text-xl text-blue-100/80 max-w-2xl mx-auto">
                {{ $isKhmer ? 'ទទួលបានព័ត៌មានថ្មីៗ និងព្រឹត្តិការណ៍សំខាន់ៗពីសាលារបស់យើង' : 'Stay updated with the latest news and important events from our school' }}
            </p>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-gray-50 to-transparent"></div>
</section>

<!-- Search & Filters -->
<section class="relative -mt-8 mb-12 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-5">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <div class="flex-1 w-full md:w-auto">
                    <form method="GET" action="{{ route('public.news.index') }}" class="relative">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="{{ $isKhmer ? 'ស្វែងរកព័ត៌មាន...' : 'Search news...' }}" 
                            class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:border-[#086fd3] focus:ring-2 focus:ring-[#086fd3]/20 transition-all duration-200 bg-gray-50 focus:bg-white">
                        @if(request('search'))
                            <a href="{{ route('public.news.index', request()->except('search', 'page')) }}" 
                               class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </a>
                        @endif
                    </form>
                </div>
                <div class="flex gap-2 flex-wrap">
                    <a href="{{ route('public.news.index') }}" 
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ !request('category') ? 'bg-[#086fd3] text-white shadow-md shadow-[#086fd3]/20' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                        {{ $isKhmer ? 'ទាំងអស់' : 'All' }}
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('public.news.index', array_merge(request()->except('category', 'page'), ['category' => $category->slug])) }}" 
                           class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ request('category') == $category->slug ? 'bg-[#086fd3] text-white shadow-md shadow-[#086fd3]/20' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            {{ $category->localized_name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured News -->
@if($featured->count() > 0 && !request('search') && !request('category'))
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                {{ $isKhmer ? 'ព័ត៌មានពិសេស' : 'Featured News' }}
            </h2>
            <p class="text-gray-500 mt-1">{{ $isKhmer ? 'ព័ត៌មានសំខាន់ៗដែលអ្នកមិនគួររំលង' : 'Top stories you shouldn\'t miss' }}</p>
        </div>
    </div>        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        @foreach($featured as $index => $article)
            <a href="{{ route('public.news.show', $article->slug) }}" 
               class="group block {{ $index === 0 ? 'lg:col-span-2 lg:row-span-2' : '' }}">
                <article class="relative bg-white rounded-xl shadow-sm hover:shadow-xl border border-gray-100 overflow-hidden transition-all duration-300 hover:-translate-y-1 h-full">
                    <!-- Featured glow effect -->
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-[#f7b316]/20 via-transparent to-[#f7b316]/10 rounded-2xl blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10"></div>
                    <!-- Featured corner ribbon badge -->
                    <div class="absolute top-0 right-0 z-20">
                        <div class="relative">
                            <svg class="w-24 h-24 text-[#f7b316]" viewBox="0 0 96 96" fill="currentColor" aria-hidden="true">
                                <polygon points="96,0 96,96 0,0"/>
                            </svg>
                            <div class="absolute top-2 right-2 flex flex-col items-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="text-[8px] font-bold text-white mt-0.5 leading-none">{{ $isKhmer ? 'ពិសេស' : 'TOP' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative {{ $index === 0 ? 'aspect-[2/1] lg:aspect-[5/2]' : 'aspect-[4/3]' }} overflow-hidden">
                        @if($article->image_url)
                            <img src="{{ $article->image_url }}" 
                                 alt="{{ $article->localized_title }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                 loading="lazy">
                        @else
                            <div class="w-full h-full bg-[#f7b316]/5 flex items-center justify-center">
                                <svg class="w-16 h-16 text-[#f7b316]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 md:p-5">
                            @if($article->category)
                                <span class="inline-block bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-semibold px-3 py-1.5 rounded-full mb-3">
                                    {{ $article->category_name }}
                                </span>
                            @endif
                            <h3 class="text-white font-bold {{ $index === 0 ? 'text-2xl md:text-3xl' : 'text-lg' }} leading-tight group-hover:text-[#f7b316] transition-colors duration-200"
                                @if($isKhmer) style="font-family: 'Khmer OS', 'Hanuman', serif;" @endif>
                                {{ $article->localized_title }}
                            </h3>
                            <p class="text-white/70 text-sm mt-2 line-clamp-2 {{ $index === 0 ? '' : 'hidden' }}">
                                {{ strip_tags(mb_substr($article->localized_body, 0, 150)) }}...
                            </p>
                            <div class="flex items-center gap-2 mt-3 text-white/60 text-xs">
                                <span>{{ $article->published_at ? $article->published_at->format('M d, Y') : '' }}</span>
                                <span class="w-1 h-1 bg-white/40 rounded-full"></span>
                                <span class="flex items-center gap-1">
                                    {{ $isKhmer ? 'អានបន្ថែម' : 'Read More' }}
                                    <svg class="w-3 h-3 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
            </a>
        @endforeach
    </div>
</section>
@endif

<!-- Main Content -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
    @if(request('search'))
        <div class="mb-4 text-center md:text-left">
            <p class="text-gray-500 text-lg">
                @if($isKhmer)
                    លទ្ធផលស្វែងរកសម្រាប់ "<strong>{{ request('search') }}</strong>" បានរកឃើញ {{ $news->total() }} ព័ត៌មាន
                @else
                    Search results for "<strong>{{ request('search') }}</strong>" — {{ $news->total() }} article(s) found
                @endif
            </p>
        </div>
    @endif

    @if($news->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($news as $article)
                <a href="{{ route('public.news.show', $article->slug) }}" class="group block">
                    <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl border {{ $article->is_featured ? 'border-[#f7b316]/30 shadow-[#f7b316]/5 hover:shadow-[#f7b316]/10' : 'border-gray-100' }} overflow-hidden transition-all duration-300 hover:-translate-y-1{{ $article->is_featured ? ' ring-1 ring-[#f7b316]/20' : '' }}">                        <div class="relative overflow-hidden aspect-[1/1]">
                            @if($article->image_url)
                                <img src="{{ $article->image_url }}" 
                                     alt="{{ $article->localized_title }}"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                     loading="lazy">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-50 to-indigo-50 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        @if($article->category)
                            <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-semibold px-3 py-1.5 rounded-full shadow-sm">
                                {{ $article->category_name }}
                            </span>
                        @endif
                        @if($article->is_featured)
                            <div class="absolute top-0 right-0 z-10">
                                <div class="relative">
                                    <svg class="w-16 h-16 text-[#f7b316]" viewBox="0 0 64 64" fill="currentColor" aria-hidden="true">
                                        <polygon points="64,0 64,64 0,0"/>
                                    </svg>
                                    <svg class="absolute top-1 right-1 w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                            <div class="flex items-center gap-3 text-sm text-gray-500 mb-2">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $article->published_at ? $article->published_at->format('M d, Y') : '' }}
                                </span>
                                @if($article->category)
                                    <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                    <span>{{ $article->category_name }}</span>
                                @endif
                            </div>
                            <h2 class="text-base font-bold text-gray-900 mb-1.5 line-clamp-2 group-hover:text-[#f7b316] transition-colors duration-200" 
                                @if($isKhmer) style="font-family: 'Khmer OS', 'Hanuman', serif;" @endif>
                                {{ $article->localized_title }}
                            </h2>
                            <p class="text-gray-500 text-xs leading-relaxed line-clamp-2">
                                {{ strip_tags(mb_substr($article->localized_body, 0, 200)) }}{{ mb_strlen($article->localized_body) > 200 ? '...' : '' }}
                            </p>
                            <div class="mt-2 pt-2 border-t border-gray-100">
                                <span class="inline-flex items-center gap-2 text-[#086fd3] font-medium text-xs group-hover:gap-3 transition-all duration-200">
                                    {{ $isKhmer ? 'អានបន្ថែម' : 'Read More' }}
                                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </article>
                </a>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $news->appends(request()->query())->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 mb-8">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-3">
                {{ $isKhmer ? 'មិនទាន់មានព័ត៌មាននៅឡើយទេ' : 'No News Articles Yet' }}
            </h3>
            <p class="text-gray-500 text-lg max-w-md mx-auto">
                {{ $isKhmer ? 'សូមរង់ចាំតាមដានព័ត៌មានថ្មីៗពីសាលារបស់យើងនៅពេលខាងមុខ' : 'Please check back later for the latest updates and announcements from our school.' }}
            </p>
            @if(request('search'))
                <a href="{{ route('public.news.index') }}" 
                   class="inline-flex items-center gap-2 mt-6 px-6 py-3 bg-[#086fd3] text-white rounded-xl hover:bg-[#0757a8] transition-colors shadow-lg shadow-[#086fd3]/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    {{ $isKhmer ? 'ត្រលប់ទៅព័ត៌មានទាំងអស់' : 'View All News' }}
                </a>
            @endif
        </div>
    @endif
</section>
@endsection
