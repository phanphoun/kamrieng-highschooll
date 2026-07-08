@extends('layouts.app')

@section('title', __('navigation.about'))

@section('content')
    <!-- Hero -->
    <section class="bg-slate-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center gap-3 mb-3">
                <span class="block h-px w-10 bg-yellow-400"></span>
                <span class="text-sm font-semibold uppercase tracking-wider text-yellow-400">{{ __('navigation.about') }}</span>
                <span class="block h-px w-10 bg-yellow-400"></span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold mb-3">{{ __('messages.about_school_description') }}</h1>
        </div>
    </section>

    <!-- School History -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <div class="flex items-center gap-3 mb-6">
                    <span class="block h-px w-8 bg-yellow-400"></span>
                    <h2 class="text-3xl font-bold text-gray-900">{{ __('messages.our_history') }}</h2>
                </div>
                <div class="prose prose-lg text-gray-600">
                    {!! $siteSettings?->about_description_en !!}
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-white rounded-xl p-8 shadow-sm border border-gray-200">
                    <div class="w-14 h-14 bg-yellow-400/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ __('messages.our_mission') }}</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $siteSettings?->mission_en ?? __('messages.default_mission') }}</p>
                </div>
                <div class="bg-white rounded-xl p-8 shadow-sm border border-gray-200">
                    <div class="w-14 h-14 bg-yellow-400/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ __('messages.our_vision') }}</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $siteSettings?->vision_en ?? __('messages.default_vision') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- School Stats -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-yellow-600 mb-2">{{ $siteSettings?->established_year ?? '2005' }}</div>
                    <div class="text-gray-600">{{ __('messages.year_established') }}</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-yellow-600 mb-2">1200+</div>
                    <div class="text-gray-600">{{ __('messages.students') }}</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-yellow-600 mb-2">85+</div>
                    <div class="text-gray-600">{{ __('messages.teachers') }}</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-yellow-600 mb-2">30+</div>
                    <div class="text-gray-600">{{ __('messages.classes') }}</div>
                </div>
            </div>
        </div>
    </section>
@endsection
