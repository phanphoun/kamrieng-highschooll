@extends('layouts.app')

@section('title', __('navigation.sitemap'))

@section('content')
    <section class="bg-gradient-to-br from-primary-800 to-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">{{ __('navigation.sitemap') }}</h1>
            <p class="text-xl text-primary-100">{{ __('messages.sitemap_description') ?? 'Browse all pages on our website.' }}</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b">{{ __('messages.main_pages') ?? 'Main Pages' }}</h2>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.home') }}</a></li>
                        <li><a href="{{ route('about') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.about') }}</a></li>
                        <li><a href="{{ route('news.index') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.news') }}</a></li>
                        <li><a href="{{ route('activities.index') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.activities') }}</a></li>
                        <li><a href="{{ route('achievements.index') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.achievements') }}</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.gallery') }}</a></li>
                        <li><a href="{{ route('calendar.index') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.calendar') }}</a></li>
                    </ul>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b">{{ __('messages.resources') }}</h2>
                    <ul class="space-y-2">
                        <li><a href="{{ route('downloads.index') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.downloads') }}</a></li>
                        <li><a href="{{ route('faculty.index') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.faculty') }}</a></li>
                        <li><a href="{{ route('notices.index') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.notices') }}</a></li>
                        <li><a href="{{ route('search') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.search') }}</a></li>
                    </ul>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b">{{ __('messages.services') ?? 'Services' }}</h2>
                    <ul class="space-y-2">
                        <li><a href="{{ route('enrollment.apply') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.enrollment') }}</a></li>
                        <li><a href="{{ route('enrollment.track') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('messages.track_application') ?? 'Track Application' }}</a></li>
                        <li><a href="{{ route('contact') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.contact') }}</a></li>
                        <li><a href="{{ route('donate') }}" class="text-primary-600 hover:text-primary-800 transition text-sm">{{ __('navigation.donate') }}</a></li>
                        </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
