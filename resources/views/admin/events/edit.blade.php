@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Edit Event</h1>
        <p class="text-gray-600 mt-1">Update event details</p>
    </div>

    <x-ui.card>
        <form action="{{ route('admin.events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700">Title (EN) <span class="text-red-500">*</span></label>
                    <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $event->title_en) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    @error('title_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="title_kh" class="block text-sm font-medium text-gray-700">Title (KH)</label>
                    <input type="text" name="title_kh" id="title_kh" value="{{ old('title_kh', $event->title_kh) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    @error('title_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="description_en" class="block text-sm font-medium text-gray-700">Description (EN)</label>
                    <textarea name="description_en" id="description_en" rows="3"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">{{ old('description_en', $event->description_en) }}</textarea>
                    @error('description_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="description_kh" class="block text-sm font-medium text-gray-700">Description (KH)</label>
                    <textarea name="description_kh" id="description_kh" rows="3"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">{{ old('description_kh', $event->description_kh) }}</textarea>
                    @error('description_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="event_date" class="block text-sm font-medium text-gray-700">Event Date <span class="text-red-500">*</span></label>
                    <input type="date" name="event_date" id="event_date" value="{{ old('event_date', $event->event_date?->format('Y-m-d')) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    @error('event_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="event_time" class="block text-sm font-medium text-gray-700">Event Time</label>
                    <input type="time" name="event_time" id="event_time" value="{{ old('event_time', $event->event_time?->format('H:i')) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    @error('event_time') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $event->end_date?->format('Y-m-d')) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    @error('end_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    @error('location') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Type <span class="text-red-500">*</span></label>
                    <select name="type" id="type"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                        <option value="">Select type</option>
                        <option value="academic" {{ old('type', $event->type) == 'academic' ? 'selected' : '' }}>Academic</option>
                        <option value="sports" {{ old('type', $event->type) == 'sports' ? 'selected' : '' }}>Sports</option>
                        <option value="cultural" {{ old('type', $event->type) == 'cultural' ? 'selected' : '' }}>Cultural</option>
                        <option value="meeting" {{ old('type', $event->type) == 'meeting' ? 'selected' : '' }}>Meeting</option>
                        <option value="holiday" {{ old('type', $event->type) == 'holiday' ? 'selected' : '' }}>Holiday</option>
                        <option value="other" {{ old('type', $event->type) == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('type') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-8">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $event->is_published) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                        <span class="text-sm font-medium text-gray-700">Published</span>
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $event->is_featured) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                        <span class="text-sm font-medium text-gray-700">Featured</span>
                    </label>
                </div>
            </div>

            <div class="mt-6 flex items-center gap-3">
                <x-ui.button type="submit">
                    <i class="fas fa-save mr-2"></i> Update Event
                </x-ui.button>
                <a href="{{ route('admin.events.index') }}"
                   class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Cancel
                </a>
            </div>
        </form>
    </x-ui.card>
@endsection
