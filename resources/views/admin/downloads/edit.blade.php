@extends('layouts.admin')

@section('title', 'Edit Download')

@section('content')
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-4">
            <a href="{{ route('admin.downloads.index') }}" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-gray-900">Edit Download</h1>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 max-w-3xl">
        <form action="{{ route('admin.downloads.update', $download) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700 mb-1">Title (EN)</label>
                    <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $download->title_en) }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('title_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="title_kh" class="block text-sm font-medium text-gray-700 mb-1">Title (KH)</label>
                    <input type="text" name="title_kh" id="title_kh" value="{{ old('title_kh', $download->title_kh) }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('title_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="description_en" class="block text-sm font-medium text-gray-700 mb-1">Description (EN)</label>
                    <textarea name="description_en" id="description_en" rows="4" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('description_en', $download->description_en) }}</textarea>
                    @error('description_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="description_kh" class="block text-sm font-medium text-gray-700 mb-1">Description (KH)</label>
                    <textarea name="description_kh" id="description_kh" rows="4" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('description_kh', $download->description_kh) }}</textarea>
                    @error('description_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="file" class="block text-sm font-medium text-gray-700 mb-1">File (leave empty to keep current)</label>
                    <input type="file" name="file" id="file" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @if ($download->file_path)
                        <p class="mt-1 text-xs text-gray-500">Current file: {{ $download->file_path }}</p>
                    @endif
                    @error('file') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <input type="text" name="category" id="category" value="{{ old('category', $download->category) }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('category') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $download->is_published) ? 'checked' : '' }} class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                    <span class="ml-2 text-sm text-gray-700">Published</span>
                </label>
            </div>

            <div class="flex items-center gap-4">
                <x-ui.button type="submit">
                    <i class="fas fa-save mr-2"></i>
                    Update
                </x-ui.button>
                <a href="{{ route('admin.downloads.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
