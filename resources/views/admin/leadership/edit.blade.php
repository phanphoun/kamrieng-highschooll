@extends('layouts.admin')

@section('title', 'Edit Leadership Member')

@section('content')
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-4">
            <a href="{{ route('admin.leadership.index') }}" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-gray-900">Edit Leadership Member</h1>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 max-w-3xl">
        <form action="{{ route('admin.leadership.update', $leadership) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="name_en" class="block text-sm font-medium text-gray-700 mb-1">Name (EN)</label>
                    <input type="text" name="name_en" id="name_en" value="{{ old('name_en', $leadership->name_en) }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('name_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="name_kh" class="block text-sm font-medium text-gray-700 mb-1">Name (KH)</label>
                    <input type="text" name="name_kh" id="name_kh" value="{{ old('name_kh', $leadership->name_kh) }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('name_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="position_en" class="block text-sm font-medium text-gray-700 mb-1">Position (EN)</label>
                    <input type="text" name="position_en" id="position_en" value="{{ old('position_en', $leadership->position_en) }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('position_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="position_kh" class="block text-sm font-medium text-gray-700 mb-1">Position (KH)</label>
                    <input type="text" name="position_kh" id="position_kh" value="{{ old('position_kh', $leadership->position_kh) }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('position_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Photo (leave empty to keep current)</label>
                <input type="file" name="photo" id="photo" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                @if ($leadership->photo)
                    <div class="mt-2 flex items-center gap-3">
                        <img src="{{ asset('storage/' . $leadership->photo) }}" alt="{{ $leadership->name_en }}" class="w-16 h-16 object-cover rounded-lg border border-gray-200">
                        <span class="text-xs text-gray-500">{{ $leadership->photo }}</span>
                    </div>
                @endif
                @error('photo') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="bio_en" class="block text-sm font-medium text-gray-700 mb-1">Bio (EN)</label>
                    <textarea name="bio_en" id="bio_en" rows="5" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('bio_en', $leadership->bio_en) }}</textarea>
                    @error('bio_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="bio_kh" class="block text-sm font-medium text-gray-700 mb-1">Bio (KH)</label>
                    <textarea name="bio_kh" id="bio_kh" rows="5" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">{{ old('bio_kh', $leadership->bio_kh) }}</textarea>
                    @error('bio_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $leadership->email) }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $leadership->phone) }}" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $leadership->sort_order) }}" min="0" class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('sort_order') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div class="flex items-end pb-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $leadership->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                        <span class="ml-2 text-sm text-gray-700">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <x-ui.button type="submit">
                    <i class="fas fa-save mr-2"></i>
                    Update
                </x-ui.button>
                <a href="{{ route('admin.leadership.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
