@extends('layouts.app')

@section('title', __('messages.track_application') ?? 'Track Application')

@section('content')
    <section class="bg-gradient-to-br from-primary-800 to-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">{{ __('messages.track_application') ?? 'Track Your Application' }}</h1>
            <p class="text-xl text-primary-100">{{ __('messages.track_description') ?? 'Check the status of your enrollment application using your tracking code.' }}</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="bg-green-100 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-8">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">{{ __('messages.enter_tracking_code') ?? 'Enter Your Tracking Code' }}</h2>
                <form method="GET" action="{{ route('enrollment.track') }}" class="flex gap-3">
                    <input type="text" name="code" value="{{ $code ?? '' }}" placeholder="{{ __('messages.tracking_code') ?? 'e.g. EDU-ABC123' }}" class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition" required>
                    <button type="submit" class="px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition">
                        {{ __('messages.search') }}
                    </button>
                </form>
            </div>

            @if($application)
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="bg-primary-600 text-white px-6 py-4">
                    <h3 class="text-lg font-semibold">{{ __('messages.application_details') ?? 'Application Details' }}</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">{{ __('messages.tracking_code') ?? 'Tracking Code' }}</p>
                            <p class="font-medium text-gray-900">{{ $application->tracking_code }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">{{ __('messages.status') ?? 'Status' }}</p>
                            @if($application->status)
                            <span class="inline-block px-3 py-1 rounded-full text-sm font-medium" style="background-color: {{ $application->status->color }}20; color: {{ $application->status->color }}">
                                {{ app()->getLocale() === 'kh' && $application->status->name_kh ? $application->status->name_kh : $application->status->name_en }}
                            </span>
                            @else
                            <span class="text-gray-500">{{ __('messages.pending') ?? 'Pending' }}</span>
                            @endif
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">{{ __('messages.student_name_en') ?? 'Student Name' }}</p>
                            <p class="font-medium text-gray-900">{{ $application->student_name_en }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">{{ __('messages.grade_applying') ?? 'Grade' }}</p>
                            <p class="font-medium text-gray-900">{{ $application->grade_applying_for }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">{{ __('messages.academic_year') ?? 'Academic Year' }}</p>
                            <p class="font-medium text-gray-900">{{ $application->academic_year }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">{{ __('messages.submitted') ?? 'Submitted' }}</p>
                            <p class="font-medium text-gray-900">{{ $application->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    @if($application->remarks)
                    <div class="pt-4 border-t">
                        <p class="text-sm text-gray-500 mb-1">{{ __('messages.remarks') ?? 'Remarks' }}</p>
                        <p class="text-gray-900">{{ $application->remarks }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @elseif($code && !$application)
            <div class="bg-yellow-50 border border-yellow-200 text-yellow-700 px-6 py-4 rounded-xl text-center">
                {{ __('messages.application_not_found') ?? 'No application found with that tracking code. Please check your code and try again.' }}
            </div>
            @endif

            <div class="mt-8 text-center">
                <a href="{{ route('enrollment.apply') }}" class="text-primary-600 font-medium hover:text-primary-800 transition">{{ __('messages.new_application') ?? 'Submit a New Application' }} &rarr;</a>
            </div>
        </div>
    </section>
@endsection
