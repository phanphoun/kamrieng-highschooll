@extends('layouts.admin')

@section('title', 'Create Hero Slide')

@section('content')
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-4">
            <a href="{{ route('admin.hero-slides.index') }}" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-gray-900">Create Hero Slide</h1>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 max-w-3xl">
        <form action="{{ route('admin.hero-slides.store') }}" method="POST" enctype="multipart/form-data">
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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="subtitle_en" class="block text-sm font-medium text-gray-700 mb-1">Subtitle (EN)</label>
                    <input type="text" name="subtitle_en" id="subtitle_en" value="{{ old('subtitle_en') }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('subtitle_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="subtitle_kh" class="block text-sm font-medium text-gray-700 mb-1">Subtitle (KH)</label>
                    <input type="text" name="subtitle_kh" id="subtitle_kh" value="{{ old('subtitle_kh') }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('subtitle_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="description_en" class="block text-sm font-medium text-gray-700 mb-1">Description (EN)</label>
                    <textarea name="description_en" id="description_en" rows="3" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('description_en') }}</textarea>
                    @error('description_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="description_kh" class="block text-sm font-medium text-gray-700 mb-1">Description (KH)</label>
                    <textarea name="description_kh" id="description_kh" rows="3" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('description_kh') }}</textarea>
                    @error('description_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image <span class="text-red-500">*</span></label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                <p class="mt-1 text-xs text-gray-500">Recommended size: 1920x1080px. Max 5MB. JPG, PNG, or WEBP.</p>
                <div id="image-preview" class="mt-2 hidden">
                    <img id="preview-img" src="#" alt="Preview" class="w-full max-h-48 object-cover rounded-lg border border-gray-200">
                </div>
                @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label for="btn_text_en" class="block text-sm font-medium text-gray-700 mb-1">Button Text (EN)</label>
                    <input type="text" name="btn_text_en" id="btn_text_en" value="{{ old('btn_text_en') }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('btn_text_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="btn_text_kh" class="block text-sm font-medium text-gray-700 mb-1">Button Text (KH)</label>
                    <input type="text" name="btn_text_kh" id="btn_text_kh" value="{{ old('btn_text_kh') }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('btn_text_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="btn_link" class="block text-sm font-medium text-gray-700 mb-1">Button Link</label>
                    <input type="text" name="btn_link" id="btn_link" value="{{ old('btn_link') }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('btn_link') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('sort_order') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div class="flex items-end pb-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                        <span class="ml-2 text-sm text-gray-700">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <x-ui.button type="submit">
                    <i class="fas fa-save mr-2"></i>
                    Save
                </x-ui.button>
                <a href="{{ route('admin.hero-slides.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('image');
    const preview = document.getElementById('image-preview');
    const img = document.getElementById('preview-img');
    if (input) {
        input.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (ev) {
                    img.src = ev.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
                img.src = '#';
            }
        });
    }
});
</script>
@endpush
