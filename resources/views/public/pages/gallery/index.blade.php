@extends('layouts.app')

@section('title', __('navigation.gallery'))

@section('content')
    <section class="bg-gradient-to-br from-primary-800 to-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">{{ __('navigation.gallery') }}</h1>
            <p class="text-xl text-primary-100">{{ __('messages.gallery_description') ?? __('messages.school_description_short') }}</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($albums as $album)
                <a href="{{ route('gallery.show', $album->id) }}" class="group">
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                        <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                            @if($album->cover_image)
                            <img src="{{ asset($album->cover_image) }}" alt="{{ $album->title_en }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                            <svg class="w-16 h-16 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 group-hover:text-primary-600 transition">
                                {{ app()->getLocale() === 'kh' && $album->title_kh ? $album->title_kh : $album->title_en }}
                            </h3>
                            @if($album->description_en)
                            <p class="mt-2 text-sm text-gray-600 line-clamp-2">
                                {{ app()->getLocale() === 'kh' && $album->description_kh ? $album->description_kh : $album->description_en }}
                            </p>
                            @endif
                            @if($album->images_count)
                            <p class="mt-3 text-xs text-gray-500">
                                {{ $album->images_count }} {{ __('messages.photos') ?? 'photos' }}
                            </p>
                            @endif
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg">{{ __('messages.no_gallery') ?? 'No albums available.' }}</p>
                </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $albums->links() }}
            </div>
        </div>
    </section>
@endsection
