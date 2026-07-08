@extends('layouts.admin')

@section('title', __('admin.dashboard'))

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">{{ __('admin.dashboard') }}</h1>
        <p class="text-gray-600 mt-1">{{ __('admin.dashboard_description') }}</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">{{ __('admin.total_users') }}</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['total_users'] }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">{{ __('admin.total_news') }}</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['total_news'] }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">{{ __('admin.total_enrollments') }}</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['total_enrollments'] }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">{{ __('admin.unread_messages') }}</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['unread_messages'] }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Enrollments -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">{{ __('admin.recent_enrollments') }}</h2>
            </div>
            <div class="p-6">
                @forelse($recentEnrollments as $enrollment)
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-0">
                        <div>
                            <p class="font-medium text-gray-900">{{ $enrollment->student_name_en }}</p>
                            <p class="text-sm text-gray-500">{{ $enrollment->tracking_code }}</p>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-medium"
                              style="background-color: {{ $enrollment->status?->color }}20; color: {{ $enrollment->status?->color }}">
                            {{ $enrollment->status?->name_en ?? 'Pending' }}
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">{{ __('admin.no_enrollments') }}</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">{{ __('admin.recent_messages') }}</h2>
            </div>
            <div class="p-6">
                @forelse($recentMessages as $message)
                    <div class="py-2 border-b border-gray-100 last:border-0">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-gray-900">{{ $message->name }}</p>
                                <p class="text-sm text-gray-500">{{ Str::limit($message->subject, 40) }}</p>
                            </div>
                            @if(!$message->is_read)
                                <span class="w-2 h-2 bg-primary-500 rounded-full"></span>
                            @endif
                        </div>
                        <p class="text-xs text-gray-400 mt-1">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">{{ __('admin.no_messages') }}</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
