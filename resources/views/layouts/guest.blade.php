<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('auth.login') }} | {{ $siteSettings?->school_name_en ?? 'EduKhmer' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-primary-600 to-primary-900 min-h-screen">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white">{{ $siteSettings?->school_name_en ?? 'EduKhmer High School' }}</h1>
                <p class="text-primary-200 mt-2">{{ $siteSettings?->school_name_kh ?? 'វិទ្យាល័យអេឌុយខ្មែរ' }}</p>
            </div>

            <div class="bg-white rounded-2xl shadow-2xl p-8">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
