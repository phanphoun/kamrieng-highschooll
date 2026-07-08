@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4">
    <div class="text-center max-w-lg">
        <h1 class="text-8xl font-extrabold text-primary-600 mb-4">404</h1>
        <h2 class="text-2xl font-bold text-gray-900 mb-4">@if(app()->getLocale() === 'kh')ទំព័រមិនត្រូវបានរកឃើញ @else Page Not Found @endif</h2>
        <p class="text-gray-600 mb-8">@if(app()->getLocale() === 'kh')ទំព័រដែលអ្នកកំពុងស្វែងរកមិនមានទេ។ សូមត្រួតពិនិត្យ URL ឬត្រឡប់ទៅទំព័រដើមវិញ។ @else The page you are looking for does not exist. Please check the URL or go back to the homepage. @endif</p>
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-yellow-400 text-slate-900 font-semibold rounded hover:bg-yellow-300 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            @if(app()->getLocale() === 'kh')ត្រឡប់ទៅទំព័រដើម @else Back to Home @endif
        </a>
    </div>
</div>
@endsection
