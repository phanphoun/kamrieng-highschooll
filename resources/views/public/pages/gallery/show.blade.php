@extends('layouts.app')

@section('title', $album->title_en)

@section('content')
    <section class="bg-gradient-to-br from-purple-800 to-purple-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-sm text-purple-200 mb-4">
                <a href="{{ route('gallery.index') }}" class="hover:text-white transition">{{ __('navigation.gallery') }}</a>
                <span class="mx-2">/</span>
                <span>{{ Str::limit(app()->getLocale() === 'kh' && $album->title_kh ? $album->title_kh : $album->title_en, 60) }}</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold">{{ app()->getLocale() === 'kh' && $album->title_kh ? $album->title_kh : $album->title_en }}</h1>
            @if($album->description_en)
            <p class="mt-4 text-lg text-purple-100">{{ app()->getLocale() === 'kh' && $album->description_kh ? $album->description_kh : $album->description_en }}</p>
            @endif
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($album->images && $album->images->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($album->images as $image)
                <div class="rounded-xl overflow-hidden shadow-sm group cursor-pointer">
                    <img src="{{ asset($image->image_path) }}" alt="{{ $image->caption_en ?? $album->title_en }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300" onerror='this.onerror=null;this.outerHTML="<div class=\"w-full h-64 bg-gradient-to-br from-purple-300 to-purple-500 flex items-center justify-center\"><svg class=\"w-12 h-12 text-white/60\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"1.5\" d=\"M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\"/></svg></div>"'>
                    @if($image->caption_en)
                    <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        <p class="text-white text-sm">{{ app()->getLocale() === 'kh' && $image->caption_kh ? $image->caption_kh : $image->caption_en }}</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-500 text-lg">{{ __('messages.no_images') ?? 'No images in this album.' }}</p>
            </div>
            @endif
        </div>
    </section>

    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <a href="{{ route('gallery.index') }}" class="inline-flex items-center text-purple-600 font-medium hover:text-purple-800 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                {{ __('messages.back_to_gallery') ?? 'Back to Gallery' }}
            </a>
        </div>
    </section>
@endsection
