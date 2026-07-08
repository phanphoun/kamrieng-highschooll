@extends('layouts.app')

@section('title', __('navigation.notices'))

@section('content')
    <section class="bg-gradient-to-br from-primary-800 to-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">{{ __('navigation.notices') }}</h1>
            <p class="text-xl text-primary-100">{{ __('messages.notices_description') ?? 'Important announcements and notices.' }}</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-4">
                @forelse($notices as $notice)
                <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition {{ $notice->is_urgent ? 'border-l-4 border-red-500' : 'border-l-4 border-primary-500' }}">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 flex-wrap">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ app()->getLocale() === 'kh' && $notice->title_kh ? $notice->title_kh : $notice->title_en }}
                                </h3>
                                @if($notice->is_urgent)
                                <span class="px-2 py-0.5 bg-red-100 text-red-700 rounded-full text-xs font-medium">{{ __('messages.urgent') ?? 'URGENT' }}</span>
                                @endif
                            </div>
                            <p class="mt-2 text-sm text-gray-600">
                                {{ app()->getLocale() === 'kh' && $notice->content_kh ? $notice->content_kh : $notice->content_en }}
                            </p>
                            <div class="mt-3 flex flex-wrap items-center gap-3 text-xs text-gray-500">
                                @if($notice->type)
                                <span class="bg-primary-100 text-primary-700 px-2 py-1 rounded-full">{{ $notice->type }}</span>
                                @endif
                                @if($notice->publish_date)
                                <span>{{ __('messages.published') ?? 'Published' }}: {{ $notice->publish_date->format('M d, Y') }}</span>
                                @endif
                                @if($notice->target_audience && $notice->target_audience !== 'all')
                                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $notice->target_audience }}</span>
                                @endif
                                @if($notice->expiry_date)
                                <span>{{ __('messages.expires') ?? 'Expires' }}: {{ $notice->expiry_date->format('M d, Y') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                    </svg>
                    <p class="text-gray-500 text-lg">{{ __('messages.no_notices') ?? 'No notices available.' }}</p>
                </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $notices->links() }}
            </div>
        </div>
    </section>
@endsection
