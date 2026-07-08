@props(['variant' => 'info'])

@php
$classes = match ($variant) {
    'success' => 'bg-green-50 border-green-400 text-green-800',
    'warning' => 'bg-yellow-50 border-yellow-400 text-yellow-800',
    'danger' => 'bg-red-50 border-red-400 text-red-800',
    default => 'bg-blue-50 border-blue-400 text-blue-800',
};
@endphp

<div {{ $attributes->merge(['class' => "border-l-4 p-4 rounded-r-lg $classes"]) }} role="alert">
    <p class="text-sm">{{ $slot }}</p>
</div>
