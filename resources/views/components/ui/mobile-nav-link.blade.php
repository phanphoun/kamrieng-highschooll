@props(['active' => false, 'href' => '#'])

@php
$classes = ($active ?? false)
    ? 'block px-3 py-2 text-sm font-medium text-primary-600 bg-primary-50 rounded-md'
    : 'block px-3 py-2 text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-gray-50 rounded-md';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
