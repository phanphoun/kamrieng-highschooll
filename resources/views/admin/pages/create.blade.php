@extends('layouts.admin')

@section('title', 'Create Page')

@section('content')
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-4">
            <a href="{{ route('admin.pages.index') }}" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-gray-900">Create Page</h1>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 max-w-4xl">
        <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700 mb-1">Title (EN)</label>
                    <input type="text" name="title_en" id="title_en" value="{{ old('title_en') }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('title_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="title_kh" class="block text-sm font-medium text-gray-700 mb-1">Title (KH)</label>
                    <input type="text" name="title_kh" id="title_kh" value="{{ old('title_kh') }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('title_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                <p class="mt-1 text-xs text-gray-500">Must be unique. Auto-generated from title if left empty. Use only lowercase letters, numbers, and hyphens.</p>
                @error('slug') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="content_en" class="block text-sm font-medium text-gray-700 mb-1">Content (EN)</label>
                    <textarea name="content_en" id="content_en" rows="10" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('content_en') }}</textarea>
                    @error('content_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="content_kh" class="block text-sm font-medium text-gray-700 mb-1">Content (KH)</label>
                    <textarea name="content_kh" id="content_kh" rows="10" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('content_kh') }}</textarea>
                    @error('content_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="meta_description_en" class="block text-sm font-medium text-gray-700 mb-1">Meta Description (EN)</label>
                    <textarea name="meta_description_en" id="meta_description_en" rows="3" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('meta_description_en') }}</textarea>
                    @error('meta_description_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="meta_description_kh" class="block text-sm font-medium text-gray-700 mb-1">Meta Description (KH)</label>
                    <textarea name="meta_description_kh" id="meta_description_kh" rows="3" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('meta_description_kh') }}</textarea>
                    @error('meta_description_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                <input type="file" name="featured_image" id="featured_image" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                @error('featured_image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="template" class="block text-sm font-medium text-gray-700 mb-1">Template</label>
                    <select name="template" id="template" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                        <option value="default" {{ old('template') == 'default' ? 'selected' : '' }}>Default</option>
                        <option value="full-width" {{ old('template') == 'full-width' ? 'selected' : '' }}>Full Width</option>
                        <option value="sidebar" {{ old('template') == 'sidebar' ? 'selected' : '' }}>Sidebar</option>
                        <option value="blank" {{ old('template') == 'blank' ? 'selected' : '' }}>Blank</option>
                    </select>
                    @error('template') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('sort_order') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex items-center gap-6 mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                    <span class="ml-2 text-sm text-gray-700">Published</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="show_in_menu" id="show_in_menu" value="1" {{ old('show_in_menu') ? 'checked' : '' }} class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                    <span class="ml-2 text-sm text-gray-700">Show in Menu</span>
                </label>
            </div>

            <div class="flex items-center gap-4">
                <x-ui.button type="submit">
                    <i class="fas fa-save mr-2"></i>
                    Save
                </x-ui.button>
                <a href="{{ route('admin.pages.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
