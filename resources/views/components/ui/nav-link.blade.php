@props(['active' => false, 'href' => '#'])

@php
$classes = ($active ?? false)
    ? 'px-3 py-2 text-sm font-medium text-primary-600 border-b-2 border-primary-600 transition'
    : 'px-3 py-2 text-sm font-medium text-gray-600 hover:text-primary-600 hover:border-b-2 hover:border-primary-300 transition';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
