@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
    <div class="mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Site Settings</h1>
            <p class="text-gray-600 mt-1">Configure school information and site preferences.</p>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <x-ui.card>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">School Information</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="school_name_en" class="block text-sm font-medium text-gray-700 mb-1">School Name (EN)</label>
                        <input type="text" name="school_name_en" id="school_name_en" value="{{ old('school_name_en', $settings->school_name_en ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="school_name_kh" class="block text-sm font-medium text-gray-700 mb-1">School Name (KH)</label>
                        <input type="text" name="school_name_kh" id="school_name_kh" value="{{ old('school_name_kh', $settings->school_name_kh ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="school_code" class="block text-sm font-medium text-gray-700 mb-1">School Code</label>
                        <input type="text" name="school_code" id="school_code" value="{{ old('school_code', $settings->school_code ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="principal_name" class="block text-sm font-medium text-gray-700 mb-1">Principal Name</label>
                        <input type="text" name="principal_name" id="principal_name" value="{{ old('principal_name', $settings->principal_name ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="sm:col-span-2">
                        <label for="address_en" class="block text-sm font-medium text-gray-700 mb-1">Address (EN)</label>
                        <textarea name="address_en" id="address_en" rows="2"
                                  class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">{{ old('address_en', $settings->address_en ?? '') }}</textarea>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address_kh" class="block text-sm font-medium text-gray-700 mb-1">Address (KH)</label>
                        <textarea name="address_kh" id="address_kh" rows="2"
                                  class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">{{ old('address_kh', $settings->address_kh ?? '') }}</textarea>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $settings->phone ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $settings->email ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                        <input type="url" name="website" id="website" value="{{ old('website', $settings->website ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Branding</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                        <input type="file" name="logo" id="logo" accept="image/*"
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                        @if(!empty($settings->logo_path))
                            <p class="mt-1 text-xs text-gray-500">Current: {{ basename($settings->logo_path) }}</p>
                        @endif
                    </div>
                    <div>
                        <label for="favicon" class="block text-sm font-medium text-gray-700 mb-1">Favicon</label>
                        <input type="file" name="favicon" id="favicon" accept="image/*"
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                        @if(!empty($settings->favicon_path))
                            <p class="mt-1 text-xs text-gray-500">Current: {{ basename($settings->favicon_path) }}</p>
                        @endif
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Social Media Links</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="facebook_url" class="block text-sm font-medium text-gray-700 mb-1">Facebook URL</label>
                        <input type="url" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $settings->facebook_url ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="youtube_url" class="block text-sm font-medium text-gray-700 mb-1">YouTube URL</label>
                        <input type="url" name="youtube_url" id="youtube_url" value="{{ old('youtube_url', $settings->youtube_url ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="tiktok_url" class="block text-sm font-medium text-gray-700 mb-1">TikTok URL</label>
                        <input type="url" name="tiktok_url" id="tiktok_url" value="{{ old('tiktok_url', $settings->tiktok_url ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="telegram_url" class="block text-sm font-medium text-gray-700 mb-1">Telegram URL</label>
                        <input type="url" name="telegram_url" id="telegram_url" value="{{ old('telegram_url', $settings->telegram_url ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Content</h2>
                <div class="space-y-4">
                    <div>
                        <label for="about_description_en" class="block text-sm font-medium text-gray-700 mb-1">About Description (EN)</label>
                        <textarea name="about_description_en" id="about_description_en" rows="4"
                                  class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">{{ old('about_description_en', $settings->about_description_en ?? '') }}</textarea>
                    </div>
                    <div>
                        <label for="about_description_kh" class="block text-sm font-medium text-gray-700 mb-1">About Description (KH)</label>
                        <textarea name="about_description_kh" id="about_description_kh" rows="4"
                                  class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">{{ old('about_description_kh', $settings->about_description_kh ?? '') }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="mission_en" class="block text-sm font-medium text-gray-700 mb-1">Mission (EN)</label>
                            <textarea name="mission_en" id="mission_en" rows="3"
                                      class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">{{ old('mission_en', $settings->mission_en ?? '') }}</textarea>
                        </div>
                        <div>
                            <label for="mission_kh" class="block text-sm font-medium text-gray-700 mb-1">Mission (KH)</label>
                            <textarea name="mission_kh" id="mission_kh" rows="3"
                                      class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">{{ old('mission_kh', $settings->mission_kh ?? '') }}</textarea>
                        </div>
                        <div>
                            <label for="vision_en" class="block text-sm font-medium text-gray-700 mb-1">Vision (EN)</label>
                            <textarea name="vision_en" id="vision_en" rows="3"
                                      class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">{{ old('vision_en', $settings->vision_en ?? '') }}</textarea>
                        </div>
                        <div>
                            <label for="vision_kh" class="block text-sm font-medium text-gray-700 mb-1">Vision (KH)</label>
                            <textarea name="vision_kh" id="vision_kh" rows="3"
                                      class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">{{ old('vision_kh', $settings->vision_kh ?? '') }}</textarea>
                        </div>
                        <div>
                            <label for="motto_en" class="block text-sm font-medium text-gray-700 mb-1">Motto (EN)</label>
                            <input type="text" name="motto_en" id="motto_en" value="{{ old('motto_en', $settings->motto_en ?? '') }}"
                                   class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                        </div>
                        <div>
                            <label for="motto_kh" class="block text-sm font-medium text-gray-700 mb-1">Motto (KH)</label>
                            <input type="text" name="motto_kh" id="motto_kh" value="{{ old('motto_kh', $settings->motto_kh ?? '') }}"
                                   class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                        </div>
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Settings</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="academic_year" class="block text-sm font-medium text-gray-700 mb-1">Academic Year</label>
                        <input type="text" name="academic_year" id="academic_year" value="{{ old('academic_year', $settings->academic_year ?? '') }}"
                               placeholder="e.g. 2025-2026"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="opening_hours" class="block text-sm font-medium text-gray-700 mb-1">Opening Hours</label>
                        <input type="text" name="opening_hours" id="opening_hours" value="{{ old('opening_hours', $settings->opening_hours ?? '') }}"
                               placeholder="e.g. Mon-Fri 7:00 AM - 5:00 PM"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="office_hours" class="block text-sm font-medium text-gray-700 mb-1">Office Hours</label>
                        <input type="text" name="office_hours" id="office_hours" value="{{ old('office_hours', $settings->office_hours ?? '') }}"
                               placeholder="e.g. Mon-Fri 8:00 AM - 4:30 PM"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="map_embed_url" class="block text-sm font-medium text-gray-700 mb-1">Google Maps Embed URL</label>
                        <input type="url" name="map_embed_url" id="map_embed_url" value="{{ old('map_embed_url', $settings->map_embed_url ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="flex items-center gap-3">
                            <input type="checkbox" name="is_maintenance_mode" value="1" {{ old('is_maintenance_mode', $settings->is_maintenance_mode ?? false) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                            <span class="text-sm font-medium text-gray-700">Maintenance Mode</span>
                        </label>
                        <p class="mt-1 text-xs text-gray-500">When enabled, the public site will display a maintenance notice.</p>
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Donation Information</h2>
                <p class="text-sm text-gray-500 mb-4">Configure bank details and instructions shown on the public Donate page.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="donation_bank_name_en" class="block text-sm font-medium text-gray-700 mb-1">Bank Name (EN)</label>
                        <input type="text" name="donation_bank_name_en" id="donation_bank_name_en" value="{{ old('donation_bank_name_en', $settings->donation_bank_name_en ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="donation_bank_name_kh" class="block text-sm font-medium text-gray-700 mb-1">Bank Name (KH)</label>
                        <input type="text" name="donation_bank_name_kh" id="donation_bank_name_kh" value="{{ old('donation_bank_name_kh', $settings->donation_bank_name_kh ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="donation_account_name_en" class="block text-sm font-medium text-gray-700 mb-1">Account Name (EN)</label>
                        <input type="text" name="donation_account_name_en" id="donation_account_name_en" value="{{ old('donation_account_name_en', $settings->donation_account_name_en ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="donation_account_name_kh" class="block text-sm font-medium text-gray-700 mb-1">Account Name (KH)</label>
                        <input type="text" name="donation_account_name_kh" id="donation_account_name_kh" value="{{ old('donation_account_name_kh', $settings->donation_account_name_kh ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="donation_account_number" class="block text-sm font-medium text-gray-700 mb-1">Account Number</label>
                        <input type="text" name="donation_account_number" id="donation_account_number" value="{{ old('donation_account_number', $settings->donation_account_number ?? '') }}"
                               class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="donation_qr_code" class="block text-sm font-medium text-gray-700 mb-1">QR Code Image</label>
                        <input type="file" name="donation_qr_code" id="donation_qr_code" accept="image/*"
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                        @if(!empty($settings->donation_qr_code_path))
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $settings->donation_qr_code_path) }}" alt="QR Code" class="w-24 h-24 object-cover rounded border">
                                <p class="text-xs text-gray-400 mt-1">Upload a new image to replace.</p>
                            </div>
                        @endif
                    </div>
                    <div class="sm:col-span-2">
                        <label for="donation_instructions_en" class="block text-sm font-medium text-gray-700 mb-1">Donation Instructions (EN)</label>
                        <textarea name="donation_instructions_en" id="donation_instructions_en" rows="3"
                                  class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">{{ old('donation_instructions_en', $settings->donation_instructions_en ?? '') }}</textarea>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="donation_instructions_kh" class="block text-sm font-medium text-gray-700 mb-1">Donation Instructions (KH)</label>
                        <textarea name="donation_instructions_kh" id="donation_instructions_kh" rows="3"
                                  class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">{{ old('donation_instructions_kh', $settings->donation_instructions_kh ?? '') }}</textarea>
                    </div>
                </div>
            </x-ui.card>

            <div class="flex justify-end gap-3">
                <x-ui.button type="submit">
                    <i class="fas fa-save mr-2"></i>
                    Save Settings
                </x-ui.button>
            </div>
        </div>
    </form>
@endsection
