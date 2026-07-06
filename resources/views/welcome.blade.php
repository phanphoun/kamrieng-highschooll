@extends('layouts.app')

@section('title', 'វិទ្យាល័យកំរៀង | Kamrieng High School')

@section('content')
<!-- Hero Section - Full viewport with gradient overlay -->
<div class="relative min-h-[80vh] flex items-center bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-950 overflow-hidden">
    <!-- Decorative circles -->
    <div class="absolute -top-40 -right-40 h-96 w-96 rounded-full bg-blue-500/10 blur-3xl"></div>
    <div class="absolute -bottom-40 -left-40 h-96 w-96 rounded-full bg-indigo-500/10 blur-3xl"></div>
    <div class="absolute top-1/2 left-1/3 h-64 w-64 rounded-full bg-blue-400/5 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm text-slate-300 backdrop-blur-sm">
                <svg class="h-4 w-4 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342" />
                </svg>
                <span class="lang-km">រដ្ឋបាលសាលារៀនសាធារណៈ</span>
                <span class="lang-en">Public High School</span>
            </div>

            <!-- Main Heading -->
            <h1 class="mt-8 text-4xl font-bold tracking-tight text-white sm:text-5xl md:text-6xl lg:text-7xl">
                <span class="lang-km block">វិទ្យាល័យកំរៀង</span>
                <span class="lang-en mt-3 block text-2xl text-blue-300 sm:text-3xl md:text-4xl">
                    Kamrieng High School
                </span>
            </h1>

            <p class="mx-auto mt-6 max-w-2xl text-lg text-slate-300 sm:text-xl">
                <span class="lang-km">អប់រំបណ្តុះបណ្តាលយុវជនឱ្យក្លាយជាពលរដ្ឋល្អ មានចំណេះដឹង និងសីលធម៌ខ្ពស់</span>
                <span class="lang-en text-slate-400">Educating youth to become good citizens with knowledge and high morals.</span>
            </p>

            <!-- CTA Buttons -->
            <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('search') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-6 py-3 text-sm font-medium text-white shadow-lg shadow-blue-600/25 transition-all duration-200 hover:bg-blue-500 hover:shadow-xl hover:shadow-blue-500/30">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <span class="lang-km">ស្វែងរក</span>
                    <span class="lang-en">Explore Programs</span>
                </a>
                <a href="{{ url('/about') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-500/30 bg-white/5 px-6 py-3 text-sm font-medium text-slate-200 backdrop-blur-sm transition-all duration-200 hover:bg-white/10 hover:text-white">
                    <span class="lang-km">ស្វែងយល់បន្ថែម</span>
                    <span class="lang-en">Learn More</span>
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <!-- Search Box -->
            <div class="mx-auto mt-12 max-w-xl">
                <form action="{{ route('search') }}" method="GET" class="relative group">
                    <div class="relative">
                        <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        <input
                            type="text"
                            name="q"
                            placeholder="Search news, activities, achievements..."
                            class="w-full rounded-xl border-0 bg-white/10 py-4 pl-12 pr-4 text-base text-white placeholder-slate-400 shadow-lg ring-1 ring-white/10 backdrop-blur-sm transition-all duration-200 focus:bg-white/15 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            autocomplete="off"
                        />
                    </div>
                </form>
            </div>

            <!-- Quick Stats -->
            <div class="mx-auto mt-16 grid max-w-3xl grid-cols-2 gap-4 sm:grid-cols-4">
                <div class="rounded-xl border border-white/5 bg-white/5 p-4 backdrop-blur-sm">
                    <div class="text-2xl font-bold text-white">15+</div>
                    <div class="mt-1 text-xs text-slate-400">
                        <span class="lang-km">ឆ្នាំបង្កើត</span>
                        <span class="lang-en">Years</span>
                    </div>
                </div>
                <div class="rounded-xl border border-white/5 bg-white/5 p-4 backdrop-blur-sm">
                    <div class="text-2xl font-bold text-white">800+</div>
                    <div class="mt-1 text-xs text-slate-400">
                        <span class="lang-km">សិស្ស</span>
                        <span class="lang-en">Students</span>
                    </div>
                </div>
                <div class="rounded-xl border border-white/5 bg-white/5 p-4 backdrop-blur-sm">
                    <div class="text-2xl font-bold text-white">50+</div>
                    <div class="mt-1 text-xs text-slate-400">
                        <span class="lang-km">គ្រូ</span>
                        <span class="lang-en">Teachers</span>
                    </div>
                </div>
                <div class="rounded-xl border border-white/5 bg-white/5 p-4 backdrop-blur-sm">
                    <div class="text-2xl font-bold text-white">12</div>
                    <div class="mt-1 text-xs text-slate-400">
                        <span class="lang-km">ថ្នាក់</span>
                        <span class="lang-en">Classes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-slate-900 sm:text-3xl">
                <span class="lang-km">ស្វែងរកព័ត៌មាននៅសាលា</span>
                <span class="lang-en text-slate-600">Explore School Resources</span>
            </h2>
            <p class="mt-3 text-sm text-slate-500 lang-km">
                ស្វែងរកព័ត៌មាន សកម្មភាព ឯកសារ និងធនធានផ្សេងៗទៀតរបស់សាលាបានយ៉ាងងាយស្រួល
            </p>
            <p class="mt-3 text-sm text-slate-500 lang-en">
                Easily find news, activities, documents, and other school resources
            </p>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- News -->
            <a href="{{ route('search') }}?q=ព័ត៌មាន" class="group rounded-xl border border-slate-200 bg-white p-6 transition-all duration-200 hover:border-blue-300 hover:shadow-lg hover:shadow-blue-100/50">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-50 text-blue-600 transition-colors group-hover:bg-blue-100">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                    </svg>
                </div>
                <h3 class="mt-4 text-base font-semibold text-slate-900 group-hover:text-blue-600">
                    <span class="lang-km">ព័ត៌មាន</span>
                    <span class="lang-en">News</span>
                </h3>
                <p class="mt-2 text-sm text-slate-500 lang-km">អានព័ត៌មាន និងព្រឹត្តិការណ៍ថ្មីៗរបស់សាលា</p>
                <p class="mt-2 text-sm text-slate-500 lang-en">Read the latest school news and events</p>
            </a>

            <!-- Activities -->
            <a href="{{ route('search') }}?q=សកម្មភាព" class="group rounded-xl border border-slate-200 bg-white p-6 transition-all duration-200 hover:border-green-300 hover:shadow-lg hover:shadow-green-100/50">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-50 text-green-600 transition-colors group-hover:bg-green-100">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                </div>
                <h3 class="mt-4 text-base font-semibold text-slate-900 group-hover:text-green-600">
                    <span class="lang-km">សកម្មភាព</span>
                    <span class="lang-en">Activities</span>
                </h3>
                <p class="mt-2 text-sm text-slate-500 lang-km">ស្វែងយល់ពីសកម្មភាពសិស្ស និងកម្មវិធីនានា</p>
                <p class="mt-2 text-sm text-slate-500 lang-en">Explore student activities and programs</p>
            </a>

            <!-- Documents -->
            <a href="{{ route('search') }}?q=ឯកសារ" class="group rounded-xl border border-slate-200 bg-white p-6 transition-all duration-200 hover:border-amber-300 hover:shadow-lg hover:shadow-amber-100/50">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-amber-50 text-amber-600 transition-colors group-hover:bg-amber-100">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </div>
                <h3 class="mt-4 text-base font-semibold text-slate-900 group-hover:text-amber-600">
                    <span class="lang-km">ឯកសារ</span>
                    <span class="lang-en">Documents</span>
                </h3>
                <p class="mt-2 text-sm text-slate-500 lang-km">ទាញយកឯកសារ និងទម្រង់ពាក្យសុំផ្សេងៗ</p>
                <p class="mt-2 text-sm text-slate-500 lang-en">Download documents and application forms</p>
            </a>

            <!-- Gallery -->
            <a href="{{ route('search') }}?q=វិចិត្រសាល" class="group rounded-xl border border-slate-200 bg-white p-6 transition-all duration-200 hover:border-purple-300 hover:shadow-lg hover:shadow-purple-100/50">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-purple-50 text-purple-600 transition-colors group-hover:bg-purple-100">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.41a2.25 2.25 0 0 1 3.182 0l2.909 2.91m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </div>
                <h3 class="mt-4 text-base font-semibold text-slate-900 group-hover:text-purple-600">
                    <span class="lang-km">វិចិត្រសាល</span>
                    <span class="lang-en">Gallery</span>
                </h3>
                <p class="mt-2 text-sm text-slate-500 lang-km">មើលរូបភាព និងវីដេអូសកម្មភាពផ្សេងៗ</p>
                <p class="mt-2 text-sm text-slate-500 lang-en">View photos and videos of school activities</p>
            </a>
        </div>
    </div>
