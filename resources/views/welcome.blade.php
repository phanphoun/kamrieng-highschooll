@php
    $locale = app()->getLocale();
    $isKhmer = $locale === 'kh';
@endphp

@extends('layouts.app')

@section('title', $isKhmer ? 'វិទ្យាល័យកំរៀង' : 'Kamrieng High School')

@section('content')
<!-- Simple Hero Section -->
<section class="min-h-[85vh] flex items-center justify-center bg-[#192436] relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.05\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>

    <div class="relative text-center px-4 sm:px-6 max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-blue-200 rounded-full px-4 py-1.5 text-sm font-medium mb-6 border border-white/10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            {{ $isKhmer ? 'សូមស្វាគមន៍មកកាន់' : 'Welcome to' }}
        </div>

        <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold text-white mb-4 leading-tight">
            <span class="block">{{ $isKhmer ? 'វិទ្យាល័យកំរៀង' : 'Kamrieng High School' }}</span>
        </h1>

        <p class="text-lg md:text-xl text-blue-100/80 mb-10 max-w-xl mx-auto">
            {{ $isKhmer ? 'ស្វាគមន៍មកកាន់គេហទំព័ររបស់យើង។ សូមទស្សនាទំព័រព័ត៌មានសម្រាប់ព័ត៌មានថ្មីៗ។' : 'Welcome to our website. Visit our news page for the latest updates and announcements.' }}
        </p>

        <a href="{{ route('public.news.index') }}" 
           class="inline-flex items-center gap-3 px-8 py-4 bg-[#086fd3] text-white rounded-2xl font-bold hover:bg-[#0757a8] transition-all duration-300 shadow-2xl hover:shadow-[#086fd3]/25 group text-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
            </svg>
            {{ $isKhmer ? 'ទស្សនាព័ត៌មាន' : 'View News' }}
            <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</section>
@endsection
