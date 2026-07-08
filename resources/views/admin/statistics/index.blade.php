@extends('layouts.admin')

@section('title', 'Statistics')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Statistics</h1>
            <p class="text-gray-600 mt-1">Manage dashboard statistics counters.</p>
        </div>
    </div>

    <x-ui.card>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-3 font-medium text-gray-700">Label</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Value</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Prefix</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Suffix</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Sort Order</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Active</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($statistics as $statistic)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-900 font-medium">{{ $statistic->label_en }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $statistic->value }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $statistic->prefix ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $statistic->suffix ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $statistic->sort_order }}</td>
                            <td class="px-4 py-3">
                                @if($statistic->is_active)
                                    <x-ui.badge variant="success">Active</x-ui.badge>
                                @else
                                    <x-ui.badge variant="danger">Inactive</x-ui.badge>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.statistics.edit', $statistic) }}" class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.statistics.destroy', $statistic) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this statistic?')">
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
                            <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                No statistics found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($statistics->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $statistics->links() }}
            </div>
        @endif
    </x-ui.card>
@endsection
