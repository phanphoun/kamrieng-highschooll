@extends('layouts.admin')

@section('title', 'Notice Management')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Notice Management</h1>
            <p class="text-gray-600 mt-1">Manage school notices and announcements</p>
        </div>
        <x-ui.button as="a" href="{{ route('admin.notices.create') }}">
            <i class="fas fa-plus mr-2"></i> Create Notice
        </x-ui.button>
    </div>

    <x-ui.card>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-3 px-4 font-medium text-gray-500">Title (EN)</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-500">Type</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-500">Audience</th>
                        <th class="text-center py-3 px-4 font-medium text-gray-500">Urgent</th>
                        <th class="text-center py-3 px-4 font-medium text-gray-500">Status</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-500">Publish Date</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-500">Expiry Date</th>
                        <th class="text-right py-3 px-4 font-medium text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($notices as $notice)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $notice->title_en }}</td>
                            <td class="py-3 px-4">
                                <x-ui.badge variant="info">{{ ucfirst($notice->type) }}</x-ui.badge>
                            </td>
                            <td class="py-3 px-4 text-gray-600">{{ ucfirst($notice->target_audience) }}</td>
                            <td class="py-3 px-4 text-center">
                                @if($notice->is_urgent)
                                    <x-ui.badge variant="danger">Urgent</x-ui.badge>
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                @if($notice->is_published)
                                    <x-ui.badge variant="success">Published</x-ui.badge>
                                @else
                                    <x-ui.badge variant="default">Draft</x-ui.badge>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ $notice->publish_date ? $notice->publish_date->format('M d, Y') : '—' }}
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ $notice->expiry_date ? $notice->expiry_date->format('M d, Y') : '—' }}
                            </td>
                            <td class="py-3 px-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.notices.edit', $notice) }}"
                                       class="text-gray-400 hover:text-primary-600 transition">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.notices.destroy', $notice) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this notice?')">
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
                            <td colspan="8" class="py-12 text-center text-gray-500">
                                <i class="fas fa-bullhorn text-4xl mb-3 block text-gray-300"></i>
                                <p>No notices found. Create your first notice!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-ui.card>

    <div class="mt-6">
        {{ $notices->links() }}
    </div>
@endsection
