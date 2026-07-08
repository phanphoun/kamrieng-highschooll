@extends('layouts.app')

@section('title', __('navigation.downloads'))

@section('content')
    <section class="bg-gradient-to-br from-primary-800 to-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">{{ __('navigation.downloads') }}</h1>
            <p class="text-xl text-primary-100">{{ __('messages.downloads_description') ?? 'Download school resources and forms.' }}</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(isset($categories) && $categories->count() > 0)
            <div class="flex flex-wrap gap-2 mb-8 justify-center">
                <a href="{{ route('downloads.index') }}" class="px-4 py-2 rounded-full text-sm font-medium {{ !request('category') ? 'bg-primary-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100' }} border border-gray-200 transition">
                    {{ __('messages.all') }}
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('downloads.index', ['category' => $cat]) }}" class="px-4 py-2 rounded-full text-sm font-medium {{ request('category') === $cat ? 'bg-primary-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100' }} border border-gray-200 transition">
                    {{ $cat }}
                </a>
                @endforeach
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($downloads as $download)
                <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition group">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-semibold text-gray-900 truncate">
                                {{ app()->getLocale() === 'kh' && $download->title_kh ? $download->title_kh : $download->title_en }}
                            </h3>
                            @if($download->description_en)
                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                {{ app()->getLocale() === 'kh' && $download->description_kh ? $download->description_kh : $download->description_en }}
                            </p>
                            @endif
                            <div class="mt-3 flex items-center gap-4 text-xs text-gray-500">
                                @if($download->file_type)
                                <span class="uppercase font-medium">{{ $download->file_type }}</span>
                                @endif
                                @if($download->file_size)
                                <span>{{ number_format($download->file_size / 1024, 1) }} KB</span>
                                @endif
                                @if($download->category)
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full">{{ $download->category }}</span>
                                @endif
                            </div>
                        </div>
                        <a href="{{ asset($download->file_path) }}" class="flex-shrink-0 p-2 bg-primary-50 text-primary-600 rounded-lg hover:bg-primary-100 transition" download>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-2 text-center py-12">
                    <p class="text-gray-500 text-lg">{{ __('messages.no_downloads') ?? 'No downloads available.' }}</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
