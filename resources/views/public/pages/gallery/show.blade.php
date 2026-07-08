@extends('layouts.app')

@section('title', $album->title_en)

@section('content')
@php
    $title = app()->getLocale() === 'kh' && $album->title_kh ? $album->title_kh : $album->title_en;
    $description = app()->getLocale() === 'kh' && $album->description_kh ? $album->description_kh : $album->description_en;
    $demoImages = [
        ['image' => 'https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1200&q=80', 'fallback' => 'images/gallery/demo-campus.svg', 'caption' => 'Campus entrance and school grounds'],
        ['image' => 'https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&w=1200&q=80', 'fallback' => 'images/gallery/demo-classroom.svg', 'caption' => 'Classroom learning activities'],
        ['image' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&w=1200&q=80', 'fallback' => 'images/gallery/demo-library.svg', 'caption' => 'Library reading and study time'],
        ['image' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?auto=format&fit=crop&w=1200&q=80', 'fallback' => 'images/gallery/demo-sports.svg', 'caption' => 'Sports day teamwork and competition'],
        ['image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80', 'fallback' => 'images/gallery/demo-culture.svg', 'caption' => 'Khmer culture celebration'],
        ['image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1200&q=80', 'fallback' => 'images/gallery/demo-graduation.svg', 'caption' => 'Graduation ceremony memories'],
    ];
@endphp

<div x-data="{ lightboxOpen: false, activeImage: '', activeCaption: '' }">
    <section class="bg-school-navy text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
            <div class="flex flex-wrap items-center gap-2 text-sm font-semibold text-school-gold mb-8 reveal">
                <a href="{{ route('gallery.index') }}" class="hover:text-white transition">{{ __('navigation.gallery') }}</a>
                <span>/</span>
                <span class="text-school-muted">{{ $title }}</span>
            </div>

            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
                <div class="max-w-3xl">
                    <p class="inline-flex px-3 py-1 rounded-lg bg-school-gold text-white text-sm font-bold mb-4 reveal reveal-delay-100">
                        {{ $album->images ? $album->images->count() : 0 }} {{ __('messages.photos') ?? 'Photos' }}
                    </p>
                    <h1 class="text-3xl md:text-5xl font-extrabold tracking-normal text-white reveal reveal-delay-200">{{ $title }}</h1>
                    @if($description)
                        <p class="mt-4 text-lg text-school-muted leading-8 reveal reveal-delay-300">{{ $description }}</p>
                    @endif
                </div>

                <a href="{{ route('gallery.index') }}" class="inline-flex items-center justify-center px-5 py-3 rounded-lg bg-school-blue text-white text-sm font-bold hover:bg-school-blue-hover transition reveal reveal-delay-300">
                    {{ __('messages.back_to_gallery') ?? 'Back to Gallery' }}
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
            @if($album->images && $album->images->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                    @foreach($album->images as $image)
                        @php
                            $caption = app()->getLocale() === 'kh' && $image->caption_kh ? $image->caption_kh : ($image->caption_en ?? $title);
                            $imgUrl = asset($image->image_path);
                            $fallbackImage = asset($demoImages[$loop->index % count($demoImages)]['fallback']);
                        @endphp
                        <button type="button" @click="activeImage = @js($imgUrl); activeCaption = @js($caption); lightboxOpen = true" class="group relative overflow-hidden rounded-lg bg-slate-100 border border-slate-200 aspect-[4/3] text-left shadow-sm hover:shadow-md transition reveal" style="transition-delay: {{ ($loop->index % 4) * 100 }}ms">
                            <img src="{{ $imgUrl }}" alt="{{ $caption }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" onerror="this.onerror=null;this.src='{{ $fallbackImage }}';">
                            <span class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black/70 to-transparent text-sm font-semibold text-white opacity-0 group-hover:opacity-100 transition">
                                {{ $caption }}
                            </span>
                        </button>
                    @endforeach
                </div>
            @else
                <div class="mb-8 rounded-lg border border-school-gold/30 bg-amber-50 px-5 py-4">
                    <p class="text-sm font-semibold text-slate-700">Demo photos are showing for this album. Upload real images in the admin panel to replace them.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                    @foreach($demoImages as $demoImage)
                        @php
                            $imgUrl = $demoImage['image'];
                            $fallbackImage = asset($demoImage['fallback']);
                            $caption = $demoImage['caption'];
                        @endphp
                        <button type="button" @click="activeImage = @js($imgUrl); activeCaption = @js($caption); lightboxOpen = true" class="group relative overflow-hidden rounded-lg bg-slate-100 border border-slate-200 aspect-[4/3] text-left shadow-sm hover:shadow-md transition reveal" style="transition-delay: {{ ($loop->index % 4) * 100 }}ms">
                            <img src="{{ $imgUrl }}" alt="{{ $caption }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" onerror="this.onerror=null;this.src='{{ $fallbackImage }}';">
                            <span class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black/70 to-transparent text-sm font-semibold text-white opacity-0 group-hover:opacity-100 transition">
                                {{ $caption }}
                            </span>
                        </button>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <div x-show="lightboxOpen" x-transition.opacity @keydown.escape.window="lightboxOpen = false" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90" style="display: none;">
        <button type="button" @click="lightboxOpen = false" class="absolute top-5 right-5 w-11 h-11 rounded-lg bg-white/10 text-white hover:bg-school-blue transition" aria-label="Close image">
            <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <div @click.away="lightboxOpen = false" class="max-w-5xl w-full">
            <img :src="activeImage" :alt="activeCaption" class="max-h-[78vh] w-auto max-w-full mx-auto object-contain rounded-lg">
            <p x-text="activeCaption" class="mt-4 text-center text-white font-semibold"></p>
        </div>
    </div>
</div>
@endsection
