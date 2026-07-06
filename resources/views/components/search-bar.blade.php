@props([
    'placeholder' => 'Search news, activities, achievements...',
    'query' => '',
    'variant' => 'light', // light | dark
])

@php
$inputClasses = $variant === 'dark'
    ? 'w-full rounded-lg border border-slate-600 bg-slate-800/50 py-2.5 pl-10 pr-4 text-sm text-white placeholder-slate-400 transition-all duration-200 focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 focus:outline-none'
    : 'w-full rounded-lg border border-slate-200 bg-white py-2.5 pl-10 pr-4 text-sm text-slate-700 placeholder-slate-400 transition-all duration-200 focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 focus:outline-none';

$iconClasses = $variant === 'dark'
    ? 'text-slate-500'
    : 'text-slate-400';
@endphp

<div class="relative">
    <form action="{{ route('search') }}" method="GET" class="relative">
        <div class="relative flex items-center">
            <svg
                class="absolute left-3 h-4 w-4 {{ $iconClasses }} pointer-events-none"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>

            <input
                type="text"
                name="q"
                value="{{ $query }}"
                placeholder="{{ $placeholder }}"
                class="{{ $inputClasses }}"
                autocomplete="off"
            />
        </div>
    </form>
</div>
