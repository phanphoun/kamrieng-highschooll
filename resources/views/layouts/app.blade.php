
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'kh' ? 'ltr' : 'ltr' }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $siteSettings?->school_name_en ?? 'EduKhmer High School' }} | @yield('title', __('messages.home'))</title>
    <meta name="description" content="@yield('meta_description', $siteSettings?->about_description_en ?? '')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="font-sans antialiased text-gray-900 bg-gray-50">

    <!-- Navigation -->
    <x-public.public-nav />
    <!-- Page Content -->

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <x-public.public-footer />

    <!-- Toast Messages -->
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
             class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    @stack('scripts')
</body>
</html>
