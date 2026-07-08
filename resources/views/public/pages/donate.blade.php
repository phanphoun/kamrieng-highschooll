@extends('layouts.app')

@section('title', __('navigation.donate'))

@section('content')
    <section class="bg-gradient-to-br from-primary-800 to-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">{{ __('navigation.donate') }}</h1>
            <p class="text-xl text-primary-100">{{ __('messages.donate_description') ?? 'Support education and make a difference.' }}</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('messages.support_our_school') ?? 'Support Our School' }}</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    {{ __('messages.donate_body') ?? 'Your generous donation helps us provide better educational resources, facilities, and opportunities for our students. Every contribution makes a difference in shaping the future of Cambodia\'s youth.' }}
                </p>
            </div>

            @php
                $locale = app()->getLocale();
                $bankName = $locale === 'kh' ? ($settings->donation_bank_name_kh ?? null) : ($settings->donation_bank_name_en ?? null);
                $accountName = $locale === 'kh' ? ($settings->donation_account_name_kh ?? null) : ($settings->donation_account_name_en ?? null);
                $accountNumber = $settings->donation_account_number ?? null;
                $instructions = $locale === 'kh' ? ($settings->donation_instructions_kh ?? null) : ($settings->donation_instructions_en ?? null);
                $qrCodePath = $settings->donation_qr_code_path ?? null;
            @endphp

            @if($bankName || $accountName || $accountNumber || $qrCodePath)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                    <div class="bg-gradient-to-r from-primary-700 to-primary-600 px-8 py-5">
                        <div class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                            <h3 class="text-xl font-semibold text-white">{{ __('messages.bank_transfer') ?? 'Bank Transfer' }}</h3>
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                            <div class="space-y-6">
                                @if($bankName)
                                    <div class="pb-4 border-b border-gray-100">
                                        <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">{{ __('messages.bank_name') ?? 'Bank' }}</span>
                                        <p class="mt-1.5 text-lg font-semibold text-gray-900">{{ $bankName }}</p>
                                    </div>
                                @endif
                                @if($accountName)
                                    <div class="pb-4 border-b border-gray-100">
                                        <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">{{ __('messages.account_name') ?? 'Account Name' }}</span>
                                        <p class="mt-1.5 text-lg font-semibold text-gray-900">{{ $accountName }}</p>
                                    </div>
                                @endif
                                @if($accountNumber)
                                    <div>
                                        <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">{{ __('messages.account_number') ?? 'Account Number' }}</span>
                                        <div class="mt-1.5 flex items-center gap-3">
                                            <span class="text-xl font-bold font-mono tracking-wider text-primary-700 bg-primary-50 px-4 py-2.5 rounded-lg border border-primary-200/50 select-all">{{ $accountNumber }}</span>
                                            <button onclick="navigator.clipboard.writeText('{{ $accountNumber }}').then(() => { this.innerHTML = 'Copied!'; setTimeout(() => this.innerHTML = 'Copy', 2000); })" class="px-4 py-2.5 text-sm font-medium text-primary-700 bg-primary-50 border border-primary-200/50 rounded-lg hover:bg-primary-100 transition shrink-0">
                                                Copy
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            @if($qrCodePath)
                                <div class="flex flex-col items-center justify-center">
                                    <div onclick="document.getElementById('qr-modal').classList.remove('hidden')" class="bg-white p-4 rounded-xl shadow-sm border border-gray-200 cursor-pointer hover:shadow-md transition-shadow">
                                        <img src="{{ asset('storage/' . $qrCodePath) }}" alt="QR Code" class="w-56 h-56 md:w-72 md:h-72 object-contain">
                                    </div>
                                    <p class="mt-3 text-sm text-gray-400">Click QR to enlarge</p>
                                </div>

                                <div id="qr-modal" class="hidden fixed inset-0 z-50 bg-black/70 flex items-center justify-center p-4" onclick="if(event.target === this) this.classList.add('hidden')">
                                    <div class="relative bg-white rounded-2xl p-6 shadow-2xl max-w-lg w-full">
                                        <button onclick="document.getElementById('qr-modal').classList.add('hidden')" class="absolute -top-3 -right-3 w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center text-gray-500 hover:text-gray-700 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                        </button>
                                        <img src="{{ asset('storage/' . $qrCodePath) }}" alt="QR Code" class="w-full h-auto object-contain">
                                        <p class="mt-4 text-center text-sm text-gray-500">Scan this QR code to donate</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 mb-8 text-center">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-gray-500 text-lg">{{ __('messages.donate_details_unavailable') ?? 'Donation details will be available soon.' }}</p>
                </div>
            @endif

            @if($instructions)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
                    <div class="flex items-center gap-3 mb-4">
                        <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">{{ __('messages.instructions') ?? 'Instructions' }}</h3>
                    </div>
                    <div class="text-gray-600 leading-relaxed">
                        {{ nl2br(e($instructions)) }}
                    </div>
                </div>
            @endif

            <div class="text-center">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    {{ __('messages.contact_us_for_details') ?? 'Contact Us for More Details' }}
                </a>
            </div>
        </div>
    </section>
@endsection
