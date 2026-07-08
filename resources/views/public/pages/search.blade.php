@extends('layouts.app')

@section('title', __('navigation.search'))

@section('content')
    <section class="bg-gradient-to-br from-primary-800 to-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">{{ __('navigation.search') }}</h1>
            <p class="text-xl text-primary-100">{{ __('messages.search_description') ?? 'Search through our website content.' }}</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <form method="GET" action="{{ route('search') }}" class="flex gap-3">
                    <input type="text" name="q" value="{{ $query ?? '' }}" placeholder="{{ __('messages.search_placeholder') ?? 'Search news, activities, and more...' }}" class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                    <button type="submit" class="px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition">
                        {{ __('messages.search') }}
                    </button>
                </form>
            </div>

            @if($query)
            <div class="mb-6">
                <p class="text-gray-600">
                    {{ __('messages.search_results_for') ?? 'Search results for' }} "<strong>{{ $query }}</strong>"
                    <span class="text-gray-400 ml-2">({{ $results->total() }} {{ __('messages.results') ?? 'results' }})</span>
                </p>
            </div>

            @if($results->count() > 0)
            <div class="space-y-4">
                @foreach($results as $result)
                <a href="{{ route('news.show', $result->slug) }}" class="block bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition group">
                    <h3 class="text-lg font-semibold text-gray-900 group-hover:text-primary-600 transition">
                        {{ app()->getLocale() === 'kh' && $result->title_kh ? $result->title_kh : $result->title_en }}
                    </h3>
                    @if($result->excerpt_en)
                    <p class="mt-2 text-sm text-gray-600 line-clamp-2">
                        {{ app()->getLocale() === 'kh' && $result->excerpt_kh ? $result->excerpt_kh : $result->excerpt_en }}
                    </p>
                    @endif
                    <div class="mt-3 text-xs text-gray-500">
                        {{ __('messages.news') }} &middot; {{ $result->published_at?->format('M d, Y') }}
                    </div>
                </a>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $results->links() }}
            </div>
            @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <p class="text-gray-500 text-lg">{{ __('messages.no_search_results') ?? 'No results found for your search.' }}</p>
                <p class="text-gray-400 text-sm mt-2">{{ __('messages.try_different_search') ?? 'Try using different keywords.' }}</p>
            </div>
            @endif
            @endif
        </div>
    </section>
@endsection
