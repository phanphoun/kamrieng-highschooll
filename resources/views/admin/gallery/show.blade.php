@extends('layouts.admin')

@section('title', $album->title_en)

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $album->title_en }}</h1>
            <p class="text-gray-600 mt-1">{{ $album->images_count ?? $album->images->count() }} images</p>
        </div>
        <div class="flex items-center gap-3">
            <x-ui.button as="a" href="{{ route('admin.gallery.edit', $album) }}" variant="secondary">
                <i class="fas fa-edit mr-2"></i> Edit Album
            </x-ui.button>
            <x-ui.button as="a" href="{{ route('admin.gallery.index') }}" variant="ghost">
                <i class="fas fa-arrow-left mr-2"></i> Back
            </x-ui.button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="lg:col-span-2">
            <x-ui.card>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Album Details</h3>
                <div class="space-y-3">
                    <div>
                        <span class="text-sm font-medium text-gray-500">Title (EN):</span>
                        <span class="text-sm text-gray-900 ml-2">{{ $album->title_en }}</span>
                    </div>
                    @if($album->title_kh)
                        <div>
                            <span class="text-sm font-medium text-gray-500">Title (KH):</span>
                            <span class="text-sm text-gray-900 ml-2">{{ $album->title_kh }}</span>
                        </div>
                    @endif
                    @if($album->description_en)
                        <div>
                            <span class="text-sm font-medium text-gray-500">Description (EN):</span>
                            <p class="text-sm text-gray-700 mt-1">{{ $album->description_en }}</p>
                        </div>
                    @endif
                    @if($album->description_kh)
                        <div>
                            <span class="text-sm font-medium text-gray-500">Description (KH):</span>
                            <p class="text-sm text-gray-700 mt-1">{{ $album->description_kh }}</p>
                        </div>
                    @endif
                    <div>
                        <span class="text-sm font-medium text-gray-500">Status:</span>
                        @if($album->is_published)
                            <x-ui.badge variant="success">Published</x-ui.badge>
                        @else
                            <x-ui.badge variant="default">Draft</x-ui.badge>
                        @endif
                    </div>
                </div>
            </x-ui.card>
        </div>

        <div>
            <x-ui.card>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Upload Images</h3>
                <form action="{{ route('admin.gallery.images.upload', $album) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="images" class="block text-sm font-medium text-gray-700">Select Images</label>
                        <input type="file" name="images[]" id="images" multiple accept="image/*"
                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                        @error('images') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        @error('images.*') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <x-ui.button type="submit" class="mt-4 w-full">
                        <i class="fas fa-upload mr-2"></i> Upload
                    </x-ui.button>
                </form>
            </x-ui.card>
        </div>
    </div>

    <x-ui.card>
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Images</h3>
            <span class="text-sm text-gray-500">{{ $album->images->count() }} total</span>
        </div>

        @if($album->images->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach($album->images as $image)
                    <div class="relative group">
                        <img src="{{ Storage::url($image->image_path) }}"
                             alt="{{ $image->caption_en ?? 'Gallery image' }}"
                             class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition rounded-lg flex items-center justify-center">
                            <form action="{{ route('admin.gallery.images.destroy', $image) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-white opacity-0 group-hover:opacity-100 transition bg-red-600 hover:bg-red-700 rounded-full w-10 h-10 flex items-center justify-center">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        @if($image->caption_en)
                            <p class="mt-1 text-xs text-gray-500 truncate">{{ $image->caption_en }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="py-12 text-center text-gray-500">
                <i class="fas fa-images text-4xl mb-3 block text-gray-300"></i>
                <p>No images in this album yet. Upload some images above.</p>
            </div>
        @endif
    </x-ui.card>
@endsection
