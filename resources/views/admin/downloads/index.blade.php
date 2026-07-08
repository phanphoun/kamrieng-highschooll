@extends('layouts.admin')

@section('title', 'Downloads')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Downloads</h1>
            <p class="text-gray-600 mt-1">Manage downloadable files</p>
        </div>
        <a href="{{ route('admin.downloads.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 transition">
            <i class="fas fa-plus mr-2"></i>
            Create Download
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File Size</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Downloads</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($downloads as $download)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $download->title_en }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $download->category }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $download->file_type }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                @php
                                    $size = $download->file_size;
                                    if ($size >= 1073741824) {
                                        echo number_format($size / 1073741824, 2) . ' GB';
                                    } elseif ($size >= 1048576) {
                                        echo number_format($size / 1048576, 2) . ' MB';
                                    } elseif ($size >= 1024) {
                                        echo number_format($size / 1024, 2) . ' KB';
                                    } else {
                                        echo $size . ' bytes';
                                    }
                                @endphp
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $download->download_count }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-ui.badge variant="{{ $download->is_published ? 'success' : 'default' }}">
                                    {{ $download->is_published ? 'Published' : 'Draft' }}
                                </x-ui.badge>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.downloads.edit', $download) }}" class="text-primary-600 hover:text-primary-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.downloads.destroy', $download) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-download text-4xl mb-3 text-gray-300"></i>
                                <p>No downloads found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($downloads->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $downloads->links() }}
            </div>
        @endif
    </div>
@endsection
