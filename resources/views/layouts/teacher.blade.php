<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Teacher - Kamrieng High School')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="teacher-layout">
    @include('components.teacher-navbar')
    <div class="teacher-container">
        @yield('content')
    </div>
</body>
</html>