@extends('layouts.app')

@section('title', __('navigation.contact'))

@section('content')
    <section class="bg-slate-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="block h-px w-10 bg-yellow-400 mx-auto mb-4"></span>
            <h1 class="text-4xl font-bold mb-3 text-yellow-400">{{ __('navigation.contact') }}</h1>
            <p class="text-primary-100">{{ __('messages.contact_us_description') }}</p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="block h-px w-8 bg-yellow-400"></span>
                        <h2 class="text-2xl font-bold text-gray-900">{{ __('messages.send_us_message') }}</h2>
                    </div>
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.your_name') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="input-field">
                            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.email') }}</label>
                                <input type="email" name="email" value="{{ old('email') }}" required class="input-field">
                                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.phone') }}</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="input-field">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.subject') }}</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" required class="input-field">
                            @error('subject') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.message') }}</label>
                            <textarea name="message" rows="5" required class="input-field">{{ old('message') }}</textarea>
                            @error('message') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <button type="submit" class="px-8 py-3 bg-yellow-400 text-slate-900 font-semibold rounded hover:bg-yellow-300 transition">
                            {{ __('messages.send_message') }}
                        </button>
                    </form>
                </div>

                <div class="bg-slate-50 rounded-xl p-8 border border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('messages.contact_info') }}</h2>
                    <div class="space-y-6">
                        @if($siteSettings?->address_en)
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-yellow-400/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900">{{ __('messages.address') }}</h3>
                                <p class="text-gray-600 mt-1">{{ $siteSettings->address_en }}</p>
                            </div>
                        </div>
                        @endif
                        @if($siteSettings?->phone)
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-yellow-400/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900">{{ __('messages.phone') }}</h3>
                                <p class="text-gray-600 mt-1">{{ $siteSettings->phone }}</p>
                            </div>
                        </div>
                        @endif
                        @if($siteSettings?->email)
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-yellow-400/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 002 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900">{{ __('messages.email') }}</h3>
                                <p class="text-gray-600 mt-1">{{ $siteSettings->email }}</p>
                            </div>
                        </div>
                        @endif
                        @if($siteSettings?->opening_hours)
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-yellow-400/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-medium text-gray-900">{{ __('messages.opening_hours') }}</h3>
                                <p class="text-gray-600 mt-1">{{ $siteSettings->opening_hours }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
