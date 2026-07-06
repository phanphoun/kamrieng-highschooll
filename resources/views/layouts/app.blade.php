<!DOCTYPE html>
<html lang="en" data-lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'វិទ្យាល័យកំរៀង | Kamrieng High School')</title>
    <meta name="description" content="@yield('meta_description', 'វិទ្យាល័យកំរៀង - Kamrieng High School, Battambang, Cambodia')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-900 antialiased">
    <!-- Public Navigation -->
    <x-public-navbar :query="$searchQuery ?? ''" />
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    <!-- Footer -->
    <footer class="bg-slate-900">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">

                <!-- Column 1: Quick Links -->
                <div>
                    <h3 class="text-sm font-semibold tracking-wider uppercase text-slate-300">
                        <span class="lang-km">តំណរហ័ស</span>
                        <span class="lang-en">Quick Links</span>
                    </h3>
                    <ul class="mt-4 space-y-2.5">
                        <li><a href="{{ url('/') }}" class="text-sm text-slate-400 transition-colors hover:text-white"><span class="lang-km">ទំព័រដើម</span><span class="lang-en">Home</span></a></li>
                        <li><a href="{{ url('/about') }}" class="text-sm text-slate-400 transition-colors hover:text-white"><span class="lang-km">អំពីសាលា</span><span class="lang-en">About School</span></a></li>
                        <li><a href="{{ url('/news') }}" class="text-sm text-slate-400 transition-colors hover:text-white"><span class="lang-km">ព័ត៌មាន</span><span class="lang-en">News</span></a></li>
                        <li><a href="{{ url('/activities') }}" class="text-sm text-slate-400 transition-colors hover:text-white"><span class="lang-km">សកម្មភាព</span><span class="lang-en">Activities</span></a></li>
                        <li><a href="{{ url('/achievements') }}" class="text-sm text-slate-400 transition-colors hover:text-white"><span class="lang-km">សមិទ្ធផល</span><span class="lang-en">Achievements</span></a></li>
                        <li><a href="{{ url('/gallery') }}" class="text-sm text-slate-400 transition-colors hover:text-white"><span class="lang-km">វិចិត្រសាល</span><span class="lang-en">Gallery</span></a></li>
                        <li><a href="{{ url('/leadership') }}" class="text-sm text-slate-400 transition-colors hover:text-white"><span class="lang-km">ថ្នាក់ដឹកនាំ</span><span class="lang-en">Leadership</span></a></li>
                    </ul>
                </div>

                <!-- Column 2: Resources -->
                <div>
                    <h3 class="text-sm font-semibold tracking-wider uppercase text-slate-300">
                        <span class="lang-km">ធនធាន</span>
                        <span class="lang-en">Resources</span>
                    </h3>
                    <ul class="mt-4 space-y-2.5">
                        <li><a href="{{ route('search') }}" class="text-sm text-slate-400 transition-colors hover:text-white"><span class="lang-km">ស្វែងរក</span><span class="lang-en">Search</span></a></li>
                        <li><a href="{{ url('/documents') }}" class="text-sm text-slate-400 transition-colors hover:text-white"><span class="lang-km">ឯកសារ</span><span class="lang-en">Documents</span></a></li>
                        <li><a href="{{ url('/calendar') }}" class="text-sm text-slate-400 transition-colors hover:text-white"><span class="lang-km">ប្រតិទិន</span><span class="lang-en">Calendar</span></a></li>
                        <li><a href="{{ url('/enroll') }}" class="text-sm text-slate-400 transition-colors hover:text-white"><span class="lang-km">ចុះឈ្មោះ</span><span class="lang-en">Enroll Now</span></a></li>
                        <li><a href="{{ url('/contact') }}" class="text-sm text-slate-400 transition-colors hover:text-white"><span class="lang-km">ទំនាក់ទំនង</span><span class="lang-en">Contact</span></a></li>
                    </ul>
                </div>

                <!-- Column 3: Contact Us -->
                <div>
                    <h3 class="text-sm font-semibold tracking-wider uppercase text-slate-300">
                        <span class="lang-km">ទំនាក់ទំនង</span>
                        <span class="lang-en">Contact Us</span>
                    </h3>
                    <ul class="mt-4 space-y-3">
                        <li class="flex items-start gap-2.5 text-sm text-slate-400">
                            <svg class="mt-0.5 h-4 w-4 flex-shrink-0 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            Kamrieng, Battambang<br>Cambodia
                        </li>
                        <li class="flex items-start gap-2.5 text-sm text-slate-400">
                            <svg class="mt-0.5 h-4 w-4 flex-shrink-0 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            info@kamrieng.edu.kh
                        </li>
                        <li class="flex items-start gap-2.5 text-sm text-slate-400">
                            <svg class="mt-0.5 h-4 w-4 flex-shrink-0 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                            (053) 123 456
                        </li>
                    </ul>
                </div>

                <!-- Column 4: CTA / Brand -->
                <div class="sm:col-span-2 lg:col-span-1">
                    <div class="flex h-full flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-2.5">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 text-base font-bold text-white shadow-lg">
                                    KH
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-white">
                                        <span class="lang-km">វិទ្យាល័យកំរៀង</span>
                                        <span class="lang-en">Kamrieng High School</span>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-4 text-sm leading-relaxed text-slate-400">
                                <span class="lang-km">អប់រំបណ្តុះបណ្តាលយុវជនឱ្យក្លាយជាពលរដ្ឋល្អ មានចំណេះដឹង និងសីលធម៌ខ្ពស់</span>
                                <span class="lang-en">Educating youth to become good citizens with knowledge and high morals.</span>
                            </p>
                        </div>
                        <div class="mt-6">
                            <a href="{{ url('/enroll') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-blue-500">
                                <span class="lang-km">ចុះឈ្មោះឥឡូវនេះ</span>
                                <span class="lang-en">Enroll Now</span>
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                            <p class="mt-2 text-xs text-slate-500">
                                <span class="lang-km">ចុះឈ្មោះឥឡូវនេះ / ចាប់ផ្តើមដំណើររបស់អ្នក</span>
                                <span class="lang-en">Enroll Now / Begin Your Journey</span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-12 border-t border-slate-800 pt-8">
                <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
                    <p class="text-xs text-slate-500">
                        &copy; {{ date('Y') }} <span class="lang-km">វិទ្យាល័យកំរៀង</span><span class="lang-en">Kamrieng High School</span>. <span class="lang-km">រក្សាសិទ្ធិគ្រប់យ៉ាង</span><span class="lang-en">All rights reserved.</span>
                    </p>
                    <p class="text-xs text-slate-600">
                        Built with ❤️ for education
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
