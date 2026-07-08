<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', config('app.name', 'Kamrieng High School'))</title>

<meta name="description" content="@yield('meta_description', '')">

<!-- Open Graph -->
<meta property="og:title" content="@yield('og_title', config('app.name', 'Kamrieng High School'))">
<meta property="og:description" content="@yield('og_description', '')">
<meta property="og:image" content="@yield('og_image', asset('images/og-default.png'))">
<meta property="og:type" content="website">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

@stack('styles')
