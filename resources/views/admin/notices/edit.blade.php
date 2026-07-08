@extends('layouts.admin')

@section('title', 'Edit Notice')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Edit Notice</h1>
        <p class="text-gray-600 mt-1">Update notice details</p>
    </div>

    <x-ui.card>
        <form action="{{ route('admin.notices.update', $notice) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700">Title (EN) <span class="text-red-500">*</span></label>
                    <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $notice->title_en) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    @error('title_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="title_kh" class="block text-sm font-medium text-gray-700">Title (KH)</label>
                    <input type="text" name="title_kh" id="title_kh" value="{{ old('title_kh', $notice->title_kh) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    @error('title_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="content_en" class="block text-sm font-medium text-gray-700">Content (EN) <span class="text-red-500">*</span></label>
                    <textarea name="content_en" id="content_en" rows="5"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">{{ old('content_en', $notice->content_en) }}</textarea>
                    @error('content_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="content_kh" class="block text-sm font-medium text-gray-700">Content (KH)</label>
                    <textarea name="content_kh" id="content_kh" rows="5"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">{{ old('content_kh', $notice->content_kh) }}</textarea>
                    @error('content_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Type <span class="text-red-500">*</span></label>
                    <select name="type" id="type"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                        <option value="">Select type</option>
                        <option value="general" {{ old('type', $notice->type) == 'general' ? 'selected' : '' }}>General</option>
                        <option value="academic" {{ old('type', $notice->type) == 'academic' ? 'selected' : '' }}>Academic</option>
                        <option value="administrative" {{ old('type', $notice->type) == 'administrative' ? 'selected' : '' }}>Administrative</option>
                    </select>
                    @error('type') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="target_audience" class="block text-sm font-medium text-gray-700">Target Audience <span class="text-red-500">*</span></label>
                    <select name="target_audience" id="target_audience"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                        <option value="">Select audience</option>
                        <option value="all" {{ old('target_audience', $notice->target_audience) == 'all' ? 'selected' : '' }}>All</option>
                        <option value="students" {{ old('target_audience', $notice->target_audience) == 'students' ? 'selected' : '' }}>Students</option>
                        <option value="parents" {{ old('target_audience', $notice->target_audience) == 'parents' ? 'selected' : '' }}>Parents</option>
                        <option value="teachers" {{ old('target_audience', $notice->target_audience) == 'teachers' ? 'selected' : '' }}>Teachers</option>
                    </select>
                    @error('target_audience') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="publish_date" class="block text-sm font-medium text-gray-700">Publish Date</label>
                    <input type="date" name="publish_date" id="publish_date" value="{{ old('publish_date', $notice->publish_date?->format('Y-m-d')) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    @error('publish_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="expiry_date" class="block text-sm font-medium text-gray-700">Expiry Date</label>
                    <input type="date" name="expiry_date" id="expiry_date" value="{{ old('expiry_date', $notice->expiry_date?->format('Y-m-d')) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    @error('expiry_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-8">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $notice->is_published) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                        <span class="text-sm font-medium text-gray-700">Published</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_urgent" value="1" {{ old('is_urgent', $notice->is_urgent) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                        <span class="text-sm font-medium text-gray-700">Urgent</span>
                    </label>
                </div>
            </div>

            <div class="mt-6 flex items-center gap-3">
                <x-ui.button type="submit">
                    <i class="fas fa-save mr-2"></i> Update Notice
                </x-ui.button>
                <a href="{{ route('admin.notices.index') }}"
                   class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Cancel
                </a>
            </div>
        </form>
    </x-ui.card>
@endsection
