@php
    $locale = app()->getLocale();
    $isKhmer = $locale === 'kh';
@endphp

@extends('layouts.app')

@section('title', $news->localized_title . ' - Kamrieng High School')

@section('meta')
    @if($news->localized_meta_description)
        <meta name="description" content="{{ $news->localized_meta_description }}">
    @endif
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:site_name" content="Kamrieng High School">
    <meta property="og:locale" content="{{ app()->getLocale() === 'kh' ? 'km_KH' : 'en_US' }}">
    <meta property="og:title" content="{{ $news->localized_title }}">
    <meta property="og:description" content="{{ $news->localized_meta_description ?? strip_tags(mb_substr($news->localized_body, 0, 200)) }}">
    <meta property="og:type" content="article">
    <meta property="article:published_time" content="{{ $news->published_at?->toIso8601String() }}">
    @if($news->image_url)
        <meta property="og:image" content="{{ url($news->image_url) }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:image:alt" content="{{ $news->localized_title }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:image" content="{{ url($news->image_url) }}">
    @endif
@endsection

@section('content')
<!-- Article Hero -->
<section class="relative bg-[#192436] overflow-hidden min-h-[50vh] flex items-center">
    @if($news->image_url)
        <div class="absolute inset-0">
            <img src="{{ $news->image_url }}" 
                 alt="{{ $news->localized_title }}"
                 class="w-full h-full object-cover opacity-40"
                 loading="eager">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/90 via-gray-900/70 to-gray-900/50"></div>
        </div>
    @endif
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.03\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="flex flex-wrap items-center gap-3 text-sm text-blue-200/80 mb-6">
            <a href="{{ route('public.news.index') }}" 
               class="inline-flex items-center gap-1.5 text-white/70 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                {{ $isKhmer ? 'ត្រលប់ទៅព័ត៌មាន' : 'Back to News' }}
            </a>
            @if($news->category)
                <span class="w-1 h-1 bg-blue-400/50 rounded-full"></span>
                <span>{{ $news->category_name }}</span>
            @endif
        </div>
        
        @if($news->is_featured)
            <div class="inline-flex items-center gap-1.5 bg-yellow-400/20 backdrop-blur-sm text-yellow-300 text-xs font-semibold px-3 py-1.5 rounded-full mb-4 border border-yellow-400/20">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                {{ $isKhmer ? 'ព័ត៌មានពិសេស' : 'Featured Article' }}
            </div>
        @endif

        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight mb-6" 
            @if($isKhmer) style="font-family: 'Khmer OS', 'Hanuman', serif;" @endif>
            {{ $news->localized_title }}
        </h1>
        
        <div class="flex flex-wrap items-center gap-4 text-sm text-blue-200/70">
            @if($news->published_at)
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ $news->published_at->format('F d, Y') }}
                </span>
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $news->published_at->format('h:i A') }}
                </span>
            @endif
            @if($news->author)
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    {{ $news->author->name }}
                </span>
            @endif
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-10">
    <article class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
        @if($news->image_url)
            <div class="relative overflow-hidden aspect-[3/2]">
                <img src="{{ $news->image_url }}" 
                     alt="{{ $news->localized_title }}"
                     class="w-full h-full object-cover"
                     loading="eager">
            </div>
        @endif
        
        <div class="p-6 md:p-10 lg:p-12">
            <!-- Content Body -->
            <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-headings:font-bold prose-a:text-[#086fd3] prose-img:rounded-xl prose-img:shadow-lg"
                 @if($isKhmer) style="font-family: 'Khmer OS', 'Hanuman', serif; font-size: 1.15rem; line-height: 1.9;" @endif>
                {!! nl2br(e($news->localized_body)) !!}
            </div>

            <!-- Share & Tags -->
            <div class="mt-12 pt-8 border-t border-gray-100">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-500 font-medium">{{ $isKhmer ? 'ចែករំលែក៖' : 'Share:' }}</span>
                        <div class="flex gap-2">
                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}&quote={{ urlencode($news->localized_title) }}&display=page" 
                               target="_blank" rel="noopener noreferrer"
                               onclick="window.open(this.href, 'facebook-share','left=20,top=20,width=600,height=500,toolbar=1,resizable=0'); return false;"
                               class="w-9 h-9 rounded-full bg-[#f7b316]/10 text-[#f7b316] hover:bg-[#f7b316] hover:text-white flex items-center justify-center transition-all duration-200"
                               title="{{ $isKhmer ? 'ចែករំលែកលើ Facebook' : 'Share on Facebook' }}">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <!-- Twitter/X -->
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->localized_title) }}" 
                               target="_blank" rel="noopener noreferrer"
                               class="w-9 h-9 rounded-full bg-sky-50 text-sky-600 hover:bg-sky-600 hover:text-white flex items-center justify-center transition-all duration-200"
                               title="{{ $isKhmer ? 'ចែករំលែកលើ X' : 'Share on X' }}">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                            </a>
                            <!-- WhatsApp -->
                            <a href="https://wa.me/?text={{ urlencode($news->localized_title . ' - ' . request()->url()) }}" 
                               target="_blank" rel="noopener noreferrer"
                               class="w-9 h-9 rounded-full bg-green-50 text-green-600 hover:bg-green-600 hover:text-white flex items-center justify-center transition-all duration-200"
                               title="{{ $isKhmer ? 'ចែករំលែកលើ WhatsApp' : 'Share on WhatsApp' }}">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                            </a>
                            <!-- Email -->
                            <a href="mailto:?subject={{ urlencode($news->localized_title) }}&body={{ urlencode(request()->url()) }}" 
                               class="w-9 h-9 rounded-full bg-gray-50 text-gray-600 hover:bg-gray-600 hover:text-white flex items-center justify-center transition-all duration-200"
                               title="{{ $isKhmer ? 'ចែករំលែកតាមអ៊ីមែល' : 'Share via Email' }}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </a>
                            <!-- Copy Link -->
                            <button id="copy-link-btn"
                                    onclick="copyArticleLink()"
                                    class="w-9 h-9 rounded-full bg-purple-50 text-purple-600 hover:bg-purple-600 hover:text-white flex items-center justify-center transition-all duration-200 relative"
                                    title="{{ $isKhmer ? 'ចម្លងតំណ' : 'Copy Link' }}">
                                <svg id="copy-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                </svg>
                                <span id="copy-tooltip" 
                                      class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded-md whitespace-nowrap opacity-0 transition-opacity duration-200 pointer-events-none">
                                    {{ $isKhmer ? 'បានចម្លង!' : 'Copied!' }}
                                </span>
                            </button>
                        </div>
                    </div>
                    @if($news->category)
                        <span class="inline-flex items-center gap-1.5 px-4 py-2 bg-[#f7b316]/10 text-[#f7b316] rounded-lg text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            {{ $news->category_name }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </article>
