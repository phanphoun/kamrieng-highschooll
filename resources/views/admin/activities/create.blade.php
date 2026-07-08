@extends('layouts.admin')

@section('title', __('admin.create_activity'))

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">{{ __('admin.create_activity') }}</h1>
        <p class="text-gray-600 mt-1">{{ __('admin.create_activity_description') }}</p>
    </div>

    <x-ui.card>
        <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700 mb-1">{{ __('admin.title_en') }} <span class="text-red-500">*</span></label>
                    <input type="text" id="title_en" name="title_en" value="{{ old('title_en') }}" required
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('title_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="title_kh" class="block text-sm font-medium text-gray-700 mb-1">{{ __('admin.title_kh') }}</label>
                    <input type="text" id="title_kh" name="title_kh" value="{{ old('title_kh') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('title_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">{{ __('admin.category') }}</label>
                    <input type="text" id="category" name="category" value="{{ old('category') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('category') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="activity_date" class="block text-sm font-medium text-gray-700 mb-1">{{ __('admin.activity_date') }}</label>
                    <input type="date" id="activity_date" name="activity_date" value="{{ old('activity_date') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('activity_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">{{ __('admin.location') }}</label>
                    <input type="text" id="location" name="location" value="{{ old('location') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('location') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-1">{{ __('admin.featured_image') }}</label>
                    <input type="file" id="featured_image" name="featured_image"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('featured_image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6">
                <label for="description_en" class="block text-sm font-medium text-gray-700 mb-1">{{ __('admin.description_en') }}</label>
                <textarea id="description_en" name="description_en" rows="4"
                          class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('description_en') }}</textarea>
                @error('description_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="mt-6">
                <label for="description_kh" class="block text-sm font-medium text-gray-700 mb-1">{{ __('admin.description_kh') }}</label>
                <textarea id="description_kh" name="description_kh" rows="4"
                          class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('description_kh') }}</textarea>
                @error('description_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="mt-6">
                <label for="content_en" class="block text-sm font-medium text-gray-700 mb-1">{{ __('admin.content_en') }}</label>
                <textarea id="content_en" name="content_en" rows="8"
                          class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('content_en') }}</textarea>
                @error('content_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="mt-6">
                <label for="content_kh" class="block text-sm font-medium text-gray-700 mb-1">{{ __('admin.content_kh') }}</label>
                <textarea id="content_kh" name="content_kh" rows="8"
                          class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('content_kh') }}</textarea>
                @error('content_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="mt-6">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}
                           class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                    <span class="text-sm text-gray-700">{{ __('admin.is_published') }}</span>
                </label>
            </div>

            <div class="mt-8 flex items-center gap-4">
                <x-ui.button type="submit">
                    <i class="fas fa-save mr-2"></i>
                    {{ __('admin.save') }}
                </x-ui.button>
                <a href="{{ route('admin.activities.index') }}">
                    <x-ui.button variant="secondary" type="button">
                        {{ __('admin.cancel') }}
                    </x-ui.button>
                </a>
            </div>
        </form>
    </x-ui.card>
@endsection
