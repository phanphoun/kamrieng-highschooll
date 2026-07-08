@extends('layouts.app')

@section('title', __('navigation.activities'))

@section('content')
    <section class="bg-gradient-to-br from-primary-800 to-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">{{ __('navigation.activities') }}</h1>
            <p class="text-xl text-primary-100">{{ __('messages.activities_description') }}</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(isset($categories) && $categories->count() > 0)
            <div class="flex flex-wrap gap-2 mb-8 justify-center">
                <a href="{{ route('activities.index') }}" class="px-4 py-2 rounded-full text-sm font-medium {{ !request('category') ? 'bg-primary-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100' }} border border-gray-200 transition">
                    {{ __('messages.all') }}
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('activities.index', ['category' => $cat]) }}" class="px-4 py-2 rounded-full text-sm font-medium {{ request('category') === $cat ? 'bg-primary-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100' }} border border-gray-200 transition">
                    {{ $cat }}
                </a>
                @endforeach
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($activities as $activity)
                <a href="{{ route('activities.show', $activity->slug) }}" class="group">
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                        <div class="h-48 bg-gradient-to-br from-secondary-400 to-secondary-600 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div class="p-6">
                            @if($activity->category)
                            <span class="text-xs font-medium text-secondary-600 uppercase tracking-wider">{{ $activity->category }}</span>
                            @endif
                            <h3 class="mt-1 text-lg font-semibold text-gray-900 group-hover:text-secondary-600 transition">
                                {{ app()->getLocale() === 'kh' && $activity->title_kh ? $activity->title_kh : $activity->title_en }}
                            </h3>
                            <p class="mt-2 text-sm text-gray-600 line-clamp-2">
                                {{ Str::limit(app()->getLocale() === 'kh' && $activity->description_kh ? $activity->description_kh : $activity->description_en, 120) }}
                            </p>
                            <div class="mt-4 flex items-center text-xs text-gray-500">
                                @if($activity->activity_date)
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ $activity->activity_date->format('M d, Y') }}</span>
                                @endif
                                @if($activity->location)
                                <span class="ml-auto flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    {{ $activity->location }}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg">{{ __('messages.no_activities') }}</p>
                </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $activities->links() }}
            </div>
        </div>
    </section>
@endsection
