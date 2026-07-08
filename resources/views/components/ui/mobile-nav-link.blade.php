@props(['active' => false, 'href' => '#'])

@php
$classes = ($active ?? false)
    ? 'block px-3 py-2 text-sm font-medium text-school-gold bg-white/10 rounded-md'
    : 'block px-3 py-2 text-sm font-medium text-school-muted hover:text-school-gold hover:bg-white/10 rounded-md';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
