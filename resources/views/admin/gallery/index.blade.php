@extends('layouts.admin')

@section('title', 'Gallery Management')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Gallery Management</h1>
            <p class="text-gray-600 mt-1">Manage photo albums and their images</p>
        </div>
        <x-ui.button as="a" href="{{ route('admin.gallery.create') }}">
            <i class="fas fa-plus mr-2"></i> Create Album
        </x-ui.button>
    </div>

    <x-ui.card>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-3 px-4 font-medium text-gray-500">Cover</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-500">Title (EN)</th>
                        <th class="text-center py-3 px-4 font-medium text-gray-500">Images</th>
                        <th class="text-center py-3 px-4 font-medium text-gray-500">Order</th>
                        <th class="text-center py-3 px-4 font-medium text-gray-500">Status</th>
                        <th class="text-right py-3 px-4 font-medium text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($albums as $album)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4">
                                @if($album->cover_image)
                                    <img src="{{ Storage::url($album->cover_image) }}"
                                         alt="{{ $album->title_en }}"
                                         class="w-12 h-12 object-cover rounded-lg">
                                @else
                                    <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.gallery.show', $album) }}" class="font-medium text-gray-900 hover:text-primary-600">
                                    {{ $album->title_en }}
                                </a>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <span class="text-gray-600">{{ $album->images_count }}</span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <span class="text-gray-600">{{ $album->sort_order ?? 0 }}</span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                @if($album->is_published)
                                    <x-ui.badge variant="success">Published</x-ui.badge>
                                @else
                                    <x-ui.badge variant="default">Draft</x-ui.badge>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.gallery.edit', $album) }}"
                                       class="text-gray-400 hover:text-primary-600 transition">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.gallery.destroy', $album) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this album?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-600 transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-gray-500">
                                <i class="fas fa-images text-4xl mb-3 block text-gray-300"></i>
                                <p>No albums found. Create your first album!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-ui.card>

    <div class="mt-6">
        {{ $albums->links() }}
    </div>
@endsection
