@extends('layouts.app')

@section('title', $activity->title_en)

@section('content')
    <section class="bg-gradient-to-br from-secondary-800 to-secondary-600 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-sm text-secondary-200 mb-4">
                <a href="{{ route('activities.index') }}" class="hover:text-white transition">{{ __('navigation.activities') }}</a>
                <span class="mx-2">/</span>
                <span>{{ Str::limit(app()->getLocale() === 'kh' && $activity->title_kh ? $activity->title_kh : $activity->title_en, 60) }}</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold">{{ app()->getLocale() === 'kh' && $activity->title_kh ? $activity->title_kh : $activity->title_en }}</h1>
            <div class="mt-4 flex flex-wrap items-center text-secondary-200 text-sm gap-4">
                @if($activity->activity_date)
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ $activity->activity_date->format('F d, Y') }}
                </span>
                @endif
                @if($activity->location)
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    {{ $activity->location }}
                </span>
                @endif
                @if($activity->category)
                <span class="bg-white/20 px-3 py-1 rounded-full text-xs">{{ $activity->category }}</span>
                @endif
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none">
                {!! app()->getLocale() === 'kh' && $activity->content_kh ? $activity->content_kh : ($activity->content_en ?? $activity->description_en) !!}
            </div>

            @if($activity->gallery_images && count($activity->gallery_images) > 0)
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('messages.gallery') }}</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($activity->gallery_images as $image)
                    <div class="rounded-lg overflow-hidden shadow-sm">
                        <img src="{{ asset($image) }}" alt="{{ $activity->title_en }}" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <a href="{{ route('activities.index') }}" class="inline-flex items-center text-secondary-600 font-medium hover:text-secondary-800 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                {{ __('messages.back_to_activities') }}
            </a>
        </div>
    </section>
@endsection
