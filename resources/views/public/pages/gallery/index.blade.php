@extends('layouts.app')

@section('title', __('navigation.gallery'))

@section('content')
@php
    $demoAlbums = collect([
        [
            'title' => 'Campus Tour - New Facilities',
            'description' => 'A quick look at classrooms, study spaces, and the school grounds prepared for students.',
            'image' => 'https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1200&q=80',
            'fallback' => 'images/gallery/demo-campus.svg',
            'year' => '2026',
            'photos' => 3,
            'tag' => 'campus',
        ],
        [
            'title' => 'Art Exhibition: Young Creative Minds',
            'description' => 'Students working together during lessons, projects, and daily classroom activities.',
            'image' => 'https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&w=1200&q=80',
            'fallback' => 'images/gallery/demo-classroom.svg',
            'year' => '2026',
            'photos' => 2,
            'tag' => 'academics',
        ],
        [
            'title' => 'Khmer New Year Celebration 2026',
            'description' => 'Students celebrating tradition, music, performance, and community pride.',
            'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80',
            'fallback' => 'images/gallery/demo-culture.svg',
            'year' => '2026',
            'photos' => 4,
            'tag' => 'culture',
        ],
        [
            'title' => 'Annual Sports Day',
            'description' => 'Friendly competitions, teamwork, and school spirit from our annual sports event.',
            'image' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?auto=format&fit=crop&w=1200&q=80',
            'fallback' => 'images/gallery/demo-sports.svg',
            'year' => '2026',
            'photos' => 14,
            'tag' => 'sports',
        ],
        [
            'title' => 'Community Events Week',
            'description' => 'School gatherings, student showcases, and activities across the campus.',
            'image' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&w=1200&q=80',
            'fallback' => 'images/gallery/demo-library.svg',
            'year' => '2025',
            'photos' => 6,
            'tag' => 'events',
        ],
        [
            'title' => 'Graduation Ceremony',
            'description' => 'A proud school milestone honoring graduates and their families.',
            'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1200&q=80',
            'fallback' => 'images/gallery/demo-graduation.svg',
            'year' => '2025',
            'photos' => 9,
            'tag' => 'graduation',
        ],
    ]);

    $fallbackImages = $demoAlbums->pluck('fallback')->values();
    $categories = collect([
        ['label' => 'All', 'value' => null],
        ['label' => 'Events', 'value' => 'events'],
        ['label' => 'Sports', 'value' => 'sports'],
        ['label' => 'Academics', 'value' => 'academics'],
        ['label' => 'Culture', 'value' => 'culture'],
        ['label' => 'Graduation', 'value' => 'graduation'],
        ['label' => 'Campus', 'value' => 'campus'],
    ]);
    $displayYears = $years->count() ? $years : $demoAlbums->pluck('year')->unique()->values();
    $visibleDemoAlbums = $demoAlbums
        ->when($activeCategory, fn ($items) => $items->where('tag', $activeCategory))
        ->when($activeYear, fn ($items) => $items->where('year', (string) $activeYear))
        ->values();
    $showRealAlbums = $albums->count() > 0 && ! $activeCategory;
@endphp

<section class="bg-school-navy text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-24 md:pt-24 md:pb-28">
        <div class="flex flex-wrap items-center gap-3 text-base font-extrabold text-school-gold mb-8 reveal">
            <a href="{{ route('gallery.index') }}" class="hover:text-white transition">{{ __('navigation.home') }}</a>
            <span class="text-school-gold">›</span>
            <span>{{ __('navigation.gallery') }}</span>
        </div>

        <div class="max-w-3xl">
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-normal text-white reveal reveal-delay-100">Photo Gallery</h1>
            <p class="mt-6 text-xl md:text-2xl font-bold text-school-muted reveal reveal-delay-200">Memories that define our school journey</p>
        </div>
    </div>
</section>

