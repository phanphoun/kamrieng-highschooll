@extends('layouts.app')

@section('title', $article->title_en)

@section('content')
    <section class="bg-gradient-to-br from-primary-800 to-primary-600 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-sm text-primary-200 mb-4">
                <a href="{{ route('news.index') }}" class="hover:text-white transition">{{ __('navigation.news') }}</a>
                <span class="mx-2">/</span>
                <span>{{ Str::limit(app()->getLocale() === 'kh' && $article->title_kh ? $article->title_kh : $article->title_en, 60) }}</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold">{{ app()->getLocale() === 'kh' && $article->title_kh ? $article->title_kh : $article->title_en }}</h1>
            <div class="mt-4 flex items-center text-primary-200 text-sm">
                <span>{{ $article->published_at?->format('F d, Y') }}</span>
                <span class="mx-2">|</span>
                <span>{{ $article->views_count }} {{ __('messages.views') }}</span>
                @if($article->category)
                <span class="mx-2">|</span>
                <span class="bg-white/20 px-3 py-1 rounded-full text-xs">{{ $article->category }}</span>
                @endif
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none">
                {!! app()->getLocale() === 'kh' && $article->content_kh ? $article->content_kh : $article->content_en !!}
            </div>
        </div>
    </section>

    @if(isset($relatedNews) && $relatedNews->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">{{ __('messages.related_news') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedNews as $related)
                <a href="{{ route('news.show', $related->slug) }}" class="group">
                    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition">
                        <h3 class="font-semibold text-gray-900 group-hover:text-primary-600 transition">
                            {{ app()->getLocale() === 'kh' && $related->title_kh ? $related->title_kh : $related->title_en }}
                        </h3>
                        <p class="mt-2 text-sm text-gray-500">{{ $related->published_at?->format('M d, Y') }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
