<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Kamrieng High School')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-layout">
    @include('components.admin-navbar')
    <div class="admin-container">
        @yield('content')
    </div>
    @include('components.admin-sidebar')
</body>
</html>