<section class="bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <div class="flex flex-wrap items-center gap-3 mb-12 reveal">
            @foreach($categories as $category)
                @php
                    $categoryValue = $category['value'];
                    $isActiveCategory = $activeCategory === $categoryValue || (! $activeCategory && ! $categoryValue);
                @endphp
                <a href="{{ route('gallery.index', array_filter(['category' => $categoryValue])) }}" class="px-6 py-3 rounded-xl text-base font-extrabold transition {{ $isActiveCategory ? 'bg-school-navy text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    {{ $category['label'] }}
                </a>
            @endforeach

            <a href="{{ route('gallery.index', array_filter(['category' => $activeCategory])) }}" class="ml-0 lg:ml-3 px-6 py-3 rounded-xl text-base font-extrabold transition {{ $activeYear ? 'bg-slate-100 text-slate-600 hover:bg-slate-200' : 'bg-school-gold text-white' }}">
                All Years
            </a>
            @foreach($displayYears as $year)
                <a href="{{ route('gallery.index', array_filter(['category' => $activeCategory, 'year' => $year])) }}" class="px-6 py-3 rounded-xl text-base font-extrabold transition {{ (string) $activeYear === (string) $year ? 'bg-school-gold text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    {{ $year }}
                </a>
            @endforeach
        </div>

        @if($showRealAlbums)
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach($albums as $album)
                    @php
                        $title = app()->getLocale() === 'kh' && $album->title_kh ? $album->title_kh : $album->title_en;
                        $description = app()->getLocale() === 'kh' && $album->description_kh ? $album->description_kh : $album->description_en;
                        $year = $album->created_at ? $album->created_at->format('Y') : date('Y');
                        $fallbackImage = asset($fallbackImages[$loop->index % $fallbackImages->count()]);
                    @endphp

                    <a href="{{ route('gallery.show', $album->id) }}" class="group block overflow-hidden rounded-[20px] bg-white shadow-sm ring-1 ring-slate-200/70 hover:shadow-lg transition reveal" style="transition-delay: {{ ($loop->index % 3) * 100 }}ms">
                        <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
                            @if($album->cover_image)
                                <img src="{{ asset($album->cover_image) }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" onerror="this.onerror=null;this.src='{{ $fallbackImage }}';">
                            @else
                                <img src="{{ $fallbackImage }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @endif
                            <div class="absolute inset-x-0 bottom-0 p-6 bg-gradient-to-t from-black/80 via-black/35 to-transparent">
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="px-3 py-1 rounded-xl bg-school-gold text-white text-sm font-extrabold">gallery</span>
                                    <span class="px-3 py-1 rounded-lg bg-black/55 text-white text-xs font-bold">{{ $year }}</span>
                                </div>
                                <h2 class="text-2xl font-extrabold text-white line-clamp-2">{{ $title }}</h2>
                                <p class="mt-1 text-base font-bold text-white/80">{{ $album->images_count }} {{ __('messages.photos') ?? 'Photos' }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            @if($albums->hasPages())
                <div class="mt-10">
                    {{ $albums->links() }}
                </div>
            @endif
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach($visibleDemoAlbums as $demoAlbum)
                    <article class="group overflow-hidden rounded-[20px] bg-white shadow-sm ring-1 ring-slate-200/70 hover:shadow-lg transition reveal" style="transition-delay: {{ ($loop->index % 3) * 100 }}ms">
                        <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
                            <img src="{{ $demoAlbum['image'] }}" alt="{{ $demoAlbum['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" onerror="this.onerror=null;this.src='{{ asset($demoAlbum['fallback']) }}';">
                            <div class="absolute inset-x-0 bottom-0 p-6 bg-gradient-to-t from-black/80 via-black/35 to-transparent">
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="px-3 py-1 rounded-xl bg-school-gold text-white text-sm font-extrabold">{{ $demoAlbum['tag'] }}</span>
                                    <span class="px-3 py-1 rounded-xl bg-black/55 text-white text-sm font-extrabold">{{ $demoAlbum['year'] }}</span>
                                </div>
                                <h2 class="text-2xl font-extrabold text-white line-clamp-2">{{ $demoAlbum['title'] }}</h2>
                                <p class="mt-1 text-base font-bold text-white/80">{{ $demoAlbum['photos'] }} Photos</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @if($visibleDemoAlbums->isEmpty())
                <div class="text-center py-16 rounded-[20px] bg-white ring-1 ring-slate-200">
                    <p class="text-slate-600 font-bold">No gallery items match this filter.</p>
                </div>
            @endif
        @endif
    </div>
</section>
@endsection
