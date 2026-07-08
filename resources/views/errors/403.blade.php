@extends('layouts.app')

@section('title', '403 - Unauthorized')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4">
    <div class="text-center max-w-lg">
        <h1 class="text-8xl font-extrabold text-primary-600 mb-4">403</h1>
        <h2 class="text-2xl font-bold text-gray-900 mb-4">@if(app()->getLocale() === 'kh')គ្មានការអនុញ្ញាត @else Unauthorized @endif</h2>
        <p class="text-gray-600 mb-8">@if(app()->getLocale() === 'kh')អ្នកមិនមានសិទ្ធិចូលមើលទំព័រនេះទេ។ សូមទាក់ទងអ្នកគ្រប់គ្រងប្រសិនបើអ្នកគិតថានេះជាកំហុស។ @else You do not have permission to access this page. Please contact the administrator if you believe this is an error. @endif</p>
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-yellow-400 text-slate-900 font-semibold rounded hover:bg-yellow-300 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            @if(app()->getLocale() === 'kh')ត្រឡប់ទៅទំព័រដើម @else Back to Home @endif
        </a>
    </div>
</div>
@endsection