</div>

<!-- About Section -->
<div class="bg-slate-50 py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">
            <div>
                <h2 class="text-2xl font-bold text-slate-900 sm:text-3xl lang-km">
                    ស្វាគមន៍មកកាន់វិទ្យាល័យកំរៀង
                </h2>
                <h2 class="text-2xl font-bold text-blue-600 sm:text-3xl lang-en">
                    Welcome to Kamrieng High School
                </h2>
                <p class="mt-4 text-base leading-relaxed text-slate-600 lang-km">
                    វិទ្យាល័យកំរៀង ជាសាលារៀនសាធារណៈដ៏ឈានមុខគេក្នុងស្រុកកំរៀង ខេត្តបាត់ដំបង។ យើងខ្ញុំមានបេសកកម្មផ្តល់ការអប់រំប្រកបដោយគុណភាព ដើម្បីអភិវឌ្ឍយុវជនឱ្យក្លាយជាធនធានមនុស្សដ៏មានតម្លៃសម្រាប់សង្គម។
                </p>
                <p class="mt-4 text-base leading-relaxed text-slate-600 lang-en">
                    Kamrieng High School is a leading public school in Kamrieng district, Battambang province. Our mission is to provide quality education to develop youth into valuable human resources for society.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('search') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-blue-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        <span class="lang-km">ស្វែងរក</span>
                        <span class="lang-en">Explore</span>
                    </a>
                    <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 shadow-sm transition-all duration-200 hover:bg-slate-50 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <span class="lang-km">ទំនាក់ទំនង</span>
                        <span class="lang-en">Contact</span>
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="aspect-4/3 overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-50 shadow-lg ring-1 ring-slate-200">
                    <div class="flex h-full items-center justify-center p-8">
                        <div class="text-center">
                            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-2xl bg-white shadow-md ring-1 ring-slate-100">
                                <span class="text-3xl font-bold text-blue-600">KH</span>
                            </div>
                            <p class="mt-4 text-sm text-slate-500">
                                <span class="lang-km font-semibold text-slate-700">វិទ្យាល័យកំរៀង</span>
                                <span class="lang-en font-semibold text-slate-700">Kamrieng High School</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="absolute -bottom-4 -right-4 h-24 w-24 rounded-2xl bg-blue-600/5 -z-10"></div>
                <div class="absolute -top-4 -left-4 h-16 w-16 rounded-2xl bg-indigo-600/5 -z-10"></div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-br from-blue-600 to-indigo-700 py-16">
    <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-white sm:text-3xl">
            <span class="lang-km">តើអ្នកកំពុងស្វែងរកអ្វី?</span>
            <br>
            <span class="lang-en text-blue-200">What are you looking for?</span>
        </h2>
        <p class="mx-auto mt-3 max-w-xl text-sm text-blue-100">
            <span class="lang-km">ប្រើប្រាស់ប្រព័ន្ធស្វែងរករបស់យើង ដើម្បីស្វែងរកព័ត៌មាន សកម្មភាព ឯកសារ និងអ្វីៗជាច្រើនទៀត</span>
            <span class="lang-en">Use our search system to find news, activities, documents, and more</span>
        </p>
        <div class="mx-auto mt-8 max-w-md">
            <form action="{{ route('search') }}" method="GET" class="relative">
                <input
                    type="text"
                    name="q"
                    placeholder="ស្វែងរក... | Search..."
                    class="w-full rounded-xl border-0 bg-white/95 px-5 py-3.5 text-sm text-slate-900 shadow-lg transition-all duration-200 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-300"
                    autocomplete="off"
                />
                <button type="submit" class="absolute right-1.5 top-1/2 -translate-y-1/2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-700">
                    <span class="lang-km">ស្វែងរក</span>
                    <span class="lang-en">Search</span>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