</section>

<!-- Related News -->
@if($relatedNews->count() > 0)
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-8">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            {{ $isKhmer ? 'ព័ត៌មានពាក់ព័ន្ធ' : 'Related News' }}
        </h2>
        <p class="text-lg text-gray-500">
            {{ $isKhmer ? 'អានព័ត៌មានផ្សេងទៀតដែលអ្នកអាចចាប់អារម្មណ៍' : 'More articles you might be interested in' }}
        </p>
    </div>                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($relatedNews as $article)
            <a href="{{ route('public.news.show', $article->slug) }}" class="group block">
                <article class="bg-white rounded-xl shadow-sm hover:shadow-xl border border-gray-100 overflow-hidden transition-all duration-300 hover:-translate-y-1">
                    <div class="relative overflow-hidden aspect-[1/1]">
                        @if($article->image_url)
                            <img src="{{ $article->image_url }}" 
                                 alt="{{ $article->localized_title }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                 loading="lazy">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-50 to-indigo-50 flex items-center justify-center">
                                <svg class="w-12 h-12 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-1">
                            <span>{{ $article->published_at ? $article->published_at->format('M d, Y') : '' }}</span>
                        </div>
                        <h3 class="text-sm font-bold text-gray-900 line-clamp-2 group-hover:text-[#f7b316] transition-colors duration-200"
                            @if($isKhmer) style="font-family: 'Khmer OS', 'Hanuman', serif;" @endif>
                            {{ $article->localized_title }}
                        </h3>
                    </div>
                </article>
            </a>
        @endforeach
    </div>
</section>
@endif

<!-- Back to Top -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8 text-center">
    <a href="{{ route('public.news.index') }}" 
       class="inline-flex items-center gap-2 px-8 py-4 bg-[#192436] text-white rounded-2xl hover:bg-[#192436]/80 transition-all duration-200 shadow-lg hover:shadow-xl font-medium">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        {{ $isKhmer ? 'ត្រលប់ទៅព័ត៌មានទាំងអស់' : 'Back to All News' }}
    </a>
</section>

<script>
function copyArticleLink() {
    const url = window.location.href;
    const tooltip = document.getElementById('copy-tooltip');
    const icon = document.getElementById('copy-icon');
    
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(url).then(() => {
            showCopiedFeedback(tooltip, icon);
        }).catch(() => {
            fallbackCopy(url, tooltip, icon);
        });
    } else {
        fallbackCopy(url, tooltip, icon);
    }
}

function fallbackCopy(text, tooltip, icon) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.opacity = '0';
    document.body.appendChild(textarea);
    textarea.select();
    try {
        document.execCommand('copy');
        showCopiedFeedback(tooltip, icon);
    } catch (e) {}
    document.body.removeChild(textarea);
}

function showCopiedFeedback(tooltip, icon) {
    tooltip.classList.remove('opacity-0');
    tooltip.classList.add('opacity-100');
    icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>`;
    
    setTimeout(() => {
        tooltip.classList.remove('opacity-100');
        tooltip.classList.add('opacity-0');
        icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>`;
    }, 2000);
}
</script>
@endsection
