@props(['variant' => 'primary', 'type' => 'button', 'size' => 'md'])

@php
$baseClasses = 'inline-flex items-center justify-center font-medium rounded-lg transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2';

$sizeClasses = match ($size) {
    'sm' => 'px-3 py-1.5 text-sm',
    'lg' => 'px-6 py-3 text-lg',
    default => 'px-4 py-2 text-sm',
};

$variantClasses = match ($variant) {
    'secondary' => 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 focus:ring-primary-500',
    'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
    'ghost' => 'bg-transparent text-gray-600 hover:bg-gray-100 focus:ring-gray-500',
    default => 'bg-primary-600 text-white hover:bg-primary-700 focus:ring-primary-500',
};
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => "$baseClasses $sizeClasses $variantClasses"]) }}>
    {{ $slot }}
</button>
