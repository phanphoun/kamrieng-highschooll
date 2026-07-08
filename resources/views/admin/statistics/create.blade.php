@extends('layouts.admin')

@section('title', 'Create Statistic')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Create Statistic</h1>
        <p class="text-gray-600 mt-1">Add a new dashboard statistics counter.</p>
    </div>

    <x-ui.card>
        <form action="{{ route('admin.statistics.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="label_en" class="block text-sm font-medium text-gray-700 mb-1">Label (EN) <span class="text-red-500">*</span></label>
                    <input type="text" id="label_en" name="label_en" value="{{ old('label_en') }}" required
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('label_en') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="label_kh" class="block text-sm font-medium text-gray-700 mb-1">Label (KH)</label>
                    <input type="text" id="label_kh" name="label_kh" value="{{ old('label_kh') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('label_kh') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="value" class="block text-sm font-medium text-gray-700 mb-1">Value <span class="text-red-500">*</span></label>
                    <input type="text" id="value" name="value" value="{{ old('value') }}" required
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('value') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
                    <input type="text" id="icon" name="icon" value="{{ old('icon') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('icon') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="prefix" class="block text-sm font-medium text-gray-700 mb-1">Prefix</label>
                    <input type="text" id="prefix" name="prefix" value="{{ old('prefix') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('prefix') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="suffix" class="block text-sm font-medium text-gray-700 mb-1">Suffix</label>
                    <input type="text" id="suffix" name="suffix" value="{{ old('suffix') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('suffix') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('sort_order') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}
                           class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                    <span class="text-sm text-gray-700">Active</span>
                </label>
            </div>

            <div class="mt-8 flex items-center gap-4">
                <x-ui.button type="submit">
                    <i class="fas fa-save mr-2"></i>
                    Save
                </x-ui.button>
                <a href="{{ route('admin.statistics.index') }}">
                    <x-ui.button variant="secondary" type="button">
                        Cancel
                    </x-ui.button>
                </a>
            </div>
        </form>
    </x-ui.card>
@endsection